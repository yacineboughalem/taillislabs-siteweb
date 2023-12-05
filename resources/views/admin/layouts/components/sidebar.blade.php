<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="#" class="b-brand text-primary">
                <img src="/assets/images/logo.svg" style="width: 100%" />
            </a>
        </div>
        <div class="navbar-content">
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="/admin/images/user/avatar-1.jpg" alt="user-image"
                                class="user-avtar wid-45 rounded-circle" />
                        </div>
                        <div class="flex-grow-1 ms-3 me-2">

                            <h6 class="mb-1">{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                        <a class="btn btn-icon btn-link-secondary avtar-s" data-bs-toggle="collapse"
                            href="#pc_sidebar_userlink">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-sort-outline"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="collapse pc-user-links" id="pc_sidebar_userlink">
                        <div class="pt-3">
                            <a href="/panel/admin">
                                <i class="ti ti-user"></i>
                                <span>My Account</span>
                            </a>
                           
                            <a href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="ti ti-power"></i>
                                <span>Logout</span>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                    <i class="ti ti-dashboard"></i>
                </li>
                <li class="pc-item">
                    <a href="{{ route('admin.dashboard') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-status-up"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
               


                <li class="pc-item pc-caption">
                    <label>Blog</label>
                    <i class="ti ti-dashboard"></i>
                </li>
                <li class="pc-item">
                    <a href="{{route("admin.collection.index")}}" class="pc-link" ><span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-box-1"></use>
                            </svg> </span><span class="pc-mtext">Categories [Artilces]</span></a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('admin.post.index') }}" class="pc-link"><span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-box-1"></use>
                            </svg> </span><span class="pc-mtext">Artilces</span></a>
                </li>

              

                <li class="pc-item pc-caption">
                    <label>Web Site</label>
                    <i class="ti ti-forms"></i>
                </li>

              

                <li class="pc-item">
                    <a href="/panel/banner" class="pc-link" ><span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-element-plus"></use>
                            </svg> </span><span class="pc-mtext">Banners</span></a>
                </li>


                <li class="pc-item">
                    <a href="/panel/settings" class="pc-link" ><span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-element-plus"></use>
                            </svg> </span><span class="pc-mtext">Settings</span></a>
                </li>

                <li class="pc-item">
                    <a href="/panel/admin" class="pc-link" ><span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-element-plus"></use>
                            </svg> </span><span class="pc-mtext">Admin</span></a>
                </li>


            </ul>
        </div>
    </div>
</nav>
