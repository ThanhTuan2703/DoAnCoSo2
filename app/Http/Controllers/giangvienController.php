<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;


use Illuminate\Support\Facades\File;



class giangvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('ql_giangvien')->paginate(2);
        return view('pages.content_qlgv', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travechuyennganh = DB::table('ql_chuyennganh')->get();
        return view('chucnang.cngiangvien.addgiangvien', ['travechuyennganh' => $travechuyennganh]);
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
            'myfile' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,xlx,csv|max:2048',
            'magiangvien' => 'required|unique:ql_giangvien,magiangvien',
            'tengiangvien' => 'required',
            'sodienthoai' => 'required',
            'email' => 'required|email',
            'quequan' => 'required',
            'ngaysinh' => 'required',

        ],
        [
            'myfile.required' => 'Bạn chưa chọn ảnh!',
            'myfile.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
            'myfile.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            'magiangvien.required' => 'Bạn chưa nhập mã giảng viên!',
            'magiangvien.unique' => 'Mã giảng viên này đã có!',
            'tengiangvien.required' => 'Bạn chưa nhập tên giảng viên!',
            'sodienthoai.required' => 'Bạn chưa nhập số điện thoại!',
            'email.required' => 'Bạn chưa nhập số email!',
            'email.email' => 'Bắt buộc nhập email!',
            'quequan.required' => 'Bạn chưa nhập quê quán!',
            'ngaysinh.required' => 'Bạn chưa nhập ngày sinh!',
        ]);


        $chuyennganh = DB::table('ql_chuyennganh')->where('tenchuyennganh', $request->tenchuyennganh)->first();
        // $imageName = time().'.'.$request->myfile->extension();
        // $imageName = time() . '.' . $request->myfile->getClientOriginalExtension();
        $imageName = time() . '.' . $request->myfile->getClientOriginalName();
        $request->myfile->move(public_path('images'), $imageName);
        DB::table('ql_giangvien')->insert(
            [
                'file' => $imageName,
                'khoa' => $chuyennganh->khoa,
                'chuyennganh' => $request->tenchuyennganh,
                'magiangvien' => $request->magiangvien,
                'tengiangvien' => $request->tengiangvien,
                'sodienthoai' => $request->sodienthoai,
                'email' => $request->email,
                'quequan' => $request->quequan,
                'ngaysinh' => $request->ngaysinh
            ]
        );
        return redirect()->route('giangvien.giangvien');
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
        $travechuyennganh = DB::table('ql_chuyennganh')->get();
        $travegiangvien = DB::table('ql_giangvien')->select(['*'])->where('magiangvien', $id)->first();
        return view('chucnang.cngiangvien.editgiangvien', [
            'travechuyennganh' => $travechuyennganh,
            'travegiangvien' => $travegiangvien
        ]);
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
        $request->validate([
            'myfile' => 'mimes:jpeg,png,jpg,gif,svg,pdf,xlx,csv|max:2048',
            'magiangvien' => 'required',
            'tengiangvien' => 'required',
            'sodienthoai' => 'required',
            'email' => 'required|email',
            'quequan' => 'required',
            'ngaysinh' => 'required',

        ]);

        if ($request->hasFile('myfile')) {
            $travegiangvien = DB::table('ql_giangvien')->select(['*'])->where('magiangvien', $id)->first();
            $file_path = public_path('images') . '/' . $travegiangvien->file;
            if (File::exists($file_path)) {
                File::delete($file_path);
                $chuyennganh = DB::table('ql_chuyennganh')->where('tenchuyennganh', $request->tenchuyennganh)->first();
                // $imageName = time().'.'.$request->myfile->extension();
                $imageName = time() . '.' . $request->myfile->getClientOriginalName();
                $request->myfile->move(public_path('images'), $imageName);
                DB::table('ql_giangvien')
                    ->where('magiangvien', $id)
                    ->update([
                        'file' => $imageName,
                        'khoa' => $chuyennganh->khoa,
                        'chuyennganh' => $request->tenchuyennganh,
                        'magiangvien' => $request->magiangvien,
                        'tengiangvien' => $request->tengiangvien,
                        'sodienthoai' => $request->sodienthoai,
                        'email' => $request->email,
                        'quequan' => $request->quequan,
                        'ngaysinh' => $request->ngaysinh
                    ]);
                return redirect()->route('giangvien.giangvien')->with('success', 'update thành công');
            }
        }

            $travegiangvien = DB::table('ql_giangvien')->select(['*'])->where('magiangvien', $id)->first();
             $chuyennganh = DB::table('ql_chuyennganh')->where('tenchuyennganh', $request->tenchuyennganh)->first();
        // $imageName = time().'.'.$request->myfile->extension();
        // $imageName = time() . '.' . $request->myfile->getClientOriginalName();
        // $request->myfile->move(public_path('images'), $imageName);
        DB::table('ql_giangvien')
            ->where('magiangvien', $id)
            ->update([
                'file' => $travegiangvien->file,
                'khoa' => $chuyennganh->khoa,
                'chuyennganh' => $request->tenchuyennganh,
                'magiangvien' => $request->magiangvien,
                'tengiangvien' => $request->tengiangvien,
                'sodienthoai' => $request->sodienthoai,
                'email' => $request->email,
                'quequan' => $request->quequan,
                'ngaysinh' => $request->ngaysinh
            ]);
        return redirect()->route('giangvien.giangvien')->with('success', 'update thành công');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $travegiangvien = DB::table('ql_giangvien')->select(['*'])->where('magiangvien', $id)->first();
        $file_path = public_path('images') . '/' . $travegiangvien->file;
        if (File::exists($file_path)) {

            File::delete($file_path); //for deleting only file try thi
            try {
                DB::table('ql_giangvien')->where('magiangvien', $id)->delete();
                return redirect()->route('giangvien.giangvien')
                    ->with('success', 'Xóa thành công');
            } catch (Exception $e) {
                return redirect()->back()->with('success', 'Không thể xóa');
            }
        }
    }

}
