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
                                <h2 style="display: flex; height: 34px; align-items: center; font-size:25px">Thêm mới sinh
                                    viên</h2>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('sinhvien.store') }}" method="post">
                        @csrf
                        <div class="container-xl">

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">Lớp</label>
                                </div>
                                <div class="col-lg-10">
                                    <select name="tenlop" id="" style="width:25%">
                                        @foreach ($travelop as $travelop)
                                            <option value="{{ $travelop->tenlop }}">{{ $travelop->tenlop }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">Mã sinh viên</label>
                                </div>
                                <div class="col-lg-10">
                                    <input name="masinhvien" style="width: 25%" type="text"><br>
                                    @if ($errors->has('masinhvien'))
                                        <span class="text-danger">{{ $errors->first('masinhvien') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">Tên sinh viên</label>
                                </div>
                                <div class="col-lg-10">
                                    <input name="tensinhvien" style="width: 35%" type="text"><br>
                                    @if ($errors->has('tensinhvien'))
                                        <span class="text-danger">{{ $errors->first('tensinhvien') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">Số điện thoại</label>
                                </div>
                                <div class="col-lg-10">
                                    <input name="sodienthoai" style="width: 25%" type="text"><br>
                                    @if ($errors->has('sodienthoai'))
                                        <span class="text-danger">{{ $errors->first('sodienthoai') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-lg-10">
                                    <input name="email" style="width: 40%" type="email"><br>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">Quê quán</label>
                                </div>
                                <div class="col-lg-10">
                                    <input name="quequan" style="width: 35%" type="text"><br>
                                    @if ($errors->has('quequan'))
                                        <span class="text-danger">{{ $errors->first('quequan') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">Ngày sinh</label>
                                </div>
                                <div class="col-lg-10">
                                    <input name="ngaysinh" style="width: 25%" type="datetime-local"><br>
                                    @if ($errors->has('ngaysinh'))
                                        <span class="text-danger">{{ $errors->first('ngaysinh') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-2">
                                    <label for="">Mật khẩu</label>
                                </div>
                                <div class="col-lg-10">
                                    <input name="matkhau" style="width:25%" type="password" id="myInput">
                                    <input type="checkbox" onclick="myFunction()"><br>
                                    @if ($errors->has('matkhau'))
                                        <span class="text-danger">{{ $errors->first('matkhau') }}</span>
                                    @endif
                                </div>
                            </div>
                            <script>
                                function myFunction() {
                                    var x = document.getElementById("myInput");
                                    if (x.type === "password") {
                                        x.type = "text";
                                    } else {
                                        x.type = "password";
                                    }
                                }
                            </script>

                        </div>
                        <div class="Dep-form d-flex justify-content-center mt-4">
                            <div class="mr-3">
                                <input type="submit" value="Lưu" class="btn btn-dark">
                            </div>
                            <div class="mr-3">
                                <a href="{{ route('sinhvien.store') }}" class="btn btn-primary ">Làm mới</a>
                            </div>
                            <div class="mr-3">
                                <a href="{{ route('sinhvien.sinhvien') }}" class="btn btn-danger ">Trở về</a>
                            </div>
                        </div>
                    </form>
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
