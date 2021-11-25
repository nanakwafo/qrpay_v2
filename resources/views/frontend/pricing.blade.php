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
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png">

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

<div class="content content-fixed content-auth-alt">
    <div class="container ht-100p tx-center">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex flex-column">
                <div class="tx-100 lh-1"><i class="icon ion-ios-bicycle"></i></div>
                <h3 class="mg-b-25">Personal</h3>
                <p class="tx-color-03 mg-b-25">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum.</p>
                <h1 class="tx-rubik tx-normal mg-b-30 mg-t-auto">$19.00</h1>
                <button class="btn btn-primary btn-block">Choose Plan</button>
            </div><!-- col -->
            <div class="col-10 col-sm-6 col-md-4 col-lg-3 mg-t-40 mg-sm-t-0 d-flex flex-column">
                <div class="tx-100 lh-1"><i class="icon ion-ios-car"></i></div>
                <h3 class="mg-b-25">Team</h3>
                <p class="tx-color-03 mg-b-25">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p>
                <h1 class="tx-rubik tx-normal mg-b-30 mg-t-auto">$99.00</h1>
                <button class="btn btn-primary btn-block">Choose Plan</button>
            </div><!-- col -->
            <div class="col-10 col-sm-6 col-md-4 col-lg-3 mg-t-40 mg-md-t-0 d-flex flex-column">
                <div class="tx-100 lh-1"><i class="icon ion-ios-boat"></i></div>
                <h3 class="mg-b-25">Corporate</h3>
                <p class="tx-color-03 mg-b-25">Nemo enim ipsam volu ptatem quia voluptas sit asp ernatur aut odit aut fugit, sed quia conse quuntur magni dolores eos qui ratione.</p>
                <h1 class="tx-rubik tx-normal mg-b-30 mg-t-auto">$199.00</h1>
                <button class="btn btn-primary btn-block">Choose Plan</button>
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- content -->

<footer class="footer">
    <div>
        <span>&copy; 2019 DashForge v1.0.0. </span>
        <span>Created by <a href="http://themepixels.me">ThemePixels</a></span>
    </div>
    <div>
        <nav class="nav">
            <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
            <a href="../../change-log.html" class="nav-link">Change Log</a>
            <a href="https://discordapp.com/invite/RYqkVuw" class="nav-link">Get Help</a>
        </nav>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"  crossorigin="anonymous"></script>
<script src="{{ url('/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ url('assets/js/feather.min.js')}}"></script>
<script src="{{ url('assets/js/perfect-scrollbar.min.js')}}"></script>


<script src="{{ url('/assets/js/dashforge.js')}}"></script>

<!-- append theme customizer -->
<script src="{{ url('/assets/js/js.cookie.js')}}"></script>
<script src="{{ url('/assets/js/dashforge.settings.js')}}"></script>


</body>
</html>
