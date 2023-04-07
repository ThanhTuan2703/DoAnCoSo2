@extends('index')

@section('content')
                <h2 class="mb-5 text-black"> Thống kê</h2>
                                  <div class="header-body">
                                    <div class="row">
                                      <div class="col-xl-4 col-lg-6">
                                        <div class="card card-stats mb-4 mb-xl-0">
                                          <div class="card-body bg-red">
                                            <div class="row">
                                              <div class="col">
                                                <h5 class="card-title text-uppercase mb-0 text-white">Tổng số sinh viên</h5>
                                                <span class="h2 font-weight-bold mb-0 text-white">{{$tongsinhvien}}</span>
                                              </div>
                                              <div class="col-auto">
                                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                  <i class="fas fa-chart-bar"></i>
                                                </div>
                                              </div>
                                            </div>
                                            {{-- <p class="mt-3 mb-0 text-muted text-sm">
                                              <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                              <span class="text-nowrap">Since last month</span>
                                            </p> --}}
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-xl-4 col-lg-6">
                                        <div class="card card-stats mb-4 mb-xl-0">
                                          <div class="card-body bg-yellow">
                                            <div class="row">
                                              <div class="col">
                                                <h5 class="card-title text-uppercase mb-0 text-white ">Tổng số lớp</h5>
                                                <span class="h2 font-weight-bold mb-0 text-white">{{$tonglop}}</span>
                                              </div>
                                              <div class="col-auto">
                                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                  <i class="fas fa-chart-pie"></i>
                                                </div>
                                              </div>
                                            </div>
                                            {{-- <p class="mt-3 mb-0 text-muted text-sm">
                                              <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                              <span class="text-nowrap">Since last week</span>
                                            </p> --}}
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-xl-4 col-lg-6">
                                          <div class="card card-stats mb-4 mb-xl-0">
                                            <div class="card-body bg-blue">
                                              <div class="row">
                                                <div class="col">
                                                  <h5 class="card-title text-uppercase  mb-0 text-white ">Tổng số chuyên ngành</h5>
                                                  <span class="h2 font-weight-bold mb-0 text-white">{{$tongchuyennganh}}</span>
                                                </div>
                                                <div class="col-auto">
                                                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                    <i class="fas fa-chart-pie"></i>
                                                  </div>
                                                </div>
                                              </div>
                                              {{-- <p class="mt-3 mb-0 text-muted text-sm">
                                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                                <span class="text-nowrap">Since last week</span>
                                              </p> --}}
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 pt-4">
                                          <div class="card card-stats mb-4 mb-xl-0">
                                            <div class="card-body bg-red">
                                              <div class="row">
                                                <div class="col">
                                                  <h5 class="card-title text-uppercase  mb-0 text-white ">Tổng số khoa</h5>
                                                  <span class="h2 font-weight-bold mb-0 text-white">{{$tongkhoa}}</span>
                                                </div>
                                                <div class="col-auto">
                                                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                    <i class="fas fa-chart-pie"></i>
                                                  </div>
                                                </div>
                                              </div>
                                              {{-- <p class="mt-3 mb-0 text-muted text-sm">
                                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                                <span class="text-nowrap">Since last week</span>
                                              </p> --}}
                                            </div>
                                          </div>
                                        </div>
                                      <div class="col-xl-4 col-lg-6 pt-4">
                                        <div class="card card-stats mb-4 mb-xl-0">
                                          <div class="card-body bg-yellow">
                                            <div class="row">
                                              <div class="col">
                                                <h5 class="card-title text-uppercase mb-0 text-white">Tổng số đồ án</h5>
                                                <span class="h2 font-weight-bold mb-0 text-white">{{$tongdoan}}</span>
                                              </div>
                                              <div class="col-auto">
                                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                  <i class="fas fa-users"></i>
                                                </div>
                                              </div>
                                            </div>
                                            {{-- <p class="mt-3 mb-0 text-muted text-sm">
                                              <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                              <span class="text-nowrap">Since yesterday</span>
                                            </p> --}}
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-xl-4 col-lg-6 pt-4">
                                        <div class="card card-stats mb-4 mb-xl-0">
                                          <div class="card-body bg-blue">
                                            <div class="row">
                                              <div class="col">
                                                <h5 class="card-title text-uppercase mb-0 text-white ">Tổng số giảng viên</h5>
                                                <span class="h2 font-weight-bold mb-0  text-white">{{$tonggiangvien}}</span>
                                              </div>
                                              <div class="col-auto">
                                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                  <i class="fas fa-percent"></i>
                                                </div>
                                              </div>
                                            </div>
                                            {{-- <p class="mt-3 mb-0 text-muted text-sm">
                                              <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                              <span class="text-nowrap">Since last month</span>
                                            </p> --}}
                                          </div>
                                        </div>
                                      </div>
                                      {{-- <div class="col-xl-6 col-lg-6 pt-4">
                                          <div class="card card-stats mb-4 mb-xl-0">
                                            <div class="card-body bg-red">
                                              <div class="row">
                                                <div class="col">
                                                  <h5 class="card-title text-uppercase  mb-0 text-white">Sinh viên chưa đạt</h5>
                                                  <span class="h2 font-weight-bold mb-0 text-white">1</span>
                                                </div>
                                                <div class="col-auto">
                                                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                    <i class="fas fa-percent"></i>
                                                  </div>
                                                </div>
                                              </div>

                                            </div>
                                          </div>
                                        </div> --}}
                                        {{-- <div class="col-xl-6 col-lg-6 pt-4">
                                          <div class="card card-stats mb-4 mb-xl-0">
                                            <div class="card-body bg-yellow">
                                              <div class="row">
                                                <div class="col">
                                                  <h5 class="card-title text-uppercase  mb-0 text-white">Tổng số giảng viên</h5>
                                                  <span class="h2 font-weight-bold mb-0  text-white">{{$tonggiangvien}}</span>
                                                </div>
                                                <div class="col-auto">
                                                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                    <i class="fas fa-percent"></i>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div> --}}
                                    </div>
                                  </div>

<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>
<script src="{{ asset('resources/js/script.js') }}"></script>
    {{-- <script  src="resources/js/sotutang.js"></script> --}}
@endsection
