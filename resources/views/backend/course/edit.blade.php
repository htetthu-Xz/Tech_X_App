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
                <h6>Edit Course <span class="text-primary">{{ $course->name }}</span></h6>
            </div>
            <hr class="hr mx-4">
            <div class="card-body pt-0 pb-2">
                @include('backend.layouts.page_info')
                <form class="form-style" action="{{ route('courses.update',[$course->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="name" value="{{ $course->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="instructor" class="form-label">Instructor <span class="text-danger">*</span></label>
                        <select name="instructor_id" id="instructor" class="form-control" >
                            @foreach ($instructors as $instructor)
                                @if($instructor->id == $course->Instructor->id)
                                    <option value="{{ $instructor->id }}" selected>{{ $instructor->name }}</option>
                                @else
                                    <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                @endif
                            @endforeach 
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description"rows="2" class="form-control">{{ $course->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="summary" class="form-label">Summary <span class="text-danger">*</span></label>
                        <textarea name="summary" rows="2" class="form-control" id="course_summary">{{ $course->summary }}</textarea>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('courses.index') }}" class="btn btn-dark mx-2">Cancel</a>
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
    let editor = new RichTextEditor('#course_summary')
</script>
@endpush