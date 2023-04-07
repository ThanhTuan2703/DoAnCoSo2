<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css'>
<link rel="stylesheet" href="resources/css/style.css">
<link rel="stylesheet" href="responsive_table.css">
<style>
    @media (max-width: 992px) {
        #wrapper.toggled #sidebar-wrapper {
            width: 70px !important;
        }

        #wrapper.toggled {
            padding-left: 50px !important;
        }

        li {
            width: 100% !important;
        }

        .sidebar-nav {
            width: 100% !important;
        }

        /* .sidebar-nav li {

    width: 50%;
} */
        .sidebar-nav li a i {
            text-align: center !important;
            width: 100% !important;
        }

        .sidebar-nav {
            display: flex !important;
            flex-direction: column !important;
        }

        /* #sidebar-wrapper {
    min-height: 100%;
    width: 70px;
    padding: 0;
    z-index: 9999;
} */
        .none {
            display: none !important;
        }

        .sidebar-nav li a {
            padding: 12px 2px !important;
            text-align: center !important;
            font-size: 10px !important;
        }
    }
</style>
<nav class="navbar navbar-inverse fixed-top col-lg-2" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <div class="sidebar-header">
            <div class="sidebar-brand">
                <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                    <span class="hamb-top"></span>
                    <span class="hamb-middle"></span>
                    <span class="hamb-bottom"></span>
                </button>
                <a class="none" href="{{ route('trangchu') }}">Trang chủ</a>
            </div>
        </div>
        <li><a href="{{ route('khoa.khoa') }}"><i class="fa-solid fa-people-roof"></i> Quản lý khoa</a></li>
        <li><a href="{{ route('chuyennganh.chuyennganh') }}"><i class="fa-solid fa-people-roof"></i> Quản lý chuyên
                ngành</a></li>
        <li><a href="{{ route('hedaotao.hedaotao') }}"><i class="fa-solid fa-people-roof"></i> Quản lý hệ đào tạo</a>
        </li>
        <li><a href="{{ route('nienkhoa.nienkhoa') }}"><i class="fa-solid fa-people-roof"></i> Quản lý niên khóa</a></li>
        <li><a href="{{ route('lop.lop') }}"><i class="fa-solid fa-people-roof"></i> Quản lý lớp</a></li>
        <li><a href="{{ route('giangvien.giangvien') }}"><i class="fa-solid fa-people-roof"></i> Quản lý giảng viên</a></li>
        <li><a href="{{ route('sinhvien.sinhvien') }}"><i class="fa-solid fa-people-roof"></i> Quản lý sinh viên</a></li>
        <li><a href="{{ route('doan.doan') }}"><i class="fa-solid fa-people-roof"></i> Danh sách đồ án</a></li>
        <li><a href="{{ route('quanly.quanly') }}"><i class="fa-solid fa-people-roof"></i> Quản lý</a></li>
    </ul>
</nav>
