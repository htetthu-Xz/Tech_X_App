@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- @include('backend.layouts.page_info') --}}
        <div class="text-end ">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Slug</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Date</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                        </thead>
                        <tbody>
                            {{-- DataTable Data --}}                        
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
        $(function ()  {
            let table = $('#categoryTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('categories.index') }}",
                columns: [
                    {
                        data:'title',
                        name:'title',
                        class: 'text-sm mb-0'
                    },
                    {
                        data:'slug',
                        name:'slug',
                        class: 'text-secondary text-xs font-weight-bold'
                    },
                    {
                        data:'created_date',
                        name:'created_date',
                        class: 'text-secondary text-xs font-weight-bold align-middle',
                    },
                    {
                        data:'Action',
                        name:'Action'
                    }
                ]
            })
        })
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
@endpush