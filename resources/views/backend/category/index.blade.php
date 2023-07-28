@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- @include('backend.layouts.page_info') --}}
        <div class="text-end ">
            <a href="{{ route('category.create') }}" class="btn btn-primary">
                Create Category
                <i class="ni ni ni-fat-add align-text-bottom"></i>
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Categories</h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="categoryTable">
                        <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Slug</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">{{ $category->id }}</p>
                                    </td>
                                    <td>
                                        <h6 class="text-sm mb-0">{{ $category->title }}</h6>
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $category->slug }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{ route('category.edit', [$category->id]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit category">
                                            Edit
                                        </a>
                                        \
                                        <form action="{{ route('category.destroy', [$category->id]) }}" method="POST" class="d-inline delete_form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete_button font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete category">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        let table = new DataTable('#categoryTable');
    </script>
    <script>
        $('table tbody').on('click', '.delete_form' ,function(e) {
            e.preventDefault();
            let notifier = new AWN();
            let onOk = () => {
                $(this).submit()
            };
            let onCancel = () => {
                exit();
            };
            notifier.confirm(
                'Are you sure want to delete this category?',
                onOk,
                onCancel,
                {
                    labels: {
                        confirm: 'Delete category'
                    }
                }
            )
        })
    </script>
    @if (session()->has('delete_status'))
        <script>
            let notifier = new AWN();
            notifier.info('category Successfully Deleted!', {durations: {info: 3000}})
        </script>
    @endif

    @if (session()->has('create_status'))
        <script>
            let notifier = new AWN();
            notifier.info('category Successfully Created!', {durations: {info: 3000}})
        </script>
    @endif

    @if (session()->has('update_status'))
        <script>
            let notifier = new AWN();
            notifier.info('category Successfully Updated!', {durations: {info: 3000}})
        </script>
    @endif
@endpush

@push('css')
    <style>
        div.dataTables_length select {
            color: #CFD1D9 !important;
            background-color: #111C44 !important; 
        }
        table.dataTable tbody tr:hover {
            background-color:#293357 !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #293357 !important;
            color: #CFD1D9 !important;
        }
        .paginate_button.current  {
            background-color: #293357 !important;
        }
        .dataTables_filter input:focus {
            border-color: none;
            outline: none;
            box-shadow: none;
        }
        .dataTables_filter input {
            margin-left: 5px !important; 
        }
        .delete_button {
            border: none;
            background-color: transparent;
            color: #FFFFFF;
        }
    </style>
@endpush    