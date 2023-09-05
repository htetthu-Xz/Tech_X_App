<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        @if (auth()->guard('admin')->user())
            <div class="mt-3 d-flex align-items-center">
                <img class="avatar" src="{{ getProfile(auth()->guard('admin')->user()->profile)}}" />
                <div class="mx-2">
                    <p class="admin_name text-white">{{ auth()->guard('admin')->user()->name }}</p>
                    <small class="role_s">{{ auth()->guard('admin')->user()->roles->pluck('name')[0] }}</small>
                </div>
            </div>
        @endif
        <div class="d-flex collapse navbar-collapse mt-sm-0 mt-1 me-md-0 me-sm-4 align-items-center" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                @if (auth()->guard('admin')->user())
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('admin.logout') }}" class="d-flex nav-link text-white font-weight-bold px-0">
                            <span class="d-sm-inline d-none mb-3 me-sm-1">Logout</span>
                            <i class="ri-logout-box-r-line align-text-bottom me-sm-1"></i>
                        </a>
                    </li>    
                @else
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('get.login') }}" class="d-flex nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Sign In</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
