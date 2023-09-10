@extends('frontend.layouts.app')

@section('content')
<main>
    <section class="slider-area slider-area2 b-heigh">
        <div class="slider-active">
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2" style="padding-top: 100px">
                                <h2 data-animation="bounceIn" data-delay="0.2s" class="text-light">Reset Password</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                        <li class="breadcrumb-item text-white">reset password</li> 
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
                <h2 class="my-2"><u>Reset Your Password</u></h2>
                @include('frontend.layouts.page_info')
                <form action="{{ route('user.resetPassword') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="con-password">Confirm Password</label>
                        <input type="password" id="con-password" name="password_confirmation" class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>
@endsection