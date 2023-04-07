@extends('index')

@section('content')
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css'>
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/quanlikhoa.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('responsive_table.css') }}">

    <div class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tatca them11">
                        <div class="ngoinha"><a href=""><i class="fa-solid fa-house-user text-light"></i></a></div>
                        <div class="hedaotao">Trang chủ</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row">
                <div class="col-12 boder-table">
                    <div class="table-responsivess">
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <h2 style="display: flex; height: 34px; align-items: center; font-size:25px">Update lớp
                                </h2>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('lop.update', $el->malop) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="container-xl">
                            <div class="row mt-2">
                                <div class="col-lg-3">
                                    <label for="">Chuyên ngành</label>
                                </div>
                                <div class="col-lg-9">
                                    <select name="tenchuyennganh" id="" style="width:40%">
                                        @foreach ($travecn as $travecn)
                                        <option value="{{ $travecn->tenchuyennganh }}">{{ $travecn->tenchuyennganh }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-lg-3">
                                    <label for="">Hệ đào tạo</label>
                                </div>
                                <div class="col-lg-9">
                                    <select name="tenhdt" id="" style="width:35%">
                                        @foreach ($travehdt as $travehdt)
                                        <option value="{{ $travehdt->tenhedaotao }}">{{ $travehdt->tenhedaotao }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @if ($errors->has('tenhdt'))
                                        <span class="text-danger">{{ $errors->first('tenhdt') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-lg-3">
                                    <label for="">Niên khóa: </label>
                                </div>
                                <div class="col-lg-9">
                                    <select name="nienkhoa" id="" style="width:35%">
                                        @foreach ($travenk as $travenk)
                                        <option value="{{ $travenk->nienkhoa }}">{{ $travenk->nienkhoa }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-lg-3">
                                    <label for="">Mã lớp </label>
                                </div>
                                <div class="col-lg-9">
                                    <input name="malop" value="{{ $el->malop }}" style="width: 25%"
                                        type="text"><br>
                                    @if ($errors->has('malop'))
                                        <span class="text-danger">{{ $errors->first('malop') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-lg-3">
                                    <label for="">Tên lớp</label>
                                </div>
                                <div class="col-lg-9">
                                    <input name="tenlop" value="{{ $el->tenlop }}" style="width: 40%" type="text">
                                    @if ($errors->has('tenlop'))
                                        <span class="text-danger">{{ $errors->first('tenlop') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="Dep-form d-flex justify-content-center mt-4">
                            <div class="mr-3">
                                <input type="submit" value="Lưu" class="btn btn-dark">
                            </div>
                            <div class="mr-3">
                                <a href="{{ route('lop.edit',$el->malop) }}" class="btn btn-primary ">Làm mới</a>
                            </div>
                            <div class="mr-3">
                                <a href="{{ route('lop.lop') }}" class="btn btn-danger ">Trở về</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>




    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>
    {{-- <script  src="{{('resources/js/script.js')}}"></script> --}}
    {{-- href="{{('public/backend/css/style.css')}}" --}}
    <script src="{{ asset('resources/js/script.js') }}"></script>
@endsection
