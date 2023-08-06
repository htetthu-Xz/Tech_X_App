@extends('backend.layouts.app')

@push('css')
    <style>
        .d-hr hr {
            background-color: #3a519e;
        }

        .text-bdg {
            color: #263972;
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
                <h6><span class="text-primary">{{ $role->name }}</span> Role</h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Role Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $role->name }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Permission</p>
                                        </div>
                                        <div class="col-sm-9">
                                            {{-- <p class="text-muted mb-0"></p> --}}
                                            @foreach ($permissions as $permission)
                                                <span class="badge bg-success text-bdg w-25 m-1">{{ $permission }}</span>
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
    </div>
</div>
@endsection
