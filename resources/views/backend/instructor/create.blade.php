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
                <h6>Create Instructor</h6>
            </div>
            <hr class="hr mx-4">
            <div class="card-body pt-0 pb-2">
                @include('backend.layouts.page_info')
                <form class="form-style form-v" action="{{ route('instructors.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="phone" name="phone" class="form-control" id="phone" data-v-min-length="7" data-v-max-length="13" required>
                    </div>
                    <div class="mb-3">
                      <label for="password1" class="form-label">Password <span class="text-danger">*</span></label>
                      <input type="password" name="password" class="form-control" data-v-min-length="8" id="password1" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-assword1" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" data-v-equal="#password1"  data-v-message="Password and Confirm Password does not match." data-v-min-length="8" class="form-control" id="confirm-password">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                        <input type="text" name="dob" class="form-control" id="dob" data-v-min="3" data-v-message="This field is required!" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea name="bio" id="bio" rows="2" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="profile" class="form-label">Profile <span class="text-danger">*</span></label>
                        <input type="file" name="profile" class="form-control" id="profile">
                    </div>
                    <div class="mb-3">
                        <label for="profile" class="form-label">Link <span class="text-danger">*</span></label>
                        <div class="pt-2 pb-2 rounded m-3 b-color append">
                            <div class="m-4 add">
                                <div class="text-end p-2">
                                    <button class="btn btn-primary addMore">
                                        <i class="ri-add-circle-fill mr-2 text-light"></i>
                                        Add More
                                    </button>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="icon" class="form-label">Icon <span class="text-danger">*</span></label>
                                        <input type="text" name="link[0][icon]" class="form-control" id="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="link" class="form-label">Link <span class="text-danger">*</span></label>
                                        <input type="url" id="url" name="link[0][link]" class="form-control" id="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="label" class="form-label">Label <span class="text-danger">*</span></label>
                                        <input type="text" name="link[0][label]" class="form-control" id="name" required>
                                    </div>
                                </div>
                            </div>
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
        $(document).ready(function() {
            $('.addMore').on('click', function(e) {
            e.preventDefault();
            let count = $('.add').length
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