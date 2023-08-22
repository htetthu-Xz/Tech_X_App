<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('backend/images/techX.png') }}" class="navbar-brand-img h-125" alt="main_logo">
            <span class="ms-1 font-weight-bold">{{ config('app.name') }}</span>
        </a>
    </div>
    <hr class="horizontal app-hr mt-0">
    <div class="ps ps--active-y w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            @if(checkPermission('view-dashboard'))
                <li class="nav-item nv">
                    <a class="nv-link nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
            @endif
            @if(checkPermission('view-admin'))
                <li class="nav-item nv mt-1">
                    <a class="nv-link nav-link {{ request()->routeIs('admins.*') ? 'active' : '' }}" href="{{ route('admins.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ri-user-settings-fill text-lg opacity-10 text-warning"></i>
                        </div>
                        <span class="nav-link-text ms-1">Admins</span>
                    </a>
                </li>
            @endif

            @if(checkPermission('view-role'))
                <li class="nav-item nv mt-1">
                    <a class="nv-link nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-badge text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Roles</span>
                    </a>
                </li>
            @endif

            @if(checkPermission('view-instructor'))
                <li class="nav-item nv mt-1">
                    <a class="nv-link nav-link {{ request()->routeIs('instructors.*') ? 'active' : '' }}" href="{{ route('instructors.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-hat-3 text-danger text-lg opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Instructors</span>
                    </a>
                </li>
            @endif

            @if(checkPermission('view-user'))
                <li class="nav-item nv mt-1">
                    <a class="nv-link nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
            @endif

            @if(checkPermission('view-category'))
                <li class="nav-item nv mt-1">
                    <a class="nv-link nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni ni-bullet-list-67 text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Categories</span>
                    </a>
                </li>
            @endif


            @if(checkPermission('view-course'))
                <li class="nav-item nv mt-1">
                    <a class="nv-link nav-link {{ request()->routeIs('courses.*') || request()->routeIs('episodes.*') ? 'active' : '' }}" href="{{ route('courses.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-book-bookmark text-secondary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Courses</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>

</aside>


