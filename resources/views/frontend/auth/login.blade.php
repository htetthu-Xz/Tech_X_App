@extends('frontend.layouts.app')

@section('content')
<main>
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Login</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                        <li class="breadcrumb-item text-white">login</li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </section>
    <div class="p-5 m-5">
        <div class="card mx-auto w-login rounded shadow">
            <div class="card-body p-4">
                <h2 class="my-2"><u>Sign in to your account</u></h2>
                @include('frontend.layouts.page_info')
                <form action="{{ route('user.login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-check d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between">
                            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                            <label class="form-check-label mx-2" for="rememberMe">Remember me</label>
                        </div>
                        <div>
                            <a href="{{ route('user.getForgot') }}" class="nav-link"><p class="form-check-label">Forget Password?</p></a>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                    </div>
                </form>
                <div class="text-center pt-3 px-lg-2 px-1">
                    <p class="text-sm mx-auto">
                        Don't have an account?
                        <a href="{{ route('user.get.register') }}" class="text-primary text-gradient font-weight-bold">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection