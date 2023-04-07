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
            <div class="row ">
                <div class="col-12 boder-table">
                    <div class="table-responsivess">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2>Update chuyên ngành</h2>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('chuyennganh.update', $ec->machuyennganh) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="container-xl">
                                <div class="row mt-4">
                                    <div class="col-lg-2">
                                        <label for="">Khoa</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <select name="sokhoa">
                                            <option value="{{ $ec->khoa }}">{{ $ec->khoa }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-2">
                                        <label for="">Chuyên ngành</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input name="tenchuyennganh" style="width: 40%" type="text"
                                            value="{{ $ec->tenchuyennganh }}">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-2">
                                        <label for="">Mã chuyên ngành</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input name="machuyennganh" style="width: 20%" type="text" value="{{ $ec->machuyennganh }}"><br>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-2">
                                        <label>Mô tả</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <textarea class="form-control"name="motachuyennganh" style="width: 99%;">{{ $ec->mota }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="Dep-form d-flex justify-content-center mt-4">
                                <div class="mr-3">
                                    {{-- <a href="{{ route('themmoikhoa') }}" class="btn btn-primary " type="submit">Lưu</a> --}}
                                    <input type="submit" value="Lưu" class="btn btn-dark">
                                </div>
                                <div class="mr-3">
                                    <a href="{{ route('chuyennganh.edit',$ec->machuyennganh) }}" class="btn btn-primary ">Làm mới</a>
                                </div>
                                <div class="mr-3">
                                    <a href="{{ route('chuyennganh.chuyennganh') }}" class="btn btn-danger ">Trở về</a>
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
