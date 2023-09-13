@extends('backend.layouts.app')

@push('css')
    <style>
        .vjs-poster {
            object-fit: cover;
        }

         .con {
            width: 420px; 
            height: 200px; 
            overflow: hidden; 
            position: relative;
        }
        
        .vd {
            width: 100%; 
            height: 100%;
            object-fit: cover; 
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="text-end">
            <a href="{{ url()->previous() }}" class="btn btn-primary">
                <i class="ri-arrow-left-s-line align-middle"></i>
                back
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Edit Epicode <span class="text-primary">{{ $episode->title }}</span></h6>
            </div>
            <hr class="hr mx-4">
            <div class="card-body pt-0 pb-2">
                @include('backend.layouts.page_info')
                <form class="form-style form-v" action="{{ route('episodes.update',[$episode->Course->id, $episode->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    {{-- <div class="mb-3">
                        <label for="course" class="form-label">Course <span class="text-danger">*</span></label>
                        <select name="course_id" id="course" class="form-control" readonly="readonly">
                            <option value="{{ $episode->Course->id }}">{{ $episode->Course->title }}</option>
                        </select>
                    </div> --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="name" value="{{ $episode->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="summary" class="form-label">Summary <span class="text-danger">*</span></label>
                        <textarea name="summary" id="summary"rows="2" class="form-control" required>{{ $episode->summary }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="privacy" class="form-label">Privacy <span class="text-danger">*</span></label>
                        <div class="form-check form-switch">
                            <small>Private<i class="ni ni-lock-circle-open mx-1"></i></small>
                            @if ($episode->privacy == 'public')
                                <input class="form-check-input mx-1" name="privacy" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                            @else
                                <input class="form-check-input mx-1" name="privacy" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            @endif
                            <small><i class="ni ni-world-2 mx-1"></i>Public</small>                        
                        </div>
                    </div>
                    <div class="d-flex justify-content-evenly">
                        <div class="mb-4 cover-edit">
                            <div class="card mb-3 w-cover p-3">
                                <div class="py-3"><b>Cover Photo</b></div>
                                <div class="align-items-center justify-content-center mb-2 c-box">
                                    <img src="{{ getEpisodePhotos($episode->cover) }}" class="mx-3 cover-img" alt="profile">
                                    <i class="fas fa-edit ch c-font"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 image-edit">
                            <div class="card mb-3 w-image p-3">
                                <div class="py-3"><b>Image</b></div>
                                <div class="align-items-center mb-2 i-box">
                                    <img src="{{ getEpisodePhotos($episode->image) }}" class="mx-3 i-img" alt="profile">
                                    <i class="fas fa-edit img i-font"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 v-edit">
                        <div class="d-flex justify-content-center">
                            <div class="card p-3 w-50">
                                <div class="pt-2 pb-4"><b>Video</b></div>
                                <div class="con card p-3 v-box">
                                    <video class="vd video__" controls>
                                        <source src="{{ getEpisodes($episode->video) }}" type="video/mp4">
                                    </video>
                                    <i class="fas fa-edit vd__ v-font"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('episodes.index', [$episode->Course->id]) }}" class="btn btn-dark mx-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection   
@push('script')
    <script>
        $(document).on('click', '.ch', () => {
            let template = `
                <div class="card p-3 mt-3">
                    <label for="cover" class="form-label">Cover <span class="text-danger">*</span></label>
                    <input type="file" name="cover" class="form-control" id="cover_photo">
                </div>
            `;

            $('.cover-edit').append(template);
            $('.ch').removeClass('ch');
        })

        $(document).on('click', '.img', () => {
            let template = `
            <div class="card p-3 mt-3">
                <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            `;

            $('.image-edit').append(template);
            $('.img').removeClass('img');
        })

        $(document).on('click', '.vd__', () => {
            let template = `
                <label for="video" class="form-label">Video(Mp4)</label>
                <input type="file" name="video" class="form-control" id="video">
            `;

            $('.v-edit').append(template);
            $('.vd__').removeClass('vd__');
        })
    </script>
@endpush