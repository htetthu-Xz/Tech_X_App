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
    <div class="courses-area s-padding fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center __append">
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
            <div class="blog_right_sidebar d-flex justify-content-end search__">
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
                                    <a href="{{ route('frontend.courses.detail', [$course->slug]) }}"><img src="{{ getCoursePhotos($course->image) }}" alt=""  height="300"></a>
                                </div>
                                <div class="properties__caption">
                                    <h3><a href="{{ route('frontend.courses.detail', [$course->slug]) }}">{{ $course->title }}</a></h3>
                                    <p>{{ Str::limit($course->description, 100) }}</p>
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
            const base_path = "{{ getCoursePhotos('') }}";
            console.log(base_path);
            const searchParams = new URLSearchParams(window.location.search);
            if(searchParams.has('search')) {
                $('.count').remove();
                $('.load').remove();
                $('.end').remove();
                $('.no-match').remove();
                $('.search__').empty();
                $('.__append').find('h2').remove();
                let data = searchParams.get('search'); 
                let search = data.replaceAll('-', ' ').substring(0,6);
                $('.__append').append(`<h4 class="mb-3">Category - ${data.toUpperCase()}</h4>`)
                $('.search__').append(`
                    <a href="{{ route('frontend.home') }}" class="text-light bg-primary p-2 px-3 rounded mb-4"><i class="fa fa-angle-left mx-2"></i>Back</a>
                `);
                
                $.get("{{ route('frontend.courses.category.search') }}", {search:search}, function(res) {
                    let data = JSON.parse(res, true)
                    if(data.length == 0) {
                        $('.fix').append(`
                            <div class="text-center no-match">
                                <p class="text-center">No matching result.</p>
                                <a href="{{ route('frontend.home') }}" class="text-dark bg-warning p-2 px-3 rounded ">Back</a>
                            </div>
                        `)
                    } else {
                        data.forEach(function(course) {
                            let url = route('frontend.courses.detail', course.slug);
                            let template = `
                                <div class="col-lg-4 count">
                                    <div class="properties properties2 mb-30">
                                        <div class="properties__card">
                                            <div class="properties__img overlay1">
                                                <a href="${url}"><img src="${base_path}/${course.image}" alt=""></a>
                                            </div>
                                            <div class="properties__caption">
                                                <h3><a href="${url}">${course.title}</a></h3>
                                                <p>${course.description.substring(0, 100)}...</p>
                                                <div class="properties__footer d-flex justify-content-between align-items-center">
                                                    <div class="restaurant-name">
                                                        <p>Episodes - <p class="f-3">${course.episode.length}</p></p>
                                                    </div>
                                                    <div class="price">
                                                        <span>$${course.price}</span>
                                                    </div>
                                                </div>
                                                <a href="${url}" class="border-btn border-btn2">Find out more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `
                            $('.append').append(template);   
                        });
                    }
                })
            }

            $('.loader').hide();
            $(document).on('click', '.load' , function() {
                let count = $('.count').length;
                $.get("{{ route('frontend.courses.load') }}", {count:count}, function(res) {
                    let data = JSON.parse(res, true)
                    let result = data.data;

                    result.forEach(function(course) {
                        let url = route('frontend.courses.detail', course.slug);
                        let template = `
                            <div class="col-lg-4 count ls">
                                <div class="properties properties2 mb-30">
                                    <div class="properties__card">
                                        <div class="properties__img overlay1">
                                            <a href="${url}"><img src="${base_path}/${course.image}" alt=""></a>
                                        </div>
                                        <div class="properties__caption">
                                            <h3><a href="${url}">${course.title}</a></h3>
                                            <p>${course.description.substring(0, 100)}...</p>
                                            <div class="properties__footer d-flex justify-content-between align-items-center">
                                                <div class="restaurant-name">
                                                    <p>Episodes - <p class="f-3">${course.episode.length}</p></p>
                                                </div>
                                                <div class="price">
                                                    <span>$${course.price}</span>
                                                </div>
                                            </div>
                                            <a href="${url}" class="border-btn border-btn2">Find out more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `
                        $('.append').append(template);    
                    });
                    if(data.status === 0) {
                        $('.load').remove();
                        let section = `
                            <button class="border-btn text-dark less">See Less</button>
                        `
                        $('.res').append(section);
                    }
                });
            });
            $(document).on('click', '.less' , function() {
                $('.ls').remove();
                $('.less').remove();
                let section = `
                    <button class="border-btn text-dark load">View More Category</button>
                `
                $('.res').append(section);
            });
            
            $('#search').on('submit', function(e) {
                e.preventDefault();
                let value = $('#search-input').val();
                if(value !== '') {
                    $.get("{{ route('frontend.courses.search') }}", {search:value}, function(res) {
                        $('.count').remove();
                        $('.load').remove();
                        $('.end').remove();
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
                                let url = route('frontend.courses.detail', course.slug);
                                let template = `
                                    <div class="col-lg-4 count">
                                        <div class="properties properties2 mb-30">
                                            <div class="properties__card">
                                                <div class="properties__img overlay1">
                                                    <a href="${url}"><img src="${base_path}/${course.image}" alt=""></a>
                                                </div>
                                                <div class="properties__caption">
                                                    <h3><a href="${url}">${course.title}</a></h3>
                                                    <p>${course.description.substring(0, 100)}...</p>
                                                    <div class="properties__footer d-flex justify-content-between align-items-center">
                                                        <div class="restaurant-name">
                                                            <p>Episodes - <p class="f-3">${course.episode.length}</p></p>
                                                        </div>
                                                        <div class="price">
                                                            <span>$${course.price}</span>
                                                        </div>
                                                    </div>
                                                    <a href="${url}" class="border-btn border-btn2">Find out more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `
                                $('.append').append(template);   
                            });
                        }
                    });
                }
            });
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