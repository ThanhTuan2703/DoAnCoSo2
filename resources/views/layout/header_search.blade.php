<div class="container-fluid mb-3">
    <div class="d-flex ">
        <div class="col-10 col-md-8 col-xl-10 " style="text-align: center">
            {{-- <div class=" navbar-collapse " id="navbarCollapse">

                <form class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <button type="button" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i>Tìm
                            kiếm</button>
                    </div>
                </form>
            </div> --}}
            <div style="font-size: 35px;
                color: #fd1313;
                font-family: emoji;
                font-weight: 600;
                ">Hệ thống quản lý đồ án sinh viên</div>
        </div>
        <div class="col-2 col-md-4 col-xl-3">
            {{-- <div class="navbar-nav">{{ Auth::user()->name }}
                <a href="{{route('signout')}}"class="btn btn-primary">Logout</a> --}}
            @auth
                <div class='dash text-center'>{{ Auth::user()->name }}
                    <div><button class="text-white btn btn-info "><a href="{{ route('login') }}" style="color: white; text-decoration: none; ">Logout</a> </button></div>
                </div>
            @endauth

        </div>
    </div>
</div>
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>
{{-- <script  src="resources/js/script.js"></script>
  <script  src="resources/js/table.js"></script> --}}
<script src="{{ asset('resources/js/script.js') }}"></script>
