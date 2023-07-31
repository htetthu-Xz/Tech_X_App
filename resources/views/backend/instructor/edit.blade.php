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
                <h6>Edit Instructor <span class="text-primary">{{ $instructor->name }}</span></h6>
            </div>
            <hr class="hr mx-4">
            <div class="card-body pt-0 pb-2">
                @include('backend.layouts.page_info')
                <form class="form-style" action="{{ route('instructors.update', [$instructor->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $instructor->name }}">
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ $instructor->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="phone" name="phone" class="form-control" id="name"  value="{{ $instructor->phone }}">
                    </div>
                    <div class="mb-3">
                      <label for="password1" class="form-label">Password <span class="text-danger">*</span></label>
                      <input type="password" name="password" class="form-control" id="password1">
                    </div>
                    <div class="mb-3">
                        <label for="confirm-assword1" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control" id="confirm-password">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" rows="2" class="form-control"> {{ $instructor->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                        <input type="text" name="dob" class="form-control" id="dob" value="{{ $instructor->Dob }}"">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                        <select name="gender" id="gender" class="form-control" >
                            <option value="male" {{ $instructor->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $instructor->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $instructor->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="profile" class="form-label">Profile <span class="text-danger">*</span></label>
                        <input type="file" name="profile" class="form-control" id="profile">
                    </div>
                    <div class="text-center">
                        <a href="{{ route('instructors.index') }}" class="btn btn-dark mx-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection   