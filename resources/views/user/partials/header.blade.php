<header class="header axil-header header-style-1">
    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-brand">
                    <a href="/" class="logo logo-dark">
                        <img src="{{ asset('user/assets/images/logo/logo.png') }}" alt="Site Logo">
                    </a>
                    <a href="/" class="logo logo-light">
                        <img src="{{ asset('user/assets/images/logo/logo-light.png') }}" alt="Site Logo">
                    </a>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="/" class="logo">
                                <img src="{{ asset('user/assets/images/logo/logo.png') }}" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li><a href="/">Home</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">

                        @if (Auth::check())
                        <li class="shopping-cart">
                            <a href="/cart">
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="my-account">
                            <a href="/my-account">
                                <i class="flaticon-person"></i>
                            </a>
                        </li>
                        @else
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <i class="flaticon-person"></i>
                            </a>
                            <div class="my-account-dropdown">
                                <div class="login-btn">
                                    <a href="/login" class="axil-btn btn-bg-primary">Login</a>
                                </div>
                                <div class="reg-footer text-center">No account yet? <a href="/register" class="btn-link">REGISTER HERE.</a></div>
                            </div>
                        </li>
                        @endif
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
