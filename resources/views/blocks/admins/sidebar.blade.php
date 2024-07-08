<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('dashboard')}}">
            <h1 class="text-white mt-3">SHOPY</h1>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user"
                    src="{{ asset('assets/admin/assets/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i
                            class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span
                            class="align-middle">Online</span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome Anna!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="apps-chat.html"><i
                    class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Messages</span></a>
            <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                    class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Taskboard</span></a>
            <a class="dropdown-item" href="pages-faqs.html"><i
                    class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Help</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance :
                    <b>$5971.67</b></span></a>
            <a class="dropdown-item" href="pages-profile-settings.html"><span
                    class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                    class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                    class="align-middle">Settings</span></a>
            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                    class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock
                    screen</span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i
                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                    data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('dashboard')}}">
                        <i class="ri-honour-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Category</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('category.index')}}" class="nav-link"> List </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('category.create')}}" class="nav-link"> Add </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps2" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps2">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Product</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('product.list')}}" class="nav-link"> List </a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-chat.html" class="nav-link"> Add </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps3" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps3">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Color</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('color.index')}}" class="nav-link"> List </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('color.create')}}" class="nav-link"> Add </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps4" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps4">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Size</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps4">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('size.index')}}" class="nav-link"> List </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('size.create')}}" class="nav-link"> Add </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps5" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps5">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Comment</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps5">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('comment.index')}}" class="nav-link"> List </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps6" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps6">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Order</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps6">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('order.index')}}" class="nav-link"> List </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps7" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps7">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">User</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps7">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('user.index')}}" class="nav-link"> List </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('user.create')}}" class="nav-link"> Add </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
