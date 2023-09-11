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
                                    <h2 data-animation="bounceIn" data-delay="0.2s" class="text-light">About Us</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                            <li class="breadcrumb-item text-white">About</li> 
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </section>
        <div class="services-area about-padding">
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="{{ asset('frontend/img/icon/icon1.svg') }}" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>60+ UX courses</h3>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="{{ asset('frontend/img/icon/icon2.svg') }}" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>Expert instructors</h3>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="{{ asset('frontend/img/icon/icon3.svg') }}" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>Life time access</h3>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="about-area1 fix p-4 pt-10">
            <div class="d-flex flex-md-row flex-sm-column flex-xs-column flex-xl-row justify-content-between align-items-center"> {{-- support-wrapper  left-content1 --}}
                <div class="mx-4">
                    <div class="about-icon">
                        <img src="{{ asset('frontend/img/icon/about.svg') }}" alt="">
                    </div>
                    <!-- section tittle -->
                    <div class="section-tittle section-tittle2 mb-55">
                        <div class="front-text">
                            <h2 class="">Learn new skills online with top educators</h2>
                            <p>The automated process all your website tasks. Discover tools and 
                                techniques to engage effectively with vulnerable children and young 
                            people.</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="{{ asset('frontend/img/icon/right-icon.svg') }}" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Techniques to engage effectively with vulnerable children and young people.</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="{{ asset('frontend/img/icon/right-icon.svg') }}" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Join millions of people from around the world  learning together.</p>
                        </div>
                    </div>
    
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="{{ asset('frontend/img/icon/right-icon.svg') }}" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Join millions of people from around the world learning together. Online learning is as easy and natural.</p>
                        </div>
                    </div>
                </div>
                <div class="">
                    <!-- img -->
                    <div class="right-img">
                        <div class="h-50 ml-0" >
                            <img src="{{ asset('frontend/img/gallery/featured4.png') }}" height="285px" class="feature-i" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-area3 fix mt-5">
            <div class="support-wrapper align-items-center">
                <div class="right-content3">
                    <div class="right-img">
                        <img src="{{ asset('frontend/img/gallery/about3.png') }}" alt="">
                    </div>
                </div>
                <div class="left-content3">
                    <div class="section-tittle section-tittle2 mb-20">
                        <div class="front-text">
                            <h2 class="">Learner outcomes on courses you will take</h2>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="{{ asset('frontend/img/icon/right-icon.svg') }}" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Techniques to engage effectively with vulnerable children and young people.</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="{{ asset('frontend/img/icon/right-icon.svg') }}" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Join millions of people from around the world
                            learning together.</p>
                        </div>
                    </div>
                    <div class="single-features">
                        <div class="features-icon">
                            <img src="{{ asset('frontend/img/icon/right-icon.svg') }}" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Join millions of people from around the world learning together.
                            Online learning is as easy and natural.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="team-area section-padding40 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Your Instructors</h2>
                        </div>
                    </div>
                </div>
                <div class="team-active">
                    @foreach ($instructors as $instructor)
                        <div class="single-cat text-center">
                            <div class="cat-icon">
                                <img src="{{ getProfile($instructor['profile']) }}" alt="" class="avatar_ins">
                            </div>
                            <div class="cat-cap">
                                <h5><a href="">{{ $instructor['name'] }}</a></h5>
                                <p>{{ $instructor['Bio'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection