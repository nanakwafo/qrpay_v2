<div class="user-sidebar">
    <div class="user-sidebar-overlay"></div>
    <div class="user-box d-none d-lg-block">
        <div class="user-image">
            @if(!empty($details->logo))
                <img id="preview_image2" src="/uploads/{{$details->logo}}" width="100%" class="img-responsive text-center" >
            @else
                <img id="preview_image2" src="/uploads/default.png" width="100%"  class="img-responsive text-center" >

            @endif
        </div>
        @if(Sentinel::check())
            <h6 class="user-name">Welcome {{Sentinel::getUser()->first_name}}</h6>

        @endif


    </div>
    <ul class="user-icon-nav">
        <li><a href="/dashboard/{{$platformId}}"><em class="ti ti-dashboard"></em>Dashboard</a></li>

        <li><a href="/qrcodes/{{$platformId}}"><em class="fa fa-qrcode"></em>QR Codes</a></li>
        <li class="dropdown-main"><a href="#"><em class="ti ti-align-justify"></em>Reports &#9662</a>
            <ul class="dropdown-values">
                <li><a href="/indexqrcodes/{{$platformId}}">Transactions</a></li>
{{--                <li><a href="/transaction/{{$platformId}}">Transactions</a></li>--}}
            </ul>
        </li>
        <li><a href="/profile/{{$platformId}}"><i class="ti ti-id-badge"></i>Account</a></li>
    </ul><!-- .user-icon-nav -->
    @if(is_null($userOnboardStatus) || $userOnboardStatus == false)
        <div class="onboard-user-verifyaccount">
            <div class="gaps-2x"></div>
            <div class="status-empty">
                <div class="status-icon">
                    <em class="ti ti-files"></em>
                    <div class="status-icon-sm">
                        <em class="ti ti-close"></em>
                    </div>
                </div>
                <span class="status-text">Please verify your payment details</span>
                <a href="/registeraccount/{{Sentinel::getUser()->email }}" target="_blank" class="btn btn-danger">CLick
                    to proceed</a>
            </div>
        </div>
    @endif
    <div class="d-lg-none">
        <div class="user-sidebar-sap"></div>
        <div class="gaps-1x"></div>
        <ul class="topbar-action-list">
            <li class="topbar-action-item topbar-action-link">
                <a href="/"><em class="ti ti-home"></em> Back to main site</a>
            </li><!-- .topbar-action-item -->

        </ul><!-- .topbar-action-list -->
    </div>
</div><!-- .user-sidebar -->

