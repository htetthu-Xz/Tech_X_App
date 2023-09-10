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
                                <h2 data-animation="bounceIn" data-delay="0.2s" class="text-light">Course Detail</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('frontend.courses.index') }}">Courses</a></li> 
                                        <li class="breadcrumb-item text-light">{{ $course->title }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </section>
    <section class="blog_area single-post-area py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img rounded shadow-sm">
                            <img class="img-fluid course-detail-img-size" src="{{ getCoursePhotos($course->image) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2 class="mb-4 font-28">
                                {{ $course->title }}
                            </h2>
                            <h4 class="my-2">
                                <u>Description</u>
                            </h4>
                            <p class="excert">
                                {{ $course->description }}
                            </p>
                            <div class="mb-4">
                                <h4 class="my-2"><u>Summary</u></h4>
                                <div class="quote-wrapper">
                                    <div class="quotes">
                                        {!! $course->summary !!}
                                    </div>
                                </div>
                            </div>
                            <h4 class="my-3">
                                <u>Episodes</u>
                            </h4>
                            <div class="my2">
                                @foreach ($course->Episode as $episode)
                                    <div class="card-body p-3">
                                        <div class="accordion" id="accordion{{ $loop->index + 1 }}">
                                            <div class="card shadow-sm" style="border-radius: 10px">
                                                <a href="{{ route('frontend.courses.episode', [$course->slug, $episode->id]) }}" class="epi">
                                                    <div class="acc-bg p-4" id="headingOne" style="border-radius: 10px">
                                                        <div class="" data-toggle="collapse" data-target="#collapse{{ $loop->index + 1 }}" aria-expanded="true" aria-controls="collapseOne">
                                                            <div class="d-flex justify-content-start align-items-center">
                                                                <div class="mx-3 p-2 acc-round">
                                                                    <i class="fas fa-play m-play text-warning"></i>
                                                                </div>
                                                                <div class="d-flex flex-column">
                                                                    <p class="mb-0">Episode - {{ $loop->index + 1 }} | {{ $episode->title }}</p><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>    
                                            </div>
                                        </div>          
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            {{-- <h4 class="" style="color: #2d2d2d;">Details</h4> --}}
                            <ul class="list cat-list" style="font-family: Mulish",sans-serif;">
                                <li>
                                    <img src="{{ getProfile($course->Instructor->profile) }}" alt="" class="instructor-img rounded shadow-sm">
                                    <span class="d-block pt-3"><b>Your Instructor</b> - <b>{{ $course->Instructor->name }}</b></span>
                                    <span class="my-2 d-block">{{ $course->Instructor->Bio }}</span>
                                    <span>
                                        {{-- <div class="footer-social"> --}}
                                        @foreach (json_decode($course->Instructor->link) as $item)
                                            <a href="{{ $item->link }}"><i class="{{ $item->icon }} link"></i></a>
                                        @endforeach
                                        {{-- </div> --}}
                                    </span>
                                </li>

                                <li>
                                    <span>Price - $ {{ $course->price }}</span>
                                </li>
                                <li>
                                    <span>Episodes - {{ $course->Episode->count() }}</span>
                                </li>
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title" style="color: #2d2d2d;">Categories</h4>
                            <ul class="list">
                                @foreach ($course->Category as $category)
                                    <li>
                                        <p class="category_">{{ $category->title }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget newsletter_widget">
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Enroll to this course</button>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection