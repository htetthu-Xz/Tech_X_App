@extends('backend.layouts.app')

@push('css')
    <style>
        .d-hr hr {
            background-color: #3a519e;
        }
    </style>
@endpush

@section('content')
<div class="row d-hr">
    <div class="col-12">
        <div class="text-end">
            <a href="{{ url()->previous() }}" class="btn btn-primary">
                <i class="ri-arrow-left-s-line align-middle"></i>
                back
            </a>
        </div>
        <div class="card mb-4" style="background-color: #0e1a3f;">
            <div class="card-header pb-0">
                <h6><span class="text-primary">{{ $episode->title }}</span></h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Episode Title</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $episode->title }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Course</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $episode->Course->title }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Summary</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $episode->summary }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Privacy</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $episode->privacy }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($episode->cover !== null || $episode->image !== null)
                            <div class="col-lg-12">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <h4 class="text-lg ">
                                            <u class="text-info">Photos</u>
                                        </h4>
                                        <div class="mx-5 mt-4 row text-start">
                                            @if ($episode->cover !== null)
                                                <div class="col-sm-6">
                                                    <h6>
                                                        <u>Cover Photo</u>
                                                    </h6>
                                                    <div class="">
                                                        <img src="{{ getEpisodePhotos($episode->cover) }}" class="detail-img" alt="cover">
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($episode->image !== null)
                                                <div class="col-sm-6">
                                                    <h6>
                                                        <u>Image</u>
                                                    </h6>
                                                    <div class="">
                                                        <img src="{{ getEpisodePhotos($episode->image) }}" class="detail-img" alt="cover">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-12">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h4 class="text-lg ">
                                        <u class="text-success">Video</u>
                                    </h4>
                                    <div class="mx-5 mt-4">
                                        <div class="">
                                            <video
                                                id="my-player"
                                                class="video-js"
                                                controls
                                                preload="auto"
                                                poster="{{ getEpisodePhotos($episode->cover) }}"
                                                data-setup='{}'
                                                width="780px"
                                                height="500px"
                                                seeking
                                                >
                                                <source src="{{ getEpisodes($episode->video) }}" type="video/mp4"></source>
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        let player = videojs('my-player');
    </script>
@endpush
