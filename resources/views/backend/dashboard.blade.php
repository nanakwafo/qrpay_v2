<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.png">

    <title>Make Payment using QrCode</title>


      <!-- vendor css -->
      <link href="{{ url('/assets/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
      <link href="{{ url('/assets/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{ url('/assets/lib/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

    <!-- DashForge CSS -->
      <link rel="stylesheet" href="{{ url('assets/css/dashforge.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/dashforge.dashboard.css')}}">
  </head>
  <body>

    @include('shared.backend.navigation')

    <div class="content ht-100v pd-0">
      <div class="content-header">
        <div class="content-search">
          <i data-feather="search"></i>
          <input type="search" class="form-control" placeholder="Search...">
        </div>
        <nav class="nav">
          <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
          <a href="" class="nav-link"><i data-feather="grid"></i></a>
          <a href="" class="nav-link"><i data-feather="align-left"></i></a>
        </nav>
      </div><!-- content-header -->

      <div class="content-body">
        <div class="container pd-x-0">
          <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Sales Monitoring</li>
                </ol>
              </nav>
              <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
            </div>
            <div class="d-none d-md-block">
              <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="mail" class="wd-10 mg-r-5"></i> Email</button>
              <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="printer" class="wd-10 mg-r-5"></i> Print</button>
              <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Generate Report</button>
            </div>
          </div>

          <div class="row row-xs">
            <div class="col-sm-6 col-lg-3">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Conversion Rate</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">0.81%</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">1.2% <i class="icon ion-md-arrow-up"></i></span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart3" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Unique Purchases</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">3,137</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">0.7% <i class="icon ion-md-arrow-down"></i></span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart4" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Avg. Order Value</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">$306.20</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-danger">0.3% <i class="icon ion-md-arrow-down"></i></span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart5" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->
            <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
              <div class="card card-body">
                <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Order Quantity</h6>
                <div class="d-flex d-lg-block d-xl-flex align-items-end">
                  <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">1,650</h3>
                  <p class="tx-11 tx-color-03 mg-b-0"><span class="tx-medium tx-success">2.1% <i class="icon ion-md-arrow-up"></i></span></p>
                </div>
                <div class="chart-three">
                    <div id="flotChart6" class="flot-chart ht-30"></div>
                  </div><!-- chart-three -->
              </div>
            </div><!-- col -->

            <div class="col-md-6 col-xl-4 mg-t-10">
              <div class="card ht-100p">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="mg-b-0">Transaction History</h6>
                  <div class="d-flex tx-18">
                    <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                    <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                  </div>
                </div>
                <ul class="list-group list-group-flush tx-13">
                  <li class="list-group-item d-flex pd-sm-x-20">
                    <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-teal"><i class="icon ion-md-checkmark"></i></span></div>
                    <div class="pd-sm-l-10">
                      <p class="tx-medium mg-b-0">Payment from #10322</p>
                      <small class="tx-12 tx-color-03 mg-b-0">Mar 21, 2019, 3:30pm</small>
                    </div>
                    <div class="mg-l-auto text-right">
                      <p class="tx-medium mg-b-0">+ $250.00</p>
                      <small class="tx-12 tx-success mg-b-0">Completed</small>
                    </div>
                  </li>
                  <li class="list-group-item d-flex pd-sm-x-20">
                    <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-indigo op-5"><i class="icon ion-md-return-left"></i></span></div>
                    <div class="pd-sm-l-10">
                      <p class="tx-medium mg-b-2">Process refund to #00910</p>
                      <small class="tx-12 tx-color-03 mg-b-0">Mar 21, 2019, 1:00pm</small>
                    </div>
                    <div class="mg-l-auto text-right">
                      <p class="tx-medium mg-b-2">-$16.50</p>
                      <small class="tx-12 tx-success mg-b-0">Completed</small>
                    </div>
                  </li>
                  <li class="list-group-item d-flex pd-sm-x-20">
                    <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-orange op-5"><i class="icon ion-md-bus"></i></span></div>
                    <div class="pd-sm-l-10">
                      <p class="tx-medium mg-b-2">Process delivery to #44333</p>
                      <small class="tx-12 tx-color-03 mg-b-0">Mar 20, 2019, 11:40am</small>
                    </div>
                    <div class="mg-l-auto text-right">
                      <p class="tx-medium mg-b-2">3 Items</p>
                      <small class="tx-12 tx-info mg-b-0">For pickup</small>
                    </div>
                  </li>
                  <li class="list-group-item d-flex pd-sm-x-20">
                    <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-teal"><i class="icon ion-md-checkmark"></i></span></div>
                    <div class="pd-sm-l-10">
                      <p class="tx-medium mg-b-0">Payment from #023328</p>
                      <small class="tx-12 tx-color-03 mg-b-0">Mar 20, 2019, 10:30pm</small>
                    </div>
                    <div class="mg-l-auto text-right">
                      <p class="tx-medium mg-b-0">+ $129.50</p>
                      <small class="tx-12 tx-success mg-b-0">Completed</small>
                    </div>
                  </li>
                  <li class="list-group-item d-flex pd-sm-x-20">
                    <div class="avatar d-none d-sm-block"><span class="avatar-initial rounded-circle bg-gray-400"><i class="icon ion-md-close"></i></span></div>
                    <div class="pd-sm-l-10">
                      <p class="tx-medium mg-b-0">Payment failed from #087651</p>
                      <small class="tx-12 tx-color-03 mg-b-0">Mar 19, 2019, 12:54pm</small>
                    </div>
                    <div class="mg-l-auto text-right">
                      <p class="tx-medium mg-b-0">$150.00</p>
                      <small class="tx-12 tx-danger mg-b-0">Declined</small>
                    </div>
                  </li>
                </ul>
                <div class="card-footer text-center tx-13">
                  <a href="" class="link-03">View All Transactions <i class="icon ion-md-arrow-down mg-l-5"></i></a>
                </div><!-- card-footer -->
              </div><!-- card -->
            </div>
            <div class="col-md-6 col-xl-4 mg-t-10">
              <div class="card ht-100p">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="mg-b-0">New Customers</h6>
                  <div class="d-flex align-items-center tx-18">
                    <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                    <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                  </div>
                </div>
                <ul class="list-group list-group-flush tx-13">
                  <li class="list-group-item d-flex pd-sm-x-20">
                    <div class="avatar"><span class="avatar-initial rounded-circle bg-gray-600">s</span></div>
                    <div class="pd-l-10">
                      <p class="tx-medium mg-b-0">Socrates Itumay</p>
                      <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00222</small>
                    </div>
                    <div class="mg-l-auto d-flex align-self-center">
                      <nav class="nav nav-icon-only">
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                        <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                      </nav>
                    </div>
                  </li>
                  <li class="list-group-item d-flex pd-x-20">
                    <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                    <div class="pd-l-10">
                      <p class="tx-medium mg-b-0">Reynante Labares</p>
                      <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00221</small>
                    </div>
                    <div class="mg-l-auto d-flex align-self-center">
                      <nav class="nav nav-icon-only">
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                        <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                      </nav>
                    </div>
                  </li>
                  <li class="list-group-item d-flex pd-x-20">
                    <div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                    <div class="pd-l-10">
                      <p class="tx-medium mg-b-0">Marianne Audrey</p>
                      <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00220</small>
                    </div>
                    <div class="mg-l-auto d-flex align-self-center">
                      <nav class="nav nav-icon-only">
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                        <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                      </nav>
                    </div>
                  </li>
                  <li class="list-group-item d-flex pd-x-20">
                    <div class="avatar"><span class="avatar-initial rounded-circle bg-indigo op-5">o</span></div>
                    <div class="pd-l-10">
                      <p class="tx-medium mg-b-0">Owen Bongcaras</p>
                      <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00219</small>
                    </div>
                    <div class="mg-l-auto d-flex align-self-center">
                      <nav class="nav nav-icon-only">
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                        <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                      </nav>
                    </div>
                  </li>
                  <li class="list-group-item d-flex pd-x-20">
                    <div class="avatar"><span class="avatar-initial rounded-circle bg-primary op-5">k</span></div>
                    <div class="pd-l-10">
                      <p class="tx-medium mg-b-0">Kirby Avendula</p>
                      <small class="tx-12 tx-color-03 mg-b-0">Customer ID#00218</small>
                    </div>
                    <div class="mg-l-auto d-flex align-self-center">
                      <nav class="nav nav-icon-only">
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
                        <a href="" class="nav-link d-none d-sm-block"><i data-feather="user"></i></a>
                        <a href="" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
                      </nav>
                    </div>
                  </li>
                </ul>
                <div class="card-footer text-center tx-13">
                  <a href="" class="link-03">View More Customers <i class="icon ion-md-arrow-down mg-l-5"></i></a>
                </div><!-- card-footer -->
              </div><!-- card -->
            </div>
            <div class="col-md-6 col-xl-4 mg-t-10">
              <div class="card ht-lg-100p">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h6 class="mg-b-0">Real-Time Sales</h6>
                  <ul class="list-inline d-flex mg-b-0">
                    <li class="list-inline-item d-flex align-items-center">
                      <span class="d-block wd-10 ht-10 bg-df-2 rounded mg-r-5"></span>
                      <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Today</span>
                    </li>
                    <li class="list-inline-item d-flex align-items-center mg-l-10">
                      <span class="d-block wd-10 ht-10 bg-df-3 rounded mg-r-5"></span>
                      <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Yesterday</span>
                    </li>
                  </ul>
                </div><!-- card-header -->
                <div class="card-body pd-b-0">
                  <div class="row mg-b-20">
                    <div class="col">
                      <h5 class="tx-normal tx-rubik tx-spacing--1 mg-b-10">$150,200 <small class="tx-11 tx-success letter-spacing--2"><i class="icon ion-md-arrow-up"></i> 0.20%</small></h5>
                      <p class="tx-10 tx-uppercase tx-spacing-1 tx-medium tx-color-03">Total Sales</p>
                    </div>
                    <div class="col">
                      <h5 class="tx-normal tx-rubik tx-spacing--1 mg-b-10">$21,880 <small class="tx-11 tx-danger letter-spacing--2"><i class="icon ion-md-arrow-down"></i> 1.04%</small></h5>
                      <p class="tx-10 tx-uppercase tx-spacing-1 tx-medium tx-color-03">Avg. Sales Per Day</p>
                    </div>
                  </div><!-- row -->
                  <div class="chart-five">
                    <div><canvas id="chartBar1"></canvas></div>
                  </div>
                </div><!-- card-body -->
              </div>
            </div>
          </div><!-- row -->
        </div><!-- container -->
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"  crossorigin="anonymous"></script>
    <script src="{{ url('/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('assets/js/feather.min.js')}}"></script>
    <script src="{{ url('assets/js/perfect-scrollbar.min.js')}}"></script>

    <script src="{{ url('assets/js/jquery.flot.js')}}"></script>
    <script src="{{ url('assets/js/jquery.flot.stack.js')}}"></script>
    <script src="{{ url('assets/js/jquery.flot.resize.js')}}"></script>
    <script src="{{ url('assets/js/Chart.bundle.min.js')}}"></script>
    <script src="{{ url('assets/js/jquery.vmap.min.js')}}"></script>
    <script src="{{ url('assets/js/jquery.vmap.usa.js')}}"></script>

    <script src="{{ url('/assets/js/dashforge.js')}}"></script>
    <script src="{{ url('/assets/js/dashforge.aside.js')}}"></script>

    <script src="{{ url('assets/js/dashforge.sampledata.js')}}"></script>
    <script src="{{ url('assets/js/dashboard-one.js')}}"></script>

    <!-- append theme customizer -->
    <script src="{{ url('/assets/js/js.cookie.js')}}"></script>
    <script src="{{ url('/assets/js/dashforge.settings.js')}}"></script>
  </body>
</html>
