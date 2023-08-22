@extends('backend.layouts.app')

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
                <form class="form-style form-v" action="{{ route('episodes.update',[$episode->Course->id, $episode->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="course" class="form-label">Course <span class="text-danger">*</span></label>
                        <select name="course_id" id="course" class="form-control" readonly="readonly">
                            <option value="{{ $episode->Course->id }}">{{ $episode->Course->title }}</option>
                        </select>
                    </div>
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
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input type="file" name="cover" class="form-control" id="cover">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="video" class="form-label">Video</label>
                        <input type="file" name="video" class="form-control" id="video">
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