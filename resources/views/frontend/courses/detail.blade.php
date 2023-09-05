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
                                <h1 data-animation="bounceIn" data-delay="0.2s">Course Detail</h1>
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
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img rounded shadow-sm">
                            <img class="img-fluid" src="{{ getCoursePhotos($course->cover_photo) }}" alt="" class="">
                        </div>
                        <div class="blog_details">
                            <h2 class="mb-4">
                                {{ $course->title }}
                            </h2>
                            <h5 class="my-2">
                                <u>Description</u>
                            </h5>
                            <p class="excert">
                                {{ $course->description }}
                            </p>
                            <h5 class="my-2">
                                <u>Summary</u>
                            </h5>
                            <div class="quote-wrapper">
                                <div class="quotes">
                                    {!! $course->summary !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title" style="color: #2d2d2d;">Details</h4>
                            <ul class="list cat-list">
                                <li>
                                    <img src="{{ getProfile($course->Instructor->profile) }}" alt="" width="310px" height="400px" class="rounded shadow-sm">
                                    <p class="my-2">Instructor - {{ $course->Instructor->name }}</p>
                                    <p>Bio -  {{ $course->Instructor->Bio }}</p>
                                    <p>
                                        @foreach (json_decode($course->Instructor->link) as $item)
                                            <a href="{{ $item->link }}"><i class="{{ $item->icon }} link"></i></a>
                                        @endforeach
                                    </p>
                                </li>

                                <li>
                                    <p>Price - $ {{ $course->price }}</p>
                                </li>
                                <li>
                                    <p>Episodes - {{ $course->Episode->count() }}</p>
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
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Purchase</button>
                        </aside>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm rounded">
                <h2 class="p-3">Episodes</h2>
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
    </section>
</main>
@endsection