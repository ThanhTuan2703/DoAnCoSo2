@extends('index')

@section('content')
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css'>

    <link rel="stylesheet" href="{{asset('resources/css/quanlikhoa.css')}}">
    <link rel="stylesheet" href="{{asset('resources/css/table.css')}}">
    <link rel="stylesheet" href="{{asset('responsive_table.css')}}">
    {{-- <link rel="stylesheet" href="resources/css/style.css"> --}}
    <link rel="stylesheet" href="{{asset('resources/css/style.css')}}">

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> --}}

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
                        <div class="row mt-2">
                            <div class="col-lg-12">
                                <h2 style="display: flex; height: 34px; align-items: center; font-size:25px">Update khoa
                                </h2>
                            </div>
                        </div>

                        @if (\Session::has('message'))
                            <div class="alert alert-secondary" style="color: red; text-align: center">
                                {{ \Session::get('message') }}
                            </div>
                        @endif
                            <form action="{{ route('khoa.update',$ek->makhoa) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="container-xl">
                                <div class="row mt-4">
                                    <div class="col-lg-2">
                                        <label for="">Tên khoa</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input style="width:100%" type="text" placeholder="Vd: Công nghệ thông tin "
                                            name="tenkhoa" value="{{$ek->tenkhoa}}">
                                    </div>

                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-2">
                                        <label for="">Mã khoa</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input style="width:25%" type="text" name="makhoa" value="{{$ek->makhoa}}"><br>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-2">
                                        <label for="">Ngày thành lập</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <input style="width:25%" type="datetime-local" name="ngaythanhlap" value="{{$ek->ngaythanhlap}}"><br>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-2">
                                        <label>Mô tả</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <textarea class="form-control"name="motakhoa" style="width: 99%;">{{$ek->mota}}</textarea>
                                    </div>
                                </div>
                                <div class="Dep-form d-flex justify-content-center mt-4">
                                    <div class="mr-3">
                                        <input type="submit" value="Lưu" class="btn btn-dark">
                                    </div>
                                    <div class="mr-3">
                                        <a href="{{ route('khoa.edit',$ek->makhoa) }}" class="btn btn-primary ">Làm mới</a>
                                    </div>
                                    <div class="mr-3">
                                        <a href="{{ route('khoa.khoa') }}" class="btn btn-danger ">Trở về</a>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        {{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script> --}}
        {{-- <script>
            ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
            console.error( error );
            } );
            </script> --}}
        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>
        <script src="{{ asset('resources/js/script.js') }}"></script>
    @endsection
