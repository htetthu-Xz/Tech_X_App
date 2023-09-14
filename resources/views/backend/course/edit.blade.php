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
                <form class="form-style form-v" action="{{ route('courses.update',[$course->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="name" value="{{ $course->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="instructor" class="form-label">Instructor <span class="text-danger">*</span></label>
                        <select name="instructor_id" id="instructor" class="form-control" required>
                            @foreach ($instructors as $instructor)
                                @if($instructor->id == $course->Instructor->id)
                                    <option value="{{ $instructor->id }}" selected>{{ $instructor->name }}</option>
                                @else
                                    <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                @endif
                            @endforeach 
                        </select>
                    </div>
                    <div class="mb-3" style="">
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="js-example-basic-multiple form-control" id="category" data-placeholder="Select category" name="category_id[]" multiple="multiple" required>
                            @foreach ($categories as $key => $category)
                                    @if (array_key_exists($key, $course_category_id))
                                        <option value="{{ $key }}" selected>{{ $category }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $category }}</option>
                                    @endif                              
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description"rows="2" class="form-control" required>{{ $course->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="summary" class="form-label">Summary <span class="text-danger">*</span></label>
                        <textarea name="summary" rows="2" class="form-control" id="course_summary" data-v-message="This field is required!" required>{{ $course->summary }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price ( $ ) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="price" id="price" value="{{ $course->price }}" required>
                    </div>
                    @if ($course->cover_photo == '')
                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover Photo </label>
                            <input type="file" class="form-control" name="cover_photo" id="cover" value="">
                        </div>
                    @endif
                    @if ($course->image == '')
                        <div class="mb-3">
                            <label for="image" class="form-label">Image </label>
                            <input type="file" class="form-control" name="image" id="image" value="">
                        </div>
                    @endif
                    <div class="d-flex justify-content-evenly">
                        @if ($course->cover_photo !== '')
                            <div class="mb-4 cover-edit">
                                <div class="card mb-3 w-cover p-3">
                                    <div class="py-3"><b>Cover Photo</b></div>
                                    <div class="align-items-center justify-content-center mb-2 c-box">
                                        <img src="{{ getCoursePhotos($course->cover_photo) }}" class="mx-3 cover-img" alt="profile">
                                        <i class="fas fa-edit ch c-font"></i>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($course->image !== '')
                            <div class="mb-4 image-edit">
                                <div class="card mb-3 w-image p-3">
                                    <div class="py-3"><b>Image</b></div>
                                    <div class="align-items-center mb-2 i-box">
                                        <img src="{{ getCoursePhotos($course->image) }}" class="mx-3 i-img" alt="profile">
                                        <i class="fas fa-edit img i-font"></i>
                                    </div>
                                </div>
                            </div>
                        @endif
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

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

    $(document).on('click', '.ch', () => {
        let template = `
            <div class="card p-3 mt-3">
                <label for="cover_photo" class="form-label">Cover Photo <span class="text-danger">*</span></label>
                <input type="file" name="cover_photo" class="form-control" id="cover_photo">
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
</script>
@endpush