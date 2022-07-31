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
        <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">
            <form method="post" id="qrcodgenerateBtnupload_form" enctype="multipart/form-data">
                @csrf
                <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                    <div class="wd-100p">
                        <h3 class="tx-color-01 mg-b-5">Create Qrcode</h3>
                        <p class="tx-color-03 tx-16 mg-b-40">Welcome back! </p>
                        <input type="hidden" value="{{$platformId}}" name="qrCodegeneratorForm_platformId"
                               id="qrCodegeneratorForm_platformId">
                        <input type="hidden" id="qrcodePlatformId" value="{{env('APP_URL').'/qrcodes/'.$platformId}}"/>
                        <div class="form-group">
                            <label>Collection Name:</label>
                            <input type="text" class="form-control" placeholder="xyzcompany" name="collectionName"
                                   required="">
                        </div>
                        <div class="form-group">
                            <label>Organisations NZBN/charity number:</label>
                            <input type="text" class="form-control" placeholder="0987654321" name="companyreg"
                                   required="">
                        </div>
                        <div class="form-group">
                            <label>Qrcode brand logo:</label>
                            <input type="email" class="form-control" placeholder="yourname@yourmail.com"
                                   name="collectionFile" required="">
                        </div>
                        <div class="">

                            <label for="Set-Amount" class="input-item-label">Set Amount:</label>
                            <div class="create-amount">
                                <input class="form-control" type="text" id="collection_amount"placeholder="0.00" >
                                <input type="button" class="add-row btn btn-primary" value="+" >
                            </div>

                            <div class="table-responsive qrcode-table">
                                <table id="amount_table"  class="table">
                                    <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <button type="button" class="delete-row btn btn-danger">-</button>
                            </div>


                        </div>
                        <button class="btn btn-brand-02 btn-block">Save Changes</button>

                    </div>
                </div><!-- sign-wrapper -->
            </form>
        </div><!-- media-body -->

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


    })
</script>
</body>
</html>
