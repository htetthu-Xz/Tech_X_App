@extends('frontend.layouts.app')

@section('content')
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <div class="single-slider slider-height2 b-heigh">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2" style="padding-top: 100px">
                                <h2 data-animation="bounceIn" data-delay="0.2s" class="text-light">Verification Link Expired</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                        <li class="breadcrumb-item text-white">email Verification</li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </section>
    <main class="m-expired mx-5 p-3">
        <div class="card v-expired mx-auto shadow rounded">
            <div class="card-body">
                <h2 class="text-danger">Verification Link Expired</h2>
                <p>Your Verification link has expired.Click resend verification button on bellow to verified your Email.</p>
                <div class="text-right">
                    <a href="{{ route('verification.resend') }}" class="btn btn-primary">Resend Link</a>
                </div>
            </div>
        </div>
    </main>
@endsection