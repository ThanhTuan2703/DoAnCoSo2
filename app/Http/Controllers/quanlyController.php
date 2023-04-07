<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;

class quanlyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= DB::table('users')->paginate(3);
        return view('pages.content_quanly', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tong()
    {
        $tongsinhvien = DB::table('ql_sinhvien')->count();
        $tonglop = DB::table('ql_lop')->count();
        $tongchuyennganh = DB::table('ql_chuyennganh')->count();
        $tongkhoa = DB::table('ql_khoa')->count();
        $tongdoan = DB::table('danhsachdoan')->count();
        $tonggiangvien = DB::table('ql_giangvien')->count();
        return view('pages.trangchu', [
            'tongsinhvien'=>$tongsinhvien,
            'tonglop'=>$tonglop,
            'tongchuyennganh'=>$tongchuyennganh,
            'tongkhoa'=>$tongkhoa,
            'tongdoan'=>$tongdoan,
            'tonggiangvien'=>$tonggiangvien
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edituser = DB::table('users')->select(['*'])->where('id',$id)->first();

        return view('chucnang.cnquanly.editquanly',['edituser' => $edituser]);
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
        DB::table('users')
        ->where('id',$id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('quanly.quanly')->with('success','update thành công');
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
            DB::table('users')->where('id',$id)->delete();

        return redirect()->route('quanly.quanly')
            ->with('success','Xóa thành công');
        }catch (Exception $e) {
            return redirect()->back()->with('success','Không thể xóa');
        }
    }
}
