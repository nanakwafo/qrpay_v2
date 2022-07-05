<div class="topbar">
    <div class="topbar-md d-lg-none">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="toggle-nav">
                    <div class="toggle-icon">
                        <span class="toggle-line"></span>
                        <span class="toggle-line"></span>
                        <span class="toggle-line"></span>
                        <span class="toggle-line"></span>
                    </div>
                </a><!-- .toggle-nav -->

                <div class="site-logo">
                    <a href="/" class="site-brand">
                        <img src="{{asset('images/original-logo.png')}}" alt="logo" srcset="{{asset('images/original-logo.png')}}" width="165px" height="50px">
                    </a>
                </div><!-- .site-logo -->

                <div class="dropdown topbar-action-item topbar-action-user">
                    <a href="#" data-toggle="dropdown"> <img class="icon" src="{{asset('images/original-logo.png')}}" alt="thumb"> </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="user-dropdown">
                            <div class="user-dropdown-head">
                                @if(Sentinel::check())
                                    <h6 class="user-dropdown-name">{{Sentinel::getUser()->first_name}}</h6>
                                @endif

                                    @if(Sentinel::check())

                                        <span class="user-dropdown-email">{{Sentinel::getUser()->email}}</span>
                                    @endif
                            </div>
                            <ul class="user-dropdown-links">
                                <li><a href="/profile/{{$platformId}}"><i class="ti ti-id-badge"></i>My Profile</a></li>
                                <li><a href="/qrcodes/{{$platformId}}"><i class="ti ti-lock"></i>Qrcodes</a></li>
{{--                                <li><a href="/transaction/{{$platformId}}"><i class="ti ti-eye"></i>Transactions</a></li>--}}
                            </ul>
                            <ul class="user-dropdown-links">
                                <li>
                                    <form action="{{route('logout')}}" method="post" id="logout-form1">
                                        {{csrf_field()}}
                                        <a href="#" onclick="document.getElementById('logout-form1').submit()"><i class="ti ti-power-off" ></i>Logout</a>
                                    </form>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- .toggle-action -->
            </div><!-- .container -->
        </div><!-- .container -->
    </div><!-- .topbar-md -->
    <div class="container">
        <div class="d-lg-flex align-items-center justify-content-between">
            <div class="topbar-lg d-none d-lg-block">
                <div class="site-logo">
                    <a href="/" class="site-brand">
                        <img src="{{asset('images/original-logo.png')}}" alt="logo" srcset="{{asset('images/original-logo.png')}}" width="165px" height="50px">
                    </a>
                </div><!-- .site-logo -->
            </div><!-- .topbar-lg -->

            <div class="topbar-action d-none d-lg-block">
                <ul class="topbar-action-list">
                    <li class="topbar-action-item topbar-action-link">
                        <a href="/"><em class="ti ti-home"></em> Go to main site</a>
                    </li><!-- .topbar-action-item -->


                    <li class="dropdown topbar-action-item topbar-action-user">
                        <a href="#" data-toggle="dropdown">
                            @if(!empty($details->logo))
                                <img id="preview_image3" src="/uploads/{{$details->logo}}" width="300px" height="300px" class="img-responsive text-center" >
                            @else
                                <img id="preview_image3" src="/uploads/default.png" width="270px" height="270px" class="img-responsive text-center" >

                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="user-dropdown">
                                <div class="user-dropdown-head">
                                    @if(Sentinel::check())
                                        <h6 class="user-dropdown-name">{{Sentinel::getUser()->first_name}}</h6>
                                    @endif
                                        @if(Sentinel::check())

                                            <span class="user-dropdown-email">{{Sentinel::getUser()->email}}</span>
                                        @endif

                                </div>
                                <ul class="user-dropdown-links">
                                    <li><a href="/profile/{{$platformId}}"><i class="ti ti-id-badge"></i>My Profile</a></li>
                                    <li><a href="/qrcodes/{{$platformId}}"><i class="ti ti-lock"></i>Qrcodes</a></li>
{{--                                    <li><a href="/transaction/{{$platformId}}"><i class="ti ti-eye"></i>Transactions</a></li>--}}
                                </ul>
                                <ul class="user-dropdown-links">
                                    <li>
                                        <form action="{{route('logout')}}" method="post" id="logout-form">
                                            {{csrf_field()}}
                                            <a href="#" onclick="document.getElementById('logout-form').submit()"><i class="ti ti-power-off" ></i>Logout</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li><!-- .topbar-action-item -->
                </ul><!-- .topbar-action-list -->
            </div><!-- .topbar-action -->
        </div><!-- .d-flex -->
    </div><!-- .container -->
</div>







