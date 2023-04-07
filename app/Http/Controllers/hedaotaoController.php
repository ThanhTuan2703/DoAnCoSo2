<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
class hedaotaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('ql_hedaotao')->paginate(2);
        return view('pages.content_qlhedaotao', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chucnang.cnhedaotao.addhedaotao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahedaotao' => 'required',
            'tenhedaotao' => 'required|unique:ql_hedaotao,tenhedaotao'
        ],
        [
            'mahedaotao.required' => 'Bạn chưa nhập mã hệ đào tạo!',
            'tenhedaotao.required' => 'Bạn chưa nhập tên hệ đào tạo!',
            'tenhedaotao.unique' => 'Hệ đào tạo này đã có!',
        ]);
        try {

            DB::table('ql_hedaotao')->insert(
                [
                    'mahedaotao' => $request->mahedaotao,
                    'tenhedaotao' => $request->tenhedaotao
                ]
            );
            return redirect()->route('hedaotao.hedaotao');
        } catch (Exception $e) {
            return redirect()->back()->with('abc', 'Mã hệ đào tạo và tên hệ đào tạo không thể trùng nhau. ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edithedaotao = DB::table('ql_hedaotao')->select(['*'])->where('mahedaotao',$id)->first();

        return view('chucnang.cnhedaotao.edithedaotao',['eh' => $edithedaotao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('ql_hedaotao')
        ->where('mahedaotao',$id)
        ->update([
            'tenhedaotao' => $request->tenhedaotao,
            'mahedaotao' => $request->mahedaotao
        ]);
        return redirect()->route('hedaotao.hedaotao')->with('success','update thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::table('ql_hedaotao')->where('mahedaotao',$id)->delete();

        return redirect()->route('hedaotao.hedaotao')
            ->with('success','Xóa thành công');
        }catch (Exception $e) {
            return redirect()->back()->with('success','Không thể xóa');
        }
    }
}
