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
                <h6>Edit Role <span class="text-primary">{{ $role->name }}</span></h6>
            </div>
            <hr class="hr mx-4">
            <div class="card-body pt-0 pb-2">
                @include('backend.layouts.page_info')
                <form class="form-style form-v" action="{{ route('roles.update', [$role->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">Role <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $role->name }}" required>
                    </div>
                    <div class="mb-3" style="">
                        <label for="permission" class="form-label">Permission <span class="text-danger">*</span></label>
                        <select class="js-example-basic-multiple form-control" data-placeholder="Select Roles" name="permissions[]" multiple="multiple" required>
                            @foreach ($permissions as $key => $permission)
                                    @if (array_key_exists($key, $role_permission_id))
                                        <option value="{{ $permission }}" selected>{{ $permission }}</option>
                                    @else
                                        <option value="{{ $permission }}">{{ $permission }}</option>
                                    @endif                              
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('roles.index') }}" class="btn btn-dark mx-2">Cancel</a>
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
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush