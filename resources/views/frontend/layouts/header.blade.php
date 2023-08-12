<header>
    <div class="header-area header-transparent">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="{{ route('frontend.home') }}"><img src="{{ asset('frontend/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">                                                                                          
                                            <li class="active" ><a href="{{ route('frontend.home') }}">Home</a></li>
                                            <li><a href="courses.html">Courses</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="#">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog_details.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                            @if(auth()->user())
                                                <li>
                                                    <div class="user-info-dropdown">
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                                <img class="avatar" src="{{ auth()->user()->profile }}" alt="" />
                                                                <span class="user-name text-white">{{ auth()->user()->name }}</span>
                                                            </a>
                                                            <div class="dropdown-menu pf-drop">
                                                                <a class="dropdown-item d-item" style="padding: 10px;" href="#"><i class="ti-user"></i> Profile</a>
                                                                <a class="dropdown-item d-item" style="padding: 10px;" href="#"><i class="ti-settings"></i> Setting</a>
                                                                <a class="dropdown-item d-item" style="padding: 10px;" href="{{ route('user.logout') }}"><i class="ti-shift-left"></i> Log Out</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @else
                                                <li class="button-header margin-left"><a href="{{ route('user.get.register') }}" class="btn">Register</a></li>
                                                <li class="button-header"><a href="{{ route('user.get.login') }}" class="btn btn3">Log in</a></li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div> 
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>