<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class lopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('ql_lop')->orderBy('malop', 'desc')->paginate(2);
        return view('pages.content_qllop', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travehdt = DB::table('ql_hedaotao')->get();
        $travecn = DB::table('ql_chuyennganh')->get();
        $travenk = DB::table('ql_nienkhoa')->get();
        $travek = DB::table('ql_khoa')->get();

        return view('chucnang.cnlop.addlop', [
            'hdt' => $travehdt,
            'cn' => $travecn,
            'nk' => $travenk,
            'k' => $travek
        ]);
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
                'malop' => 'required|unique:ql_lop,malop',
                'tenlop' => 'required|unique:ql_lop,tenlop'
            ],
            [
                'malop.required' => 'Bạn chưa nhập mã lớp!',
                'malop.unique' => 'Mã lớp này đã có!',
                'tenlop.required' => 'Bạn chưa nhập tên lớp!',
                'tenlop.unique' => 'Lớp này đã có!',
            ]
        );

            $machuyennganh = DB::table('ql_chuyennganh')->where('tenchuyennganh', $request->tenchuyennganh)->first();
            $mahedaotao = DB::table('ql_hedaotao')->where('tenhedaotao', $request->tenhdt)->first();

            DB::table('ql_lop')->insert(
                [
                    'malop' => $request->malop,
                    'tenlop' => $request->tenlop,
                    'khoa' => $machuyennganh->khoa,
                    'chuyennganh' => $request->tenchuyennganh,
                    'hedaotao' => $request->tenhdt,
                    'machuyennganh' => $machuyennganh->machuyennganh,
                    'mahedaotao' => $mahedaotao->mahedaotao,
                    'nienkhoa' => $request->nienkhoa

                ]
            );
            return redirect()->route('lop.lop');
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
        $editlop = DB::table('ql_lop')->select(['*'])->where('malop', $id)->first();
        $travecn = DB::table('ql_chuyennganh')->get();
        $travehdt = DB::table('ql_hedaotao')->get();
        $travenk = DB::table('ql_nienkhoa')->get();

        return view('chucnang.cnlop.editLop', [
            'el' => $editlop,
            'travecn' => $travecn,
            'travehdt' => $travehdt,
            'travenk' => $travenk
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
        $machuyennganh = DB::table('ql_chuyennganh')->where('tenchuyennganh', $request->tenchuyennganh)->first();
        $mahedaotao = DB::table('ql_hedaotao')->where('tenhedaotao', $request->tenhdt)->first();
        DB::table('ql_lop')
            ->where('malop', $id)
            ->update([
                'malop' => $request->malop,
                'tenlop' => $request->tenlop,
                'khoa' => $machuyennganh->khoa,
                'chuyennganh' => $request->tenchuyennganh,
                'hedaotao' => $request->tenhdt,
                'machuyennganh' => $machuyennganh->machuyennganh,
                'mahedaotao' => $mahedaotao->mahedaotao,
                'nienkhoa' => $request->nienkhoa,
            ]);
        return redirect()->route('lop.lop')->with('success', 'update thành công');
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
            DB::table('ql_lop')->where('malop', $id)->delete();

            return redirect()->route('lop.lop')
                ->with('success', 'Xóa thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('success', 'Không thể xóa');
        }
    }
}
