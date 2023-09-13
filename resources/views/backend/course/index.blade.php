@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- @include('backend.layouts.page_info') --}}
        <div class="text-end">
            <a href="{{ route('courses.create') }}" class="btn btn-primary">
                Create Course
                <i class="fas fa-plus mx-1"></i>
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Courses</h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="adminTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-xs font-weight-bolder">Title</th>
                                <th class="text-uppercase text-xs font-weight-bolder ps-2">Instructor</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Description</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Created Date</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Action</th>
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
        let table = $('#adminTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('courses.index') }}",
            columns: [
                {
                    data:'title',
                    name:'title',
                    class: 'mb-0 text-light text-sm'
                },
                {
                    data:'instructor',
                    name:'instructor',
                    class: 'mb-0 text-light text-sm'
                },
                {
                    data:'description',
                    name:'description',
                    class: 'text-light text-sm mb-0 align-middle'
                },
                {
                    data:'created_date',
                    name:'created_date',
                    class: 'text-light text-sm align-middle',
                },
                {
                    data:'action',
                    name:'action',
                    class: 'text-center'
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
            'Are you sure want to delete this admin?',
            onOk,
            onCancel,
            {
                labels: {
                    confirm: 'Delete Admin'
                }
            }
        )
    })
</script>
@endpush   
