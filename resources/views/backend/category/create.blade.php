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
                <h6>Create Category</h6>
            </div>
            <hr class="hr mx-4">
            <div class="card-body pt-0 pb-2">
                @include('backend.layouts.page_info')
                <form class="category-create" action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="name">
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
        .category-create input {
            background-color: transparent;
            color: #CFD1D9;
            border-color: #273569;
        }
        .category-create input:focus {
            background-color: transparent;
            color: #CFD1D9;
        }
        .category-create textarea {
            background-color: transparent;
            color: #CFD1D9;
            border-color: #273569;
        }
        .category-create textarea:focus {
            background-color: transparent;
            color: #CFD1D9;
        }
        .category-create select {
            background-color: transparent;
            color: #CFD1D9;
            border-color: #273569;
        }
        .category-create select:focus {
            background-color: #111C44;
            color: #CFD1D9;
        }
        .category-create option:hover {
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