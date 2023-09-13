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
                <h6>Instructor <span class="text-primary">{{ $instructor->name }}</span></h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="{{ getProfile($instructor->profile) }}" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3">{{ $instructor->name }}</h5>
                                    <div class="my-2">
                                        <a href="{{ route('instructors.edit', [$instructor->id]) }}" class="btn btn-primary">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $instructor->name }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $instructor->email }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $instructor->phone }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Gender</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $instructor->gender }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Date of Birth</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $instructor->Dob }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $instructor->address }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach (json_decode($instructor->link, true) as $key => $items)
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Link-{{ $key+1 }}</p>
                                            </div>
                                            <div class="col-sm-9">
                                                @foreach ($items as $key => $item)
                                                    <div class="row my-1">
                                                        <div class="col-sm-3">
                                                            <p class="text-muted mb-0">{{ $key }}</p>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <p class="text-muted mb-0">{{ $item }}</p>
                                                        </div>
                                                    </div>
                                                    @if($key !== 'label')
                                                        <hr>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                    
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
