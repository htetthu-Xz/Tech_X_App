@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="text-end">
            <a href="{{ route('admins.create') }}" class="btn btn-primary">
                Create Admin
                <i class="fas fa-user-plus mx-2"></i>
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Admins</h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="adminTable">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">Name (Email)</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">phone</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">Gender</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">Date of Birth</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">Created Date</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">Action</th>
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
                ajax: "{{ route('admins.index') }}",
                columns: [
                    {
                        data:'name_email',
                        name:'name_email'
                    },
                    {
                        data:'phone',
                        name:'phone',
                        class: 'text-light text-sm mb-0'
                    },
                    {
                        data:'gender',
                        name:'gender',
                        class: 'text-uppercase text-sm text-light mb-0 align-middle'
                    },
                    {
                        data:'Dob',
                        name:'Dob',
                        class: 'text-light text-sm align-middle'
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
