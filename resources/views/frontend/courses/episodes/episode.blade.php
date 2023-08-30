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
                                <h1 data-animation="bounceIn" data-delay="0.2s">Episodes</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('frontend.courses.index') }}">Courses</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('frontend.courses.detail', [$course->slug]) }}">{{ $course->title }}</a></li> 
                                        <li class="breadcrumb-item text-light">Episodes</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </section>
    <section class="container-fluid p-3 bg-e-container">
        <div class="card p-3 bg-ep shadow-sm">
            <a href="{{ route('frontend.courses.detail', [$course->slug]) }}" class="back py-3"><i class="fas fa-chevron-left mx-2"></i>Back To Course</a>
            <div class="row">
                <div class="col-lg-4">
                    <div class="d-flex justify-content-start align-items-center list-h">
                        <div class="mx-2 p-2">
                            <img src="{{ getCoursePhotos($course->image) }}" alt="" class="h-round">
                        </div>
                        <div class="d-flex flex-column">
                            <p class="mb-0 text-sm text-light">{{ $course->title }}</p>
                            <small class="mt-1 text-light">Episodes : {{ $course->Episode->count() }}</small>
                        </div>
                    </div>
                    <div class="card p-2 radious__ shadow-sm bg-episode side-h">
                        <ul class="mx-1 side-list">
                            {{-- <li class="px-2 py-3 my-2 list-h">

                            </li> --}}
                            {{-- <hr class="my-4 border-bottom b-mute"> --}}
                            @foreach ($course->Episode as $episode)
                                <li 
                                    class="click-to px-2 py-3 my-2 {{ Str::afterLast(url()->current(), '/') == $episode->id ? 'list-v-active' : 'list-v' }}"
                                >
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="mx-2 p-2 e-round">
                                            <i 
                                                class="text-primary {{ Str::afterLast(url()->current(), '/') == $episode->id ? 'fas fa-pause  m-active' : 'fas fa-play m-play' }}"
                                            ></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 text-sm text-light">Episode - {{ $loop->index + 1 }} | {{ $episode->title }}</p>
                                            <small class="mt-1 text-light">Duration : <span class="duration"></span></small>
                                        </div>
                                    </div>
                                    <input type="hidden" class="id" name="" value="{{ $episode->id }}">
                                </li>
                            @endforeach
                        </ul>
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
                <div class="col-lg-8 append">
                    {{-- append data --}}
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('script')
    <script>
        $(() => {
            const img_base_path = "{{ getEpisodePhotos('') }}";
            const vd_base_path = "{{ getEpisodes('') }}";
            let id = "{{ request()->segment(count(request()->segments())) }}";
            $.get(route('frontend.courses.episodes.video', "{{ $course->slug }}"), {id:id}, function(res) {
                let data = JSON.parse(res, true);
                let template = `
                    <div class="card p-2 radious_">
                        <video
                            id="my-player"
                            class="video-js"
                            controls
                            preload="auto"
                            poster="${img_base_path}/${data.image}"
                            data-setup='{}'
                            width="780px"
                            height="500px"
                            seeking
                            >
                            <source src="${vd_base_path}/${data.video}" type="video/mp4"></source>
                        </video>
                    </div>
                `;
                $('.append').append(template);
            });
        });

        $(document).on('click', '.click-to' , function() {
            function modifyUrl(title, url) {
                if (typeof (history.pushState) != "undefined") {
                    var obj = {
                        Title: title,
                        Url: url
                    };
                    history.pushState(obj, obj.Title, obj.Url);
                }
            }

            let img_path = "{{ getEpisodePhotos('') }}";
            let vd_path = "{{ getEpisodes('') }}";

            $('.side-list').find('.list-v-active').removeClass('list-v-active').addClass('list-v');
            $('.side-list').find('.fa-pause').removeClass('fas fa-pause m-active').addClass('fas fa-play m-play');
            $(this).find('i').removeClass('fas fa-play m-play').addClass('fas fa-pause m-active');
            $(this).removeClass('list-v').addClass('list-v-active');

            let last_url = $(location).attr('pathname').split("/").splice(0, 4).join("/");
            let url_path = last_url + '/' + $(this).find('.id').val();
            modifyUrl('Texh X App', url_path);
            let id = $(this).find('.id').val();

            $.get(route('frontend.courses.episodes.video', "{{ $course->slug }}"), {id:id}, function(res) {
                let data = JSON.parse(res, true);
                $('.radious_').remove();
                let template = `
                    <div class="card p-2 radious_">
                        <video
                            id="my-player"
                            class=""
                            controls
                            preload="auto"
                            poster="${img_path}/${data.image}"
                            data-setup='{}'
                            width="780px"
                            height="500px"
                            seeking
                            >
                            <source src="${vd_path}/${data.video}" type="video/mp4"></source>
                        </video>
                    </div>
                `;
                $('.append').append(template);
            });
            let player = videojs('#my-player');
        });

        $(document).on({
            ajaxStart: function(){
                $("#spinner-div").fadeIn(300); 
            },
            ajaxStop: function(){ 
                $("#spinner-div").fadeOut(300); 
            }    
        });

        $(document).on("ajaxComplete", function() {
            let player = videojs('#my-player');
        })
    </script>
@endpush