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

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/dashforge.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/dashforge.auth.css')}}">
</head>
<body>

@include('shared.frontend.navigation')

<div class="content content-fixed content-auth">
    <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p">
            <div class="sign-wrapper mg-lg-r-50 mg-xl-r-60">
                <div class="pd-t-20 wd-100p">
                    <h4 class="tx-color-01 mg-b-5">Create New Account</h4>
                    <p class="tx-color-03 tx-16 mg-b-40">It's free to signup and only takes a minute.</p>
                    <form action="{{route('updatepassword')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email address">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0-f">Password</label>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                        </div>
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="fname" class="form-control" placeholder="Enter your firstname">
                        </div>


                        <div class="form-group tx-12">
                            By clicking <strong>Create an account</strong> below, you agree to our terms of service and
                            privacy statement.
                        </div><!-- form-group -->

                        <button type="submit" class="btn btn-brand-02 btn-block">Create Account</button>
                    </form>
                    <div class="divider-text">or</div>
                    <button class="btn btn-outline-facebook btn-block">Sign Up With Facebook</button>
                    <button class="btn btn-outline-twitter btn-block">Sign Up With Twitter</button>
                    <div class="tx-13 mg-t-20 tx-center">Already have an account? <a href="/signin">Sign In</a>
                    </div>
                </div>
            </div><!-- sign-wrapper -->
            <div class="media-body pd-y-30 pd-lg-x-50 pd-xl-x-60 align-items-center d-none d-lg-flex pos-relative">
                <div class="mx-lg-wd-500 mx-xl-wd-550">
                    <img src="assets/img/undraw_online_transactions_02ka.png" class="img-fluid" alt="">
                </div>
                <div class="pos-absolute b-0 r-0 tx-12">
                    Social media marketing vector is created by <a href="https://www.freepik.com/pikisuperstar"
                                                                   target="_blank">pikisuperstar (freepik.com)</a>
                </div>
            </div><!-- media-body -->
        </div><!-- media -->
    </div><!-- container -->
</div><!-- content -->

@include('shared.frontend.footer')

<script src="https://code.jquery.com/jquery-2.2.4.min.js" crossorigin="anonymous"></script>
<script src="{{ url('/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ url('assets/js/feather.min.js')}}"></script>
<script src="{{ url('assets/js/perfect-scrollbar.min.js')}}"></script>


<script src="{{ url('/assets/js/dashforge.js')}}"></script>

<!-- append theme customizer -->
<script src="{{ url('/assets/js/js.cookie.js')}}"></script>
<script src="{{ url('/assets/js/dashforge.settings.js')}}"></script>
<script>
    $(function () {
        'use script'

        window.darkMode = function () {
            $('.btn-white').addClass('btn-dark').removeClass('btn-white');
        }

        window.lightMode = function () {
            $('.btn-dark').addClass('btn-white').removeClass('btn-dark');
        }

        var hasMode = Cookies.get('df-mode');
        if (hasMode === 'dark') {
            darkMode();
        } else {
            lightMode();
        }
    })
</script>
</body>
</html>


