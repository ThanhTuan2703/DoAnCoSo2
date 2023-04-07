<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use FFI\Exception;

class nienkhoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('ql_nienkhoa')->paginate(2);
        return view('pages.content_qlnienkhoa', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chucnang.cnnienkhoa.addnienkhoa');
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
            'nienkhoa' => 'required|unique:ql_nienkhoa,nienkhoa',
        ],
        [
            'nienkhoa.required' => 'Bạn chưa nhập niên khóa!',
            'nienkhoa.unique' => 'Niên khóa này đã có!',
        ]);


            DB::table('ql_nienkhoa')->insert(
                [
                    'nienkhoa' => $request->nienkhoa,
                ]
            );
            return redirect()->route('nienkhoa.nienkhoa');  
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
        $editnienkhoa = DB::table('ql_nienkhoa')->select(['*'])->where('nienkhoa',$id)->first();

        return view('chucnang.cnnienkhoa.editnienkhoa',['en' => $editnienkhoa]);
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
        DB::table('ql_nienkhoa')
        ->where('nienkhoa',$id)
        ->update([
            'nienkhoa' => $request->nienkhoa
        ]);
        return redirect()->route('nienkhoa.nienkhoa')->with('success','update thành công');

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
            DB::table('ql_nienkhoa')->where('nienkhoa',$id)->delete();

        return redirect()->route('nienkhoa.nienkhoa')
            ->with('success','Xóa thành công');
        }catch (Exception $e) {
            return redirect()->back()->with('success','Không thể xóa');
        }
    }
}
