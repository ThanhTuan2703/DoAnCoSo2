<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\File;
use ZipArchive;
class doanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('danhsachdoan')->paginate(2);
        return view('pages.content_dsda', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travegiangvien = DB::table('ql_giangvien')->get();
        $travesinhvien = DB::table('ql_sinhvien')->get();
        return view('chucnang.cndoan.adddoan', [
            'travegiangvien' => $travegiangvien,
            'travesinhvien' => $travesinhvien
        ]);
        return view('chucnang.cndoan.adddoan');
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
            'fileimage' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,xlx,csv|max:2048',
            'filedoan' => 'required|mimes:rar,zip|max:9999',
            'madoan' => 'required|unique:danhsachdoan,madoan',
            'tendoan' => 'required',
            'tengiangvien' => 'required',
            'tensinhvien' => 'required',
            'diem' => 'required',

        ],
        [
            'fileimage.required' => 'Bạn chưa chọn ảnh!',
            'fileimage.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
            'fileimage.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
            'filedoan.required' => 'Bạn chưa chọn file!',
            'filedoan.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .rar .zip',
            'filedoan.max' => 'Hình thẻ giới hạn dung lượng không quá 8M',
            'madoan.required' => 'Bạn chưa nhập mã đồ án!',
            'madoan.unique' => 'Mã đồ án này đã có!',
            'tendoan.required' => 'Bạn chưa nhập tên đồ án!',
            'tengiangvien.required' => 'Bạn chưa nhập tên giảng viên!',
            'tensinhvien.required' => 'Bạn chưa nhập tên sinh viên!',
            'diem.required' => 'Bạn chưa nhập điểm!',
        ]);


            $giangvien = DB::table('ql_giangvien')->where('tengiangvien', $request->tengiangvien)->first();
            $sinhvien = DB::table('ql_sinhvien')->where('tensinhvien', $request->tensinhvien)->first();

            $fileimage = time() . '.' . $request->fileimage->getClientOriginalName();
            $request->fileimage->move(public_path('imagedoan'), $fileimage);

            $filedoan = time() . '.' . $request->filedoan->getClientOriginalName();
            $request->filedoan->move(public_path('filedoan'), $filedoan);

            DB::table('danhsachdoan')->insert(
                [
                    'madoan' => $request->madoan,
                    'tendoan' => $request->tendoan,
                    'fileimage' =>  $fileimage,
                    'filedoan' => $filedoan,
                    'khoa' => $sinhvien->khoa,
                    'chuyennganh' => $sinhvien->chuyennganh,
                    'hedaotao' => $sinhvien->hedaotao,
                    'lop' => $sinhvien->lop,
                    'giangvienhuongdan' => $request->tengiangvien,
                    'sinhvien' => $request->tensinhvien,
                    'diem' => $request->diem,
                    'masinhvien' => $sinhvien->masinhvien,
                    'magiangvien' => $giangvien->magiangvien

                ]
            );
            return redirect()->route('doan.doan');
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
        $travegiangvien = DB::table('ql_giangvien')->get();
        $travesinhvien = DB::table('ql_sinhvien')->get();
        $travedoan = DB::table('danhsachdoan')->select(['*'])->where('madoan', $id)->first();
        return view('chucnang.cndoan.editdoan', [
            'travegiangvien' => $travegiangvien,
            'travesinhvien' => $travesinhvien,
            'travedoan' => $travedoan,
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
            'fileimage' => 'mimes:jpeg,png,jpg,gif,svg,pdf,xlx,csv|max:2048',
            'filedoan' => 'mimes:rar,zip|max:999999999',
            'madoan' => 'required',
            'tendoan' => 'required',
            'tengiangvien' => 'required',
            'tensinhvien' => 'required',
            'diem' => 'required',
        ]);

        if ($request->hasFile('fileimage') && $request->hasFile('filedoan')) {
            $travedoan = DB::table('danhsachdoan')->select(['*'])->where('madoan', $id)->first();
            $file_pathimage = public_path('imagedoan') . '/' . $travedoan->fileimage;
            File::delete($file_pathimage);
            $file_pathfoder = public_path('filedoan') . '/' . $travedoan->filedoan;
            File::delete($file_pathfoder);
            $giangvien = DB::table('ql_giangvien')->where('tengiangvien', $request->tengiangvien)->first();
            $sinhvien = DB::table('ql_sinhvien')->where('tensinhvien', $request->tensinhvien)->first();

            $imageName = time() . '.' . $request->fileimage->getClientOriginalName();
            $request->fileimage->move(public_path('imagedoan'), $imageName);

            $fileName = time() . '.' . $request->filedoan->getClientOriginalName();
            $request->filedoan->move(public_path('filedoan'), $fileName);
            DB::table('danhsachdoan')
                ->where('madoan', $id)
                ->update([
                    'madoan' => $request->madoan,
                    'tendoan' => $request->tendoan,
                    'fileimage' =>  $imageName,
                    'filedoan' => $fileName,
                    'khoa' => $sinhvien->khoa,
                    'chuyennganh' => $sinhvien->chuyennganh,
                    'hedaotao' => $sinhvien->hedaotao,
                    'lop' => $sinhvien->lop,
                    'giangvienhuongdan' => $request->tengiangvien,
                    'sinhvien' => $request->tensinhvien,
                    'diem' => $request->diem,
                    'masinhvien' => $sinhvien->masinhvien,
                    'magiangvien' => $giangvien->magiangvien
                ]);
            return redirect()->route('doan.doan')->with('success', 'update thành công');
        } elseif ($request->hasFile('fileimage')) {
            $travedoan = DB::table('danhsachdoan')->select(['*'])->where('madoan', $id)->first();
            $file_pathimage = public_path('imagedoan') . '/' . $travedoan->fileimage;
            File::delete($file_pathimage);
            $giangvien = DB::table('ql_giangvien')->where('tengiangvien', $request->tengiangvien)->first();
            $sinhvien = DB::table('ql_sinhvien')->where('tensinhvien', $request->tensinhvien)->first();

            $imageName = time() . '.' . $request->fileimage->getClientOriginalName();
            $request->fileimage->move(public_path('imagedoan'), $imageName);

            DB::table('danhsachdoan')
                ->where('madoan', $id)
                ->update([
                    'madoan' => $request->madoan,
                    'tendoan' => $request->tendoan,
                    'fileimage' =>  $imageName,
                    'filedoan' => $travedoan->filedoan,
                    'khoa' => $sinhvien->khoa,
                    'chuyennganh' => $sinhvien->chuyennganh,
                    'hedaotao' => $sinhvien->hedaotao,
                    'lop' => $sinhvien->lop,
                    'giangvienhuongdan' => $request->tengiangvien,
                    'sinhvien' => $request->tensinhvien,
                    'diem' => $request->diem,
                    'masinhvien' => $sinhvien->masinhvien,
                    'magiangvien' => $giangvien->magiangvien
                ]);
            return redirect()->route('doan.doan')->with('success', 'update thành công');
        } elseif ($request->hasFile('filedoan')) {
            $travedoan = DB::table('danhsachdoan')->select(['*'])->where('madoan', $id)->first();
            $file_pathfoder = public_path('filedoan') . '/' . $travedoan->filedoan;
            File::delete($file_pathfoder);
            $giangvien = DB::table('ql_giangvien')->where('tengiangvien', $request->tengiangvien)->first();
            $sinhvien = DB::table('ql_sinhvien')->where('tensinhvien', $request->tensinhvien)->first();

            $fileName = time() . '.' . $request->filedoan->getClientOriginalName();
            $request->filedoan->move(public_path('filedoan'), $fileName);
            DB::table('danhsachdoan')
                ->where('madoan', $id)
                ->update([
                    'madoan' => $request->madoan,
                    'tendoan' => $request->tendoan,
                    'fileimage' =>  $travedoan->fileimage,
                    'filedoan' => $fileName,
                    'khoa' => $sinhvien->khoa,
                    'chuyennganh' => $sinhvien->chuyennganh,
                    'hedaotao' => $sinhvien->hedaotao,
                    'lop' => $sinhvien->lop,
                    'giangvienhuongdan' => $request->tengiangvien,
                    'sinhvien' => $request->tensinhvien,
                    'diem' => $request->diem,
                    'masinhvien' => $sinhvien->masinhvien,
                    'magiangvien' => $giangvien->magiangvien
                ]);
            return redirect()->route('doan.doan')->with('success', 'update thành công');
        }

        $travedoan = DB::table('danhsachdoan')->select(['*'])->where('madoan', $id)->first();
        $giangvien = DB::table('ql_giangvien')->where('tengiangvien', $request->tengiangvien)->first();
        $sinhvien = DB::table('ql_sinhvien')->where('tensinhvien', $request->tensinhvien)->first();

        DB::table('danhsachdoan')
            ->where('madoan', $id)
            ->update([
                'madoan' => $request->madoan,
                'tendoan' => $request->tendoan,
                'fileimage' =>  $travedoan->fileimage,
                'filedoan' => $travedoan->filedoan,
                'khoa' => $sinhvien->khoa,
                'chuyennganh' => $sinhvien->chuyennganh,
                'hedaotao' => $sinhvien->hedaotao,
                'lop' => $sinhvien->lop,
                'giangvienhuongdan' => $request->tengiangvien,
                'sinhvien' => $request->tensinhvien,
                'diem' => $request->diem,
                'masinhvien' => $sinhvien->masinhvien,
                'magiangvien' => $giangvien->magiangvien
            ]);
        return redirect()->route('doan.doan')->with('success', 'update thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $travedoan = DB::table('danhsachdoan')->select(['*'])->where('madoan', $id)->first();

        $file_pathimage = public_path('imagedoan') . '/' . $travedoan->fileimage;
        $file_pathfoder = public_path('filedoan') . '/' . $travedoan->filedoan;

        if (File::exists($file_pathimage) && File::exists($file_pathfoder)) {

            File::delete($file_pathimage);
            File::delete($file_pathfoder);

            try {
                DB::table('danhsachdoan')->where('madoan', $id)->delete();
                return redirect()->route('doan.doan')
                    ->with('success', 'Xóa thành công');
            } catch (Exception $e) {
                return redirect()->back()->with('success', 'Không thể xóa');
            }
        }
    }

    public function dowload($id)
    {
        $zip = new ZipArchive;
        $travedoan = DB::table('danhsachdoan')->select(['*'])->where('madoan', $id)->first();
        $file_pathfoder = public_path('filedoan') . '/' . $travedoan->filedoan;
        if ($zip->open($file_pathfoder, ZipArchive::CREATE) === TRUE)
        {
        	// Folder files to zip and download
        	// files folder must be existing to your public folder
            $files = File::files(public_path('filedoan'));
   			// loop the files result
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
        }
    	// Download the generated zip
        return response()->download($file_pathfoder);
    }
}
