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
            <div class="blog_right_sidebar d-flex justify-content-end">
                <aside class="search_widget p-3 w-search mr-2 mb-4">
                    <form action="#" id="search">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" id="search-input" class="form-control shadow-sm" placeholder='Search Keyword'
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                <div class="input-group-append">
                                    <button class="btns shadow-sm" type="submit"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </aside>
            </div>
            <div class="row append">
                @foreach ($courses as $course)
                    <div class="col-lg-4 count">
                        <div class="properties properties2 mb-30">
                            <div class="properties__card">
                                <div class="properties__img overlay1">
                                    <a href="{{ route('frontend.courses.detail', [$course->id]) }}"><img src="{{ $course->image }}" alt=""></a>
                                </div>
                                <div class="properties__caption">
                                    <h3><a href="{{ route('frontend.courses.detail', [$course->id]) }}">{{ $course->title }}</a></h3>
                                    <p>{{ Str::limit($course->description, 100) }}</p>
                                    <div class="properties__footer d-flex justify-content-between align-items-center">
                                        <div class="restaurant-name">
                                            <p>Episodes - <p class="f-3">{{ $course->Episode->count() }}</p></p>
                                        </div>
                                        <div class="price">
                                            <span>${{ $course->price }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('frontend.courses.detail', [$course->id]) }}" class="border-btn border-btn2">Find out more</a>
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
            $('.loader').hide()
            $('.load').on('click', function() {
                let count = $('.count').length
                $.get("{{ route('frontend.courses.load') }}", {count:count}, function(res) {
                    let data = JSON.parse(res, true)
                    if(data == 0) {
                        $('.load').hide()
                        $('.res').append('<p class="text-danger end">End of result...</p>')
                    } else {
                        data.forEach(function(course) {
                            let template = `
                                <div class="col-lg-4 count">
                                    <div class="properties properties2 mb-30">
                                        <div class="properties__card">
                                            <div class="properties__img overlay1">
                                                <a href="#"><img src="${course.image}" alt=""></a>
                                            </div>
                                            <div class="properties__caption">
                                                <h3><a href="#">${course.title}</a></h3>
                                                <p>${course.description.substring(0, 100)}...</p>
                                                <div class="properties__footer d-flex justify-content-between align-items-center">
                                                    <div class="restaurant-name">
                                                        <p>Episodes - <p class="f-3">${course.episode.length}</p></p>
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
            
            $('#search').on('submit', function(e) {
                e.preventDefault()
                let value = $('#search-input').val()
                if(value !== '') {
                    $.get("{{ route('frontend.courses.search') }}", {search:value}, function(res) {
                        $('.count').remove()
                        $('.load').remove()
                        $('.end').remove()
                        $('.no-match').remove()
                        let data = JSON.parse(res, true)
                        if(data.length == 0) {
                            $('.fix').append(`
                                <div class="text-center no-match">
                                    <p class="text-center">No matching result.</p>
                                    <a href="{{ route('frontend.courses.index') }}" class="text-dark bg-warning p-2 px-3 rounded ">Back</a>
                                </div>
                            `)
                        } else {
                            data.forEach(function(course) {
                                let template = `
                                    <div class="col-lg-4 count">
                                        <div class="properties properties2 mb-30">
                                            <div class="properties__card">
                                                <div class="properties__img overlay1">
                                                    <a href="#"><img src="${course.image}" alt=""></a>
                                                </div>
                                                <div class="properties__caption">
                                                    <h3><a href="#">${course.title}</a></h3>
                                                    <p>${course.description.substring(0, 100)}...</p>
                                                    <div class="properties__footer d-flex justify-content-between align-items-center">
                                                        <div class="restaurant-name">
                                                            <p>Episodes - <p class="f-3">${course.episode.length}</p></p>
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
                }
            })
        })
        $(document).on({
            ajaxStart: function(){
                $("#spinner-div").fadeIn(300); 
            },
            ajaxStop: function(){ 
                $("#spinner-div").fadeOut(300); 
            }    
});
    </script>
@endpush