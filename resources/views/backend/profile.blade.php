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
        <form method="post" action="{{route('updateprofile')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$platformId}}" name="platformId"/>
            <div class="container pd-x-0 tx-13">
                <div class="media d-block d-lg-flex">

                    <div class="profile-sidebar profile-sidebar-two pd-lg-r-15">

                        <div class="row">
                            <div class="col-sm-3 col-md-2 col-lg">

                                @if(!empty($details->logo))
                                    <div class="avatar avatar-xxl avatar-online profile-preview-image">
                                        <img id="preview_image" src="/uploads/{{$details->logo}}" class="rounded-circle"
                                             alt="">
                                    </div>
                                @else
                                    <div class="avatar avatar-xxl avatar-online profile-preview-image">
                                        <img id="preview_image" src="/uploads/default.png" class="rounded-circle"
                                             alt="">
                                    </div>
                                @endif

                            </div><!-- col -->
                            <div class="col-sm-8 col-md-7 col-lg mg-t-20 mg-sm-t-0 mg-lg-t-25">


                                <div class="d-flex mg-b-25">

                                    <input type="file" class="input-bordered" id="imgInp" name="logo" class="form-control btn btn-xs btn-white flex-fill">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">


                                </div>


                            </div><!-- col -->

                        </div><!-- row -->

                    </div><!-- profile-sidebar -->
                    <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">

                        <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                            <div class="wd-100p">
                                <h3 class="tx-color-01 mg-b-5">Profile</h3>
                                <p class="tx-color-03 tx-16 mg-b-40">Welcome back! </p>

                                <div class="form-group">
                                    <label>Company Name:</label>
                                    <input type="text" class="form-control" placeholder="xyzcompany" name="companyname"
                                           value="{{$details->companyname ?? ''}}" required="">
                                </div>
                                <div class="form-group">
                                    <label>Phone:</label>
                                    <input type="text" class="form-control" placeholder="0987654321" name="phone"
                                           value="{{$details->phone ?? ''}}" required="">
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" placeholder="yourname@yourmail.com"  name="email"
                                           value="{{$details->email ?? ''}}" required="">
                                </div>
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input type="text" class="form-control" placeholder="233 Nima  " name="address"
                                           value="{{$details->address ?? ''}}" required="">
                                </div>

                                <button class="btn btn-brand-02 btn-block">Save Changes</button>

                            </div>
                        </div><!-- sign-wrapper -->

                    </div><!-- media-body -->

                </div><!-- media -->
            </div><!-- container -->
        </form>
    </div><!-- content-body -->
</div><!-- content -->

<script src="https://code.jquery.com/jquery-2.2.4.min.js" crossorigin="anonymous"></script>
<script src="{{ url('/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ url('assets/js/feather.min.js')}}"></script>
<script src="{{ url('assets/js/perfect-scrollbar.min.js')}}"></script>

<script src="{{ url('/assets/js/dashforge.js')}}"></script>
<script src="{{ url('/assets/js/dashforge.aside.js')}}"></script>

<!-- append theme customizer -->
<script src="{{ url('/assets/js/js.cookie.js')}}"></script>
<script src="{{ url('/assets/js/dashforge.settings.js')}}"></script>
<script>
    $(function () {
        'use script'

        $('[data-toggle="tooltip"]').tooltip()

        window.darkMode = function () {
            $('.btn-white').addClass('btn-dark').removeClass('btn-white');
            $('.bg-white').addClass('bg-gray-900').removeClass('bg-white');
            $('.bg-gray-50').addClass('bg-dark').removeClass('bg-gray-50');
        }

        window.lightMode = function () {
            $('.btn-dark').addClass('btn-white').removeClass('btn-dark');
            $('.bg-gray-900').addClass('bg-white').removeClass('bg-gray-900');
            $('.bg-dark').addClass('bg-gray-50').removeClass('bg-dark');
        }

        var hasMode = Cookies.get('df-mode');
        if (hasMode === 'dark') {
            darkMode();
        } else {
            lightMode();
        }

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview_image').attr('src', e.target.result);
                    $('#preview_image2').attr('src', e.target.result);
                    $('#preview_image3').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        // $(document).on('change', 'input[type="file"]', function () {
        //     readURL(this);
        //
        // });
        $("#imgInp").change(function(){

            readURL2(this);
        });
    })
</script>
</body>
</html>
