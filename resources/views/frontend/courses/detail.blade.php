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
            <div class="card shadow-sm rounded">
                <h2 class="p-3">Episodes</h2>
                @foreach ($course->Episode as $episode)
                    <div class="card-body p-3">
                        <div class="accordion" id="accordion{{ $loop->index + 1 }}">
                            <div class="card shadow-sm" style="border-radius: 10px">
                                <div class="acc-bg p-4" id="headingOne" style="border-radius: 10px">
                                    <div class="" data-toggle="collapse" data-target="#collapse{{ $loop->index + 1 }}" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="mx-3 p-2 acc-round">
                                                <i class="fas fa-play m-play text-light"></i>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <p class="mb-0">Episode - {{ $loop->index + 1 }} | {{ $episode->title }}</p><br>
                                                <small>Duration : <span class="duration"></span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <div id="collapse{{ $loop->index + 1 }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion{{ $loop->index + 1 }}">
                                    <div class="card-body">
                                        <h2 class="mb-5"><u>{{ $episode->title }}</u></h2>
                                        <video
                                            id="my-player"
                                            class="video-js"
                                            controls
                                            preload="auto"
                                            poster="{{ $episode->cover }}"
                                            data-setup='{}'
                                            width="1100px"
                                            >
                                            <source src="{{ $episode->video }}" type="video/mp4"></source>
                                        </video>
                                        <h4 class="mt-5 mb-2"><u>Summary</u></h4>
                                        <p>{{ $episode->summary }}</p>
                                        <br>
                                        <div class="mt-7 card rounded shadow-sm">
                                            <div class="card-body">
                                                <div class="d-flex my-3">
                                                    <img class="comment_avt" src="https://i.pravatar.cc/100?u=082cdd92-5268-34ff-8bfb-58bb9" alt="" />
                                                    <div class="d-flex flex-column mx-3">
                                                        <span class="user-name text-dark">Htet Thu <small class="mx-2 text-muted">5 hr</small></span>
                                                        <p class="">
                                                            Et exercitationem aut mollitia deleniti laboriosam. Praesentium quo ullam sint atque eius et.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <input type="text" name="comment" id="comment" placeholder="Comment"
                                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required
                                                    class="single-input ">
                                                    <i class="fas fa-paper-plane mx-3 sent"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
@push('script')
    <script>
        $(() => {
            let player = videojs('#my-player');
            let duration = $('.vjs-remaining-time-display').html()
            $('.duration').html(duration)
        })
    </script>
@endpush