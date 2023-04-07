<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class chuyennganhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('ql_chuyennganh')->paginate(2);
        return view('pages.content_qlchuyennganh', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travetenkhoa = DB::table('ql_khoa')->get();
        return view('chucnang.cnchuyennganh.addchuyennganh', ['travetenkhoa' => $travetenkhoa]);
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
            'machuyennganh' => 'required',
            'tenchuyennganh' => 'required|unique:ql_chuyennganh,tenchuyennganh',
            'sokhoa' => 'required',
            'motachuyennganh' => 'required',
        ],
        [
            'machuyennganh.required' => 'Bạn chưa nhập mã chuyên ngành!',
            'tenchuyennganh.required' => 'Bạn chưa nhập tên chuyên ngành!',
            'tenchuyennganh.unique' => 'Chuyên ngành này đã có!',
            'motachuyennganh.required' => 'Bạn chưa nhập mô tả chuyên ngành!',
        ]);
        try {
            $khoa = DB::table('ql_khoa')->where('tenkhoa', $request->sokhoa)->first();
            DB::table('ql_chuyennganh')->insert(
                [
                    'machuyennganh' => $request->machuyennganh,
                    'tenchuyennganh' => $request->tenchuyennganh,
                    'khoa' => $request->sokhoa,
                    'mota' => $request->motachuyennganh,
                    'makhoa' => $khoa->makhoa
                ]
            );
            return redirect()->route('chuyennganh.chuyennganh');
        } catch (Exception $e) {
            return redirect()->back()->with('abc', 'Mã chuyên ngành này đã có');
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
        $editchuyennganh = DB::table('ql_chuyennganh')->select(['*'])->where('machuyennganh', $id)->first();

        return view('chucnang.cnchuyennganh.editchuyennganh', ['ec' => $editchuyennganh]);
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
        DB::table('ql_chuyennganh')
            ->where('machuyennganh', $id)
            ->update([
                'tenchuyennganh' => $request->tenchuyennganh,
                'machuyennganh' => $request->machuyennganh,
                'khoa' => $request->sokhoa,
                'mota' => $request->motachuyennganh,
            ]);
        return redirect()->route('chuyennganh.chuyennganh')->with('success', 'update thành công');
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
            DB::table('ql_chuyennganh')->where('machuyennganh', $id)->delete();

            return redirect()->route('chuyennganh.chuyennganh')
                ->with('success', 'Xóa thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('success', 'Không thể xóa');
        }
    }
}
