<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class sinhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('ql_sinhvien')->paginate(2);

        if($key = request()->key){
            $data = DB::table('ql_sinhvien')->where('masinhvien','like','%'.$key.'%')->simplePaginate(2);
            // $data->appends($request->all());
        }
        return view('pages.content_qlsinhvien', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $travelop = DB::table('ql_lop')->get();
        return view('chucnang.cnsinhvien.addsinhvien', ['travelop' => $travelop]);
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
            'masinhvien' => 'required|unique:ql_sinhvien,masinhvien',
            'tensinhvien' => 'required',
            'sodienthoai' => 'required',
            'email' => 'required|email',
            'quequan' => 'required',
            'ngaysinh' => 'required',
            'matkhau' => 'required'
        ],
        [
            'masinhvien.required' => 'Bạn chưa nhập mã sinh viên!',
            'masinhvien.unique' => 'Mã sinh viên này đã có!',
            'tensinhvien.required' => 'Bạn chưa nhập tên sinh viên!',
            'sodienthoai.required' => 'Bạn chưa nhập số điện thoại!',
            'email.required' => 'Bạn chưa nhập số email!',
            'email.email' => 'Bắt buộc nhập email!',
            'quequan.required' => 'Bạn chưa nhập quê quán!',
            'ngaysinh.required' => 'Bạn chưa nhập ngày sinh!',
            'matkhau.required' => 'Bạn chưa nhập mật khẩu!',
        ]);
        try {

        $lop = DB::table('ql_lop')->where('tenlop', $request->tenlop)->first();

        DB::table('ql_sinhvien')->insert(
            [
                'khoa' => $lop->khoa,
                'hedaotao' => $lop->hedaotao,
                'chuyennganh' => $lop->chuyennganh,
                'lop' => $request->tenlop,
                'masinhvien' => $request->masinhvien,
                'tensinhvien' => $request->tensinhvien,
                'sodienthoai' => $request->sodienthoai,
                'email' => $request->email,
                'quequan' => $request->quequan,
                'ngaysinh' => $request->ngaysinh,
                'matkhau' => $request->matkhau,
                'malop' => $lop->malop
            ]
        );
        return redirect()->route('sinhvien.sinhvien');
        } catch (Exception $e) {
            return redirect()->back()->with('abc', 'Mã lớp và tên lớp này đã có');
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
        $editsinhvien = DB::table('ql_sinhvien')->select(['*'])->where('masinhvien', $id)->first();

        $travelop = DB::table('ql_lop')->get();
        return view('chucnang.cnsinhvien.editsinhvien', [
            'es' => $editsinhvien,
            'el'=>  $travelop ]);
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
        $lop = DB::table('ql_lop')->where('tenlop', $request->tenlop)->first();
        DB::table('ql_sinhvien')
            ->where('masinhvien', $id)
            ->update([
                'lop' => $lop->tenlop,
                'masinhvien' => $request->masinhvien,
                'tensinhvien' => $request->tensinhvien,
                'sodienthoai' => $request->sodienthoai,
                'email' => $request->email,
                'quequan' => $request->quequan,
                'ngaysinh' => $request->ngaysinh,
                'matkhau' => $request->matkhau
            ]);
        return redirect()->route('sinhvien.sinhvien')->with('success', 'update thành công');
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
            DB::table('ql_sinhvien')->where('masinhvien',$id)->delete();

        return redirect()->route('sinhvien.sinhvien')
            ->with('success','Xóa thành công');
        }catch (Exception $e) {
            return redirect()->back()->with('success','Không thể xóa');
        }
    }


}
