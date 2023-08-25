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
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ $course->cover_photo }}" alt="">
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
                                    <p>Instructor - {{ $course->Instructor->name }}</p>
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
        </div>
    </section>
</main>
@endsection
