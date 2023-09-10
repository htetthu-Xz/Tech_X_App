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
                <form class="form-style form-v" action="{{ route('instructors.update', [$instructor->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $instructor->name }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ $instructor->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="phone" name="phone" class="form-control" data-v-min-length="7" data-v-max-length="13" id="phone"  value="{{ $instructor->phone }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="password1" class="form-label">Password <span class="text-danger">*</span></label>
                      <input type="password" name="password" class="form-control" id="password1"  data-v-min-length="8">
                    </div>
                    <div class="mb-3">
                        <label for="confirm-assword1" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" data-v-equal="#password1" data-v-min-length="8" data-v-message="Password and Confirm Password does not match." class="form-control" id="confirm-password">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" rows="2" class="form-control"> {{ $instructor->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                        <input type="text" name="dob" class="form-control" data-v-min="3" data-v-message="This field is required!" id="dob" value="{{ $instructor->Dob }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="male" {{ $instructor->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $instructor->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $instructor->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea name="bio" id="bio" rows="2" class="form-control" required>{{ $instructor->Bio }}</textarea>
                    </div>
                    <div class="mb-4 profile-edit">
                        <div class="card mb-3 w-pf p-3">
                            <div class="py-3"><b>Profile Picture</b></div>
                            <div class="align-items-center mb-2 box">
                                <img src="{{ getProfile($instructor->profile) }}" class="mx-3 pf-img" alt="profile">
                                <i class="fas fa-edit pf e-font"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="profile" class="form-label">Link <span class="text-danger">*</span></label>
                        <div class="pt-2 pb-2 rounded m-3 b-color append">

                            @foreach (json_decode($instructor->link, true) as $key => $item)
                                <div class="m-4 de add">
                                    @if ($key > 0)
                                        <hr class="app-hr mx-2 mb-1 mt-5">
                                    @endif
                                    <div class="text-end p-2">
                                        @if ($key > 0)
                                            <button class="btn btn-danger dele" type="button">
                                                <i class="ri-delete-bin-6-line mr-2 text-light"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-primary addMore">
                                                <i class="ri-add-circle-fill mr-2 text-light"></i>
                                                Add More
                                            </button>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="icon" class="form-label">Icon <span class="text-danger">*</span></label>
                                            <input type="text" name="link[{{ $key }}][icon]" class="form-control" id="name" value="{{ $item['icon'] }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="link" class="form-label">Link <span class="text-danger">*</span></label>
                                            <input type="url" id="url" name="link[{{ $key }}][link]" class="form-control" value="{{ $item['link'] }} id="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="label" class="form-label">Label <span class="text-danger">*</span></label>
                                            <input type="text" name="link[{{ $key }}][label]" class="form-control" value="{{ $item['label'] }} id="name" required>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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

@push('script')
    <script>
        $(document).on('click', '.pf', () => {
            let template = `
                <label for="profile" class="form-label">Profile <span class="text-danger">*</span></label>
                <input type="file" name="profile" class="form-control" id="profile">
            `;

            $('.profile-edit').append(template);
            $('.pf').removeClass('pf');
        });

        $(document).ready(function() {
            $('.addMore').on('click', function(e) {
            e.preventDefault();
            let count = $('.add').length
            console.log(count)
            let template = `
                <div class="m-4 de add">
                    <hr class="app-hr mx-2 mb-1 mt-5">
                    <div class="text-end p-2 ">
                        <button class="btn btn-danger dele" type="button">
                            <i class="ri-delete-bin-6-line mr-2 text-light"></i>
                        </button>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="icon" class="form-label">Icon <span class="text-danger">*</span></label>
                            <input type="text" name="link[${count}][icon]" data-v-message="This field is required!" class="form-control" id="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="link" class="form-label">Link <span class="text-danger">*</span></label>
                            <input type="url" id="url" name="link[${count}][link]" data-v-message="This field is required!" class="form-control" id="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="label" class="form-label">Label <span class="text-danger">*</span></label>
                            <input type="text" name="link[${count}][label]" data-v-message="This field is required!" class="form-control" id="name" required>
                        </div>
                    </div>
                </div>
                `;

                $('.append').append(template)
            });
            $(document).on('click', '.dele' , function(e) {
                e.preventDefault()
                $(this).closest('.de').remove()
            })
        })
    </script>
@endpush