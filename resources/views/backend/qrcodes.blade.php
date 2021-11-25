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

    <title>DashForge Responsive Bootstrap 4 Dashboard Template</title>

      <!-- vendor css -->
      <link href="{{ url('/assets/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
      <link href="{{ url('/assets/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- DashForge CSS -->
      <link rel="stylesheet" href="{{ url('assets/css/dashforge.css')}}">
      <link rel="stylesheet" href="{{ url('assets/css/dashforge.profile.css')}}">
  </head>
  <body class="page-profile">

  @include('shared.backend.navigation')

  <div class="content ht-100v pd-0">
      <div class="content-header">
        <div class="content-search">
          <i data-feather="search"></i>
          <input type="search" class="form-control" placeholder="Search">
        </div>
        <nav class="nav">
          <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
          <a href="" class="nav-link"><i data-feather="grid"></i></a>
          <a href="" class="nav-link"><i data-feather="align-left"></i></a>
        </nav>
      </div><!-- content-header -->

      <div class="content-body">
        <div class="container pd-x-0 tx-13">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-5">
              <li class="breadcrumb-item"><a href="#">Your Profile</a></li>
              <li class="breadcrumb-item active" aria-current="page">Connections</li>
            </ol>
          </nav>
          <h4 class="mg-b-25">Connections</h4>

          <div class="row">
            <div class="col-lg-8 col-xl-9">
              <ul class="nav nav-line nav-line-profile mg-b-30">
                <li class="nav-item">
                  <a href="" class="nav-link d-flex align-items-center active">Followers <span class="badge">340</span></a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link">Following <span class="badge">1,563</span></a>
                </li>
                <li class="nav-item d-none d-sm-block">
                  <a href="" class="nav-link">Request  <span class="badge">19</span></a>
                </li>
              </ul>

              <div class="row row-xs mg-b-25 profile-list">
                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3">
                  <div class="card card-profile">
                    <img src="https://via.placeholder.com/500" class="card-img-top" alt="">
                    <div class="card-body tx-13">
                      <div>
                        <a href="">
                          <div class="avatar avatar-lg"><img src="https://via.placeholder.com/350" class="rounded-circle" alt=""></div>
                        </a>
                        <h5><a href="">Zhen Juan Chiu</a></h5>
                        <p>Software Engineer</p>
                        <button class="btn btn-block btn-white">Follow</button>
                      </div>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3 mg-t-10 mg-sm-t-0">
                  <div class="card card-profile">
                    <img src="https://via.placeholder.com/500x281" class="card-img-top" alt="">
                    <div class="card-body tx-13">
                      <div>
                        <a href="">
                          <div class="avatar avatar-lg"><img src="https://via.placeholder.com/600" class="rounded-circle" alt=""></div>
                        </a>
                        <h5><a href="">Barbara Marion</a></h5>
                        <p>Tech Executive</p>
                        <button class="btn btn-block btn-white">Follow</button>
                      </div>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3 mg-t-10 mg-sm-t-0">
                  <div class="card card-profile">
                    <img src="https://via.placeholder.com/500" class="card-img-top" alt="">
                    <div class="card-body tx-13">
                      <div>
                        <a href="">
                          <div class="avatar avatar-lg"><span class="avatar-initial rounded-circle bg-teal">c</span></div>
                        </a>
                        <h5><a href="">Christine Arnold</a></h5>
                        <p>Lead Designer</p>
                        <button class="btn btn-block btn-primary">Unfollow</button>
                      </div>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3 mg-t-10 mg-md-t-0 mg-lg-t-10 mg-xl-t-0">
                  <div class="card card-profile">
                    <img src="https://via.placeholder.com/1000x666" class="card-img-top" alt="">
                    <div class="card-body tx-13">
                      <div>
                        <a href="">
                          <div class="avatar avatar-lg"><span class="avatar-initial rounded-circle bg-pink">n</span></div>
                        </a>
                        <h5><a href="">Natalie Corwin</a></h5>
                        <p>Product Designer</p>
                        <button class="btn btn-block btn-white">Follow</button>
                      </div>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3 mg-t-10">
                  <div class="card card-profile">
                    <img src="https://via.placeholder.com/1000x666" class="card-img-top" alt="">
                    <div class="card-body tx-13">
                      <div>
                        <a href="">
                          <div class="avatar avatar-lg"><span class="avatar-initial rounded-circle bg-gray-300">c</span></div>
                        </a>
                        <h5><a href="">Carolyn Park</a></h5>
                        <p>Lead Designer</p>
                        <button class="btn btn-block btn-white">Follow</button>
                      </div>
                    </div>
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3 mg-t-10">
                  <div class="card card-profile">
                    <img src="https://via.placeholder.com/640x427" class="card-img-top" alt="">
                    <div class="card-body tx-13">
                      <div>
                        <a href="">
                          <div class="avatar avatar-lg"><span class="avatar-initial rounded-circle bg-gray-900">d</span></div>
                        </a>
                        <h5><a href="">Debbie Hite</a></h5>
                        <p>Lead Animator</p>
                        <button class="btn btn-block btn-primary">Unfollow</button>
                      </div>
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3 mg-t-10">
                  <div class="card card-profile">
                    <img src="https://via.placeholder.com/640x360" class="card-img-top" alt="">
                    <div class="card-body tx-13">
                      <div>
                        <a href="">
                          <div class="avatar avatar-lg"><span class="avatar-initial rounded-circle bg-success">s</span></div>
                        </a>
                        <h5><a href="">Sandra Valles</a></h5>
                        <p>Software Architect</p>
                        <button class="btn btn-block btn-white">Follow</button>
                      </div>
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3 mg-t-10">
                  <div class="card card-profile">
                    <img src="https://via.placeholder.com/640x426" class="card-img-top" alt="">
                    <div class="card-body tx-13">
                      <div>
                        <a href="">
                          <div class="avatar avatar-lg"><span class="avatar-initial rounded-circle bg-indigo">s</span></div>
                        </a>
                        <h5><a href="">Patrick Miramon</a></h5>
                        <p>Software Engineer</p>
                        <button class="btn btn-block btn-white">Follow</button>
                      </div>
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3 mg-t-10">
                  <div class="card card-profile">
                    <img src="https://via.placeholder.com/640x360" class="card-img-top" alt="">
                    <div class="card-body tx-13">
                      <div>
                        <a href="">
                          <div class="avatar avatar-lg"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                        </a>
                        <h5><a href="">Amalia Redfern</a></h5>
                        <p>Front-end Engineer</p>
                        <button class="btn btn-block btn-primary">Unfollow</button>
                      </div>
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-4 col-md-3 col-lg-4 col-xl-3 mg-t-10">
                  <div class="card card-profile">
                    <img src="https://via.placeholder.com/640x427" class="card-img-top" alt="">
                    <div class="card-body tx-13">
                      <div>
                        <a href="">
                          <div class="avatar avatar-lg"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                        </a>
                        <h5><a href="">Carole Rossignol</a></h5>
                        <p>Software Engineer</p>
                        <button class="btn btn-block btn-white">Follow</button>
                      </div>
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->
              </div><!-- row -->

              <button class="btn btn-block btn-sm btn-white">Load more</button>
            </div><!-- col -->
            <div class="col-lg-4 col-xl-3 mg-t-40 mg-lg-t-0">
              <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-12 order-sm-1 order-md-0 mg-sm-t-40 mg-md-t-0">
                  <div class="d-flex align-items-center justify-content-between mg-b-20">
                    <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-b-0">People You May Know</h6>
                  </div>
                  <ul class="list-unstyled media-list tx-13 mg-b-0">
                    <li class="media align-items-center">
                      <a href=""><div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div></a>
                      <div class="media-body pd-l-15">
                        <p class="tx-medium mg-b-2"><a href="" class="link-01">Allan Ray Palban</a></p>
                        <span class="tx-12 tx-color-03">Senior Business Analyst</span>
                      </div>
                    </li>
                    <li class="media align-items-center mg-t-15">
                      <a href=""><div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div></a>
                      <div class="media-body pd-l-15">
                        <p class="tx-medium mg-b-2"><a href="" class="link-01">Rhea Castanares</a></p>
                        <span class="tx-12 tx-color-03">Product Designer</span>
                      </div>
                    </li>
                    <li class="media align-items-center mg-t-15">
                      <a href=""><div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div></a>
                      <div class="media-body pd-l-15">
                        <p class="tx-medium mg-b-2"><a href="" class="link-01">Philip Cesar Galban</a></p>
                        <span class="tx-12 tx-color-03">Executive Assistant</span>
                      </div>
                    </li>
                    <li class="media align-items-center mg-t-15">
                      <a href=""><div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div></a>
                      <div class="media-body pd-l-15">
                        <p class="tx-medium mg-b-2"><a href="" class="link-01">Randy Macapala</a></p>
                        <span class="tx-12 tx-color-03">Business Entrepreneur</span>
                      </div>
                    </li>
                    <li class="media align-items-center mg-t-15">
                      <a href=""><div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div></a>
                      <div class="media-body pd-l-15">
                        <p class="tx-medium mg-b-2"><a href="" class="link-01">Abigail Johnson</a></p>
                        <span class="d-block tx-12 tx-color-03">System Administrator</span>
                      </div>
                    </li>
                  </ul>
                </div><!-- col -->
                <div class="col-sm-6 col-md-4 col-lg-12 mg-t-40 mg-md-t-0 mg-lg-t-40">
                  <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-b-15">Discover By Position</h6>

                  <nav class="nav nav-classic tx-13">
                    <a href="" class="nav-link"><span>Software Engineer</span> <span class="badge">20</span></a>
                    <a href="" class="nav-link"><span>UI/UX Designer</span> <span class="badge">18</span></a>
                    <a href="" class="nav-link"><span>Sales Representative</span> <span class="badge">14</span></a>
                    <a href="" class="nav-link"><span>Product Representative</span> <span class="badge">12</span></a>
                    <a href="" class="nav-link"><span>Full-Stack Developer</span> <span class="badge">10</span></a>
                  </nav>
                </div><!-- col -->
                <div class="col-sm-6 col-md-4 col-lg-12 mg-t-40 mg-md-t-0 mg-lg-t-40">
                  <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-b-15">Discover By Location</h6>

                  <nav class="nav nav-classic tx-13">
                    <a href="" class="nav-link"><span>San Francisco, California</span> <span class="badge">20</span></a>
                    <a href="" class="nav-link"><span>Los Angeles, California</span> <span class="badge">18</span></a>
                    <a href="" class="nav-link"><span>Las Vegas, Nevada</span> <span class="badge">14</span></a>
                    <a href="" class="nav-link"><span>Austin, Texas</span> <span class="badge">12</span></a>
                    <a href="" class="nav-link"><span>Arlington, Nebraska</span> <span class="badge">10</span></a>
                  </nav>
                </div><!-- col -->
              </div><!-- row -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- container -->
      </div><!-- content-body -->
    </div><!-- content -->

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"  crossorigin="anonymous"></script>
    <script src="{{ url('/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('assets/js/feather.min.js')}}"></script>
    <script src="{{ url('assets/js/perfect-scrollbar.min.js')}}"></script>

    <script src="{{ url('/assets/js/dashforge.js')}}"></script>
  <script src="{{ url('/assets/js/dashforge.aside.js')}}"></script>

    <!-- append theme customizer -->
    <script src="{{ url('/assets/js/js.cookie.js')}}"></script>
    <script src="{{ url('/assets/js/dashforge.settings.js')}}"></script>

  </body>
</html>
