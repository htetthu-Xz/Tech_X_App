@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- @include('backend.layouts.page_info') --}}
        <div class="text-end">
            <a href="{{ route('instructors.create') }}" class="btn btn-primary">
                Create Instructors
                <i class="ri-user-add-fill align-text-bottom"></i>
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Instructors</h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="instructorTable">
                        <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name (Email)</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">phone</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gender</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Birth</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                        </thead>
                        <tbody>
                            {{-- Datatable Data --}}
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
            let table = $('#instructorTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('instructors.index') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        class: 'text-xs text-secondary mb-0'
                    },
                    {
                        data:'Name(Email)',
                        name:'Name(Email)'
                    },
                    {
                        data:'phone',
                        name:'phone',
                        class: 'text-xs text-secondary mb-0'
                    },
                    {
                        data:'gender',
                        name:'gender',
                        class: 'text-uppercase text-xs text-secondary mb-0 align-middle text-center'
                    },
                    {
                        data:'Dob',
                        name:'Dob',
                        class: 'text-secondary text-xs font-weight-bold align-middle text-center'
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
                'Are you sure want to delete this instructor?',
                onOk,
                onCancel,
                {
                    labels: {
                        confirm: 'Delete Instructor'
                    }
                }
            )
        })
    </script>
@endpush  