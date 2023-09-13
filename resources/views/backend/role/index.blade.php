@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- @include('backend.layouts.page_info') --}}
        <div class="text-end">
            <a href="{{ route('roles.create') }}" class="btn btn-primary">
                Create Role
                <i class="fas fa-plus mx-1"></i>
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Roles</h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="adminTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-xs font-weight-bolder">Name</th>
                                <th class="text-uppercase text-xs font-weight-bolder ps-2">Created_date</th>
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
            ajax: "{{ route('roles.index') }}",
            columns: [
                {
                    data:'name',
                    name:'name',
                    class: 'text-light text-sm'
                },
                {
                    data:'created_date',
                    name:'created_date',
                    class: 'text-light text-sm mb-0'
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
            'Are you sure want to delete this Role?',
            onOk,
            onCancel,
            {
                labels: {
                    confirm: 'Delete Role'
                }
            }
        )
    })
</script>
@endpush   
