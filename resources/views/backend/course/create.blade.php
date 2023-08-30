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
                <h6>Create Course</h6>
            </div>
            <hr class="hr mx-4">
            <div class="card-body pt-0 pb-2">
                @include('backend.layouts.page_info')
                <form class="form-style form-v" action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="instructor" class="form-label">Instructor <span class="text-danger">*</span></label>
                        <select name="instructor_id" id="instructor" class="form-control" required>
                            @foreach ($instructors as $key => $instructor)
                                <option value="{{ $key }}">{{ $instructor }}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="mb-3" style="">
                        <label for="categories" class="form-label">Categories <span class="text-danger">*</span></label>
                        <select class="js-example-basic-multiple form-control" data-placeholder="Select category" id="categories" name="category_id[]" multiple="multiple" required>
                            @foreach ($categories as $key => $category)
                                <option value="{{ $key }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description"rows="2" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="summary" class="form-label">Summary <span class="text-danger">*</span></label>
                        <textarea name="summary" rows="2" class="form-control" id="course_summary" data-v-message="This field is required!" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price ( $ ) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price" id="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="cover_photo" class="form-label">Cover Photo <span class="text-danger">*</span></label>
                        <input type="file" name="cover_photo" class="form-control" id="cover_photo">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control" id="image">
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
    let editor = new RichTextEditor('#course_summary');

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@endpush