<!-- [ Header Topbar ] start -->
<header class="pc-header">
    <div class="header-wrapper">

        <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ph-duotone ph-list"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ph-duotone ph-list"></i>
                    </a>
                </li>
                <li class="dropdown pc-h-item">
                    <a
                        class="pc-head-link dropdown-toggle arrow-none m-0 trig-drp-search"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        aria-expanded="false"
                    >
                        <i class="ph-duotone ph-magnifying-glass"></i>
                    </a>
                    <div class="dropdown-menu pc-h-dropdown drp-search">
                        <form method="get" action="{{request()->path()}}" class="px-1">
                            <div class="form-group mb-0 d-flex align-items-center">
                                <input name="search" type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
                                <button class="btn btn-light-secondary btn-search">Search</button>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>

        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item">
                    <a
                        class="pc-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        aria-expanded="false"
                    >
                        <i class="ph-duotone ph-sun-dim"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
                            <i class="ph-duotone ph-moon"></i>
                            <span>Dark</span>
                        </a>
                        <a href="#!" class="dropdown-item" onclick="layout_change('light')">
                            <i class="ph-duotone ph-sun-dim"></i>
                            <span>Light</span>
                        </a>
                        <a href="#!" class="dropdown-item" onclick="layout_change_default()">
                            <i class="ph-duotone ph-cpu"></i>
                            <span>Default</span>
                        </a>
                    </div>
                </li>
                <li class="dropdown pc-h-item">
                    <a
                        class="pc-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        aria-expanded="false"
                    >
                        <i class="ph-duotone ph-diamonds-four"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-user"></i>
                            <span>My Account</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-gear"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-lifebuoy"></i>
                            <span>Support</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-lock-key"></i>
                            <span>Lock Screen</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ph-duotone ph-power"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>

                <li class="dropdown pc-h-item header-user-profile">
                    <a
                        class="pc-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        data-bs-auto-close="outside"
                        aria-expanded="false"
                    >
                        <img src="{{asset('assets/images/user/avatar-2.jpg')}}" alt="user-image" class="user-avtar" >
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h4 class="m-0">Profile</h4>
                        </div>
                        <div class="dropdown-body">
                            <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                                <ul class="list-group list-group-flush w-100">
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{asset('assets/images/user/avatar-2.jpg')}}" alt="user-image" class="wid-50 rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 mx-3">
                                                <h5 class="mb-0">{{auth()->user()->name}}</h5>
                                                <a class="link-primary" href="mailto:{{auth()->user()->email}}">{{auth()->user()->email}}</a>
                                            </div>
                                            <span class="badge bg-primary">PRO</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-key"></i>
                    <span>Change password</span>
                  </span>
                                        </a>
                                        <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-envelope-simple"></i>
                    <span>Recently mail</span>
                  </span>
                                        </a>

                                    </li>

                                    <li class="list-group-item">

                                        <div class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-moon"></i>
                    <span>Dark mode</span>
                  </span>
                                            <div class="form-check form-switch form-check-reverse m-0">
                                                <input class="form-check-input f-18" id="dark-mode" type="checkbox" onclick="dark_mode()"
                                                       role="switch">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-user-circle"></i>
                    <span>Edit profile</span>
                  </span>
                                        </a>

                                        <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-gear-six"></i>
                    <span>Settings</span>
                  </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" class="dropdown-item">
                  <span class="d-flex align-items-center">
                    <i class="ph-duotone ph-power"></i>
                    <span>Logout</span>
                  </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div> </div>
</header>
<!-- [ Header ] end -->
