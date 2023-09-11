@extends('frontend.layouts.app')

@section('content')
    <section class="slider-area">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-12">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay="0.2s">Online learning<br> platform</h1>
                                <p data-animation="fadeInLeft" data-delay="0.4s">Build skills with courses, certificates, and degrees online from world-class universities and companies</p>
                                <a href="{{ route('user.get.login') }}" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join for Free</a>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </section>
    <!-- ? services-area -->
    <div class="services-area">
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
    <!-- Courses area start -->
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Our featured courses</h2>
                    </div>
                </div>
            </div>
            <div class="courses-actives">
                @foreach ($courses as $course)
                    <div class="properties pb-20">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="{{ route('frontend.courses.detail', [$course->slug]) }}">
                                    <img src="{{ getCoursephotos($course->image) }}" class="object-fit course-img-size"alt="">
                                </a>
                            </div>
                            <div class="properties__caption">
                                <h3><a href="{{ route('frontend.courses.detail', [$course->slug]) }}">{{ $course->title }}</a></h3>
                                <p class="min-height-des">{{ Str::limit($course->description, 100) }}</p>
                                <div class="properties__footer d-flex justify-content-between align-items-center">
                                    <div class="restaurant-name">
                                        <p>Episodes - <p class="f-3">{{ $course->Episode->count() }}</p></p>
                                    </div>
                                    <div class="price">
                                        <span>${{ $course->price }}</span>
                                    </div>
                                </div>
                                <a href="{{ route('frontend.courses.detail', [$course->slug]) }}" class="border-btn border-btn2">Find out more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
    <div id="spinner-div" class="pt-5">
        <div class="lds-default">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="topic-area section-padding40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Explore top Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row append d-flex justify-content-center">
                @foreach ($categories as $key => $category)
                    <div class="col-lg-3 col-md-4 col-sm-6 my-4 mx-2 count btn_">
                        <a href="{{ route('frontend.courses.index').'?search='.$key }}"><div class="text-center">
                            {{ $category }}
                        </div></a>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-xl-12">
                    <div class="section-tittle text-center mt-20 res">
                        <button class="border-btn text-dark load">View More Category</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="about-area3 fix">
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
                        <h2>Instructors</h2>
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
    <section class="about-area2 fix pb-padding">
        <div class="support-wrapper align-items-center">
            <div class="right-content2">
                <div class="right-img">
                    <img src="{{ asset('frontend/img/gallery/about2.png') }}" alt="">
                </div>
            </div>
            <div class="left-content2">
                <div class="section-tittle section-tittle2 mb-20">
                    <div class="front-text">
                        <h2 class="">Take the next step
                            toward your personal
                            and professional goals
                        with us.</h2>
                        <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
                        <a href="{{ route('user.get.register') }}" class="btn">Join now for Free</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(() => { 
            $(document).on('click', '.load' , function() {
                let count = $('.count').length
                $.get("{{ route('frontend.category.load') }}", {count:count}, function(res) {
                    let data = JSON.parse(res, true)
                    let result = data.data;
                    
                    result.forEach(function(category) {
                        let template = `
                            <div class="col-lg-3 col-md-4 col-sm-6 count my-4 mx-2 btn_ ls">
                                <div class="text-center">
                                    <div>
                                        <a href="{{ route('frontend.courses.index').'?search=' }}${category.slug}">${category.title}</a>
                                    </div>
                                </div>
                            </div>
                        `
                        $('.append').append(template)    
                    })
                    if(data.status === 0) {
                        $('.load').remove();
                        let section = `
                            <button class="border-btn text-dark less">See Less</button>
                        `
                        $('.res').append(section);
                    }
                })
            })
            $(document).on('click', '.less' , function() {
                $('.ls').remove();
                $('.less').remove();
                let section = `
                    <button class="border-btn text-dark load">View More Category</button>
                `
                $('.res').append(section);
            });
        })
    </script>
@endpush