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
                                <h2 style="display: flex; height: 34px; align-items: center; font-size:25px">Update đồ án
                                </h2>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('doan.update', $travedoan->madoan) }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="container-xl">
                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">GV hướng dẫn</label>
                                </div>
                                <div class="col-lg-10">
                                    <select name="tengiangvien" id="" style="width:40%">
                                        @foreach ($travegiangvien as $travegiangvien)
                                            <option value="{{ $travegiangvien->tengiangvien }}">
                                                {{ $travegiangvien->tengiangvien }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tengiangvien'))
                                        <span class="text-danger">{{ $errors->first('tengiangvien') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">Sinh viên</label>
                                </div>
                                <div class="col-lg-10">
                                    <select name="tensinhvien" id="" style="width:40%">
                                        @foreach ($travesinhvien as $travesinhvien)
                                            <option value="{{ $travesinhvien->tensinhvien }}">
                                                {{ $travesinhvien->tensinhvien }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tensinhvien'))
                                        <span class="text-danger">{{ $errors->first('tensinhvien') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">Mã đồ án</label>
                                </div>
                                <div class="col-lg-10">
                                    <input name="madoan" value="{{ $travedoan->madoan }}" style="width: 35%" type="text">
                                    @if ($errors->has('madoan'))
                                        <span class="text-danger">{{ $errors->first('madoan') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">Tên đồ án</label>
                                </div>
                                <div class="col-lg-10">
                                    <input name="tendoan" value="{{ $travedoan->tendoan }}"  style="width: 25%" type="text">
                                    @if ($errors->has('tendoan'))
                                        <span class="text-danger">{{ $errors->first('tendoan') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">File image</label>
                                </div>
                                <div class="col-lg-10">
                                    <img src="{{ url('/public/imagedoan/'.$travedoan->fileimage) }}" width="100px" class="img-thumbnail" />
                                    <input name="fileimage" style="width: 25%" type="file">
                                    @if ($errors->has('fileimage'))
                                        <span class="text-danger">{{ $errors->first('fileimage') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">File sourch code</label>
                                </div>
                                <div class="col-lg-10">
                                    <input name="filedoan" style="width: 35%" type="file">
                                    @if ($errors->has('filedoan'))
                                        <span class="text-danger">{{ $errors->first('filedoan') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">Điểm</label>
                                </div>
                                <div class="col-lg-10">
                                    <input name="diem" value="{{ $travedoan->diem }}"  style="width: 25%" type="text">
                                    @if ($errors->has('diem'))
                                        <span class="text-danger">{{ $errors->first('diem') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="Dep-form d-flex justify-content-center mt-4">
                            <div class="mr-3">
                                <input type="submit" value="Lưu" class="btn btn-dark">
                            </div>
                            <div class="mr-3">
                                <a href="{{ route('doan.edit',$travedoan->madoan) }}" class="btn btn-primary ">Làm mới</a>
                            </div>
                            <div class="mr-3">
                                <a href="{{ route('doan.doan') }}" class="btn btn-danger ">Trở về</a>
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
