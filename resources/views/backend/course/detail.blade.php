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
                <h6><span class="text-primary">{{ $course->title }}</span> Course</h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Courses Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $course->title }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Instructor</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $course->Instructor->name }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Description</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $course->description }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Price</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">${{ $course->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($course->cover_photo !== null || $course->image !== null)
                            <div class="col-lg-12">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <h4 class="text-lg ">
                                            <u class="text-info">Photos</u>
                                        </h4>
                                        <div class="mx-5 mt-4 row">
                                            @if ($course->cover_photo !== null)
                                                <div class="col-sm-6">
                                                    <h6>
                                                        <u>Cover Photo</u>
                                                    </h6>
                                                    <div class="">
                                                        <img src="{{ getCoursePhotos($course->cover_photo) }}" class="mx-2" alt="cover" height="300px" width="350px">
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($course->image !== null)
                                                <div class="col-sm-6">
                                                    <h6>
                                                        <u>Image</u>
                                                    </h6>
                                                    <div class="">
                                                        <img src="{{ getCoursePhotos($course->image) }}" class="mx-2" alt="cover" height="300px" width="350px">
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
                                        <u class="text-success">Summary</u>
                                    </h4>
                                    <div class="mx-5 mt-4">
                                        {!! $course->summary !!}
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
