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
                                <h1 data-animation="bounceIn" data-delay="0.2s">Our Courses</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                        <li class="breadcrumb-item text-white">courses</li> 
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </section>
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Our featured courses</h2>
                    </div>
                </div>
            </div>
            <div class="row append">
                @foreach ($courses as $course)
                    <div class="col-lg-4 count">
                        <div class="properties properties2 mb-30">
                            <div class="properties__card">
                                <div class="properties__img overlay1">
                                    <a href="#"><img src="{{ $course->cover_photo }}" alt=""></a>
                                </div>
                                <div class="properties__caption">
                                    {{-- <div class="mb-4">
                                        @foreach ($course->Category as $category)
                                            <span class="badge badge-info">{{ $category->title }}</span>
                                        @endforeach
                                    </div> --}}
                                    <h3><a href="#">{{ $course->title }}</a></h3>
                                    <p>{{ Str::limit($course->description, 100) }}</p>
                                    <div class="properties__footer d-flex justify-content-between align-items-center">
                                        <div class="restaurant-name">
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half"></i>
                                            </div>
                                            <p><span>(4.5)</span> based on 120</p>
                                        </div>
                                        <div class="price">
                                            <span>${{ $course->price }}</span>
                                        </div>
                                    </div>
                                    <a href="#" class="border-btn border-btn2">Find out more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mt-40 res">
                        <button class="border-btn text-dark load">Load More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('script')
    <script>
        $(() => {
            $('.load').on('click', function() {
                let count = $('.count').length
                $.get("{{ route('frontend.courses.load') }}", {count:count}, function(res) {
                    let data = JSON.parse(res, true)
                    if(data == 0) {
                        $('.load').hide()
                        $('.res').append('<p>End of result...</p>')
                    } else {
                        data.forEach(function(course) {
                            let template = `
                                <div class="col-lg-4 count">
                                    <div class="properties properties2 mb-30">
                                        <div class="properties__card">
                                            <div class="properties__img overlay1">
                                                <a href="#"><img src="${course.cover_photo}" alt=""></a>
                                            </div>
                                            <div class="properties__caption">
                                                <h3><a href="#">${course.title}</a></h3>
                                                <p>${course.description.substring(0, 100)}...</p>
                                                <div class="properties__footer d-flex justify-content-between align-items-center">
                                                    <div class="restaurant-name">
                                                        <div class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half"></i>
                                                        </div>
                                                        <p><span>(4.5)</span> based on 120</p>
                                                    </div>
                                                    <div class="price">
                                                        <span>$${course.price}</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="border-btn border-btn2">Find out more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `
                            $('.append').append(template)    
                        })
                    }
                })
            })
        })
    </script>
@endpush