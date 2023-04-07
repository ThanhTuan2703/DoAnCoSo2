<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;


class khoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = DB::table('ql_khoa')->orderBy('makhoa','desc')->paginate(3);
        $data = DB::table('ql_khoa')->paginate(2);
        return view('pages.content_quanlikhoa', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chucnang.cnquanlykhoa.addkhoa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'makhoa' => 'required',
                'tenkhoa' => 'required|unique:ql_khoa,tenkhoa',
                'ngaythanhlap' => 'required',
                'motakhoa' => 'required',
            ],
            [
                'makhoa.required'=>'Bạn chưa nhập mã khoa!',
                'tenkhoa.required'=>'Bạn chưa nhập tên khoa!',
                'tenkhoa.unique'=>'Khoa này đã có!',
                'ngaythanhlap.required'=>'Bạn chưa nhập ngày thành lập khoa!',
                'motakhoa.required'=>'Bạn chưa nhập mô tả khoa!',
            ]
        );
        try {
            DB::table('ql_khoa')->insert(
                [
                    'tenkhoa' => $request->tenkhoa, 'makhoa' => $request->makhoa,
                    'ngaythanhlap' => $request->ngaythanhlap, 'mota' => $request->motakhoa
                ]
            );
            return redirect()->route('khoa.khoa');
        } catch (Exception $e) {
            return redirect()->back()->with('message', 'Mã khoa này đã có');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $editkhoa = DB::table('ql_khoa')->select(['*'])->where('makhoa', $id)->first();

        return view('chucnang.cnquanlykhoa.editkhoa', ['ek' => $editkhoa]);

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


        DB::table('ql_khoa')
            ->where('makhoa', $id)
            ->update([
                'tenkhoa' => $request->tenkhoa,
                'makhoa' => $request->makhoa,
                'ngaythanhlap' => $request->ngaythanhlap,
                'mota' => $request->motakhoa,
            ]);
        return redirect()->route('khoa.khoa')->with('success', 'update thành công');

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
            DB::table('ql_khoa')->where('makhoa', $id)->delete();

            return redirect()->route('khoa.khoa')
                ->with('success', 'Xóa thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('success', 'Không thể xóa');
        }
    }
}
