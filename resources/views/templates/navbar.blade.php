<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/pilopa-small.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/pilopa-large.png')}}" alt="" height="20">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/pilopa-small.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/pilopa-large.png')}}" alt="" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-backburger"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative mt-3">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="mdi mdi-magnify"></span>
                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group mt-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (empty(auth()->user()))
            <div class="dropdown d-inline-block">
                <a href="{{url('login')}}" class="btn header-item noti-icon  waves-effect">
                    <i class="mdi mdi-tune me-1"></i> Login
                </a>
            </div>
            @endif

            <!-- light dark btn -->
            <!-- <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="light-dark-mode">
                    <i class="mdi mdi-moon-waning-crescent align-middle fs-4"></i>
                </button>
            </div> -->


            @if (!empty(auth()->user()))
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                    <span class="d-none d-sm-inline-block ms-1">Smith</span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end ">
                    <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-credit-card-outline font-size-16 align-middle me-1"></i> Billing</a>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-settings font-size-16 align-middle me-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="{{url('logout')}}"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </div>
            </div>
            @endif

        </div>
    </div>

</header>