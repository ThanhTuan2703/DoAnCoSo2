@include('thuvien')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hệ thống quản lý đồ án sinh viên</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css'>
    <link rel="stylesheet" href="resources/css/style.css">

    <style>
        @media screen and (max-width: 767px) {
            .table-responsivess {
                width: 100% !important;
                margin-bottom: 15px !important;
                overflow-y: hidden !important;
                -ms-overflow-style: -ms-autohiding-scrollbar !important;
                border: 1px solid #ddd !important;
            }

            .table_res {
                width: 900px !important;
            }
        }



        @media screen and (max-width: 376px) {
            .them11 {
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background-color: #ccc;
            }

            .themmoi {
                /* padding: 12px 12px; */
                line-height: 37px;
                /* background-color: red; */
                padding: 0;
            }

            .ngoinha,
            .hedaotao {
                border-right: 1px solid black;
                padding: 0 12px;
            }

            .themmoi button {
                background-color: #67a9e4;
                border: none;
            }

            .ngoinha i {
                color: #ccc;
            }

            .ngoinha i,
            .hedaotao {
                line-height: 1px !important;
            }
        }

        /* .main-footer {f
            background-color: #fff;
            border-top: 1px solid #dee2e6;
            color: #869099;

        }

        footer {
            display: block;
        } */
    </style>

    {{-- <link rel="stylesheet" href="./style.css"> --}}

    <!-- Demo CSS -->
    {{-- <link rel="stylesheet" href="resources/css/demo.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('public/navbar-left/navbar-left.blade.php') }}"> --}}

</head>

<body>

    <div id="wrapper">
        <div class="overlay"></div>
        <div class="container-xxl">
            @include('layout.nav_left')
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper col-lg-10">
                <div class="container pt-3">
                    {{-- header_search.blade.php --}}
                    @include('layout.header_search')
                    {{-- header_search.blade.php --}}
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-lg-offset-2" style="margin: auto; background: #fff">

                            <div class="main-content">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
        <div class="container-xxl mt-3">
            @include('layout.footer_add')
        </div>
    </div>

    <!-- /#wrapper -->
    <!-- partial -->



    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>
    {{-- <script  src="{{asset('resources/js/script.js"></script> --}}
    <script src="{{ asset('resources/js/script.js') }}"></script>
    <script src="{{ asset('resources/js/sotutang.js') }}"></script>
</body>

</html>
