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
                <h6>Edit Category <span class="text-primary">{{ $category->title }}</span></h6>
            </div>
            <hr class="hr mx-4">
            <div class="card-body pt-0 pb-2">
                @include('backend.layouts.page_info')
                <form class="category-edit" action="{{ route('categories.update', [$category->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="name" value="{{ $category->title }}">
                    </div>
                    <div class="text-center">
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
    $(function() {
        $('#dob').Zebra_DatePicker({
            format: 'Y-m-d',
            default_position: 'below'
        });
    });
    </script>
@endpush

@push('css')
    <style>
        .category-edit input {
            background-color: transparent;
            color: #CFD1D9;
            border-color: #273569;
        }
        .category-edit input:focus {
            background-color: transparent;
            color: #CFD1D9;
        }
        .category-edit textarea {
            background-color: transparent;
            color: #CFD1D9;
            border-color: #273569;
        }
        .category-edit textarea:focus {
            background-color: transparent;
            color: #CFD1D9;
        }
        .category-edit select {
            background-color: transparent;
            color: #CFD1D9;
            border-color: #273569;
        }
        .category-edit select:focus {
            background-color: #111C44;
            color: #CFD1D9;
        }
        .category-edit option:hover {
            color: aqua;
        }
        .hr {
            background-color: #CFD1D9;
        }
        .bd-callout {
            background-color: transparent;
            padding: 1.25rem;
            margin-top: 1.25rem;
            margin-bottom: 1.25rem;
            border: 1px solid #273569;
            border-left-width: .25rem;
            border-radius: .25rem
        }
        .bd-callout ul {
            list-style-type: none;
        }
        .bd-callout-danger {
            border-left-color: #d9534f;
            color: #d9534f;
        }
    </style>
@endpush    