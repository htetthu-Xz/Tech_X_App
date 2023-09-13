@extends('frontend.layouts.app')

@push('css')
    <style>
        .btn-google{
            font-size:23px;
            padding:0px 20px;
            color: #fff;
            background-color: #4285F4;
            border:none;
            justify-content: center;
            align-items: center;
            display: flex;
            width:230px;
        }

        .btn-github{
            font-size:23px;
            padding:0px 20px;
            color: #fff;
            background-color: #5a5a5a;
            border:none;
            justify-content: center;
            align-items: center;
            display: flex;
            width:230px;
        }

        .btn-text{
            width:60%;
        }

        .btn-gradient {    
            width:40%;
            position: relative;
            display: inline-block;
            left:-20px;
            background: rgba(0, 0, 0, 0.15);
            border-top-right-radius: 60px;
            padding: 8px 24px 8px 16px;
            box-shadow: 2px 0px 0px 0px rgba(78, 72, 72, 0.4);
        }
    </style>
@endpush

@section('content')
<main>
    <section class="slider-area slider-area2 b-heigh">
        <div class="slider-active">
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2" style="padding-top: 100px">
                                <h2 data-animation="bounceIn" data-delay="0.2s" class="text-light">Login</h2>
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
    <div class="py-5 mx-2 my-5 row">
        <div class="card mx-auto rounded shadow col-md-6 col-sm-12">
            <div class="card-body p-4">
                <h2 class="my-2"><u>Sign in to your account</u></h2>
                @include('frontend.layouts.page_info')
                <form action="{{ route('user.login') }}" class="form-v" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
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
                        <button type="submit" class="btn btn-lg btn-primary btn-lg mt-4 mb-0">Sign in</button>
                    </div>
                </form>
                <div class="d-flex mt-3 justify-content-around align-items-center">
                    <hr class="w-25 border-warning">
                    <span>Or sign in with</span>
                    <hr class="w-25 border-warning">
                </div>
                <div class="d-flex mt-3 justify-content-around align-items-center">
                    <a class="btn-github" href="{{ route('user.github.login') }}">
                        <span class="btn-gradient">
                            <i class="fab fa-github"></i>
                        </span>
                        <span class="btn-text">Github</span>
                    </a>
                    <a class="btn-google" href="">
                        <span class="btn-gradient">
                            <i class="fab fa-google"></i>
                        </span>
                        <span class="btn-text">Google</span>
                    </a>
                </div>
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