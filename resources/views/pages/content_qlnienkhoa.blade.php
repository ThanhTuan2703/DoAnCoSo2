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
                        <div class="themmoi "><button><a href="{{ route('nienkhoa.create') }}"
                                    class="text-white btn btn-info ">
                                    <i class="fa-solid fa-plus"></i>Thêm mới</a> </button></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @if (\Session::has('success'))
        <div class="alert alert-secondary" style="color: red; text-align: center">
            {{ \Session::get('success') }}
        </div>
    @endif
    <div class="container pt-5">
        <div class="row ">
            <div class="col-12 boder-table">
                <div class="table-responsivess">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Quản lý Niên khóa</h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table_res">
                        <thead>
                            <tr>
                                <th>Niên khóa</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->nienkhoa }}</td>
                                    <td style="display: flex">
                                        <a href="{{ route('nienkhoa.edit', $row->nienkhoa) }}" title="Edit"
                                            class="edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form method="POST" action="{{ route('nienkhoa.destroy', $row->nienkhoa) }}">
                                            @csrf
                                            @method('delete')
                                            <button style="border: 0px solid white; background-color: white"><a
                                                    class="delete" title="Delete" data-toggle="tooltip"><i
                                                        class="fa-solid fa-trash"></i></a></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- Table --}}
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>
    {{-- <script  src="resources/js/script.js"></script> --}}
    {{-- <script  src="resources/js/sotutang.js"></script> --}}
    {{-- <script  src="resources/js/qlidaotao.js"></script> --}}
    {{-- <script src="{{ asset('resources/js/script.js') }}"></script>
    <script src="{{ asset('resources/js/qlidaotao.js') }}"></script> --}}
    <script src="{{ asset('resources/js/script.js') }}"></script>
@endsection
