@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- @include('backend.layouts.page_info') --}}
        <div class="text-end">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                Create Users
                <i class="ri-user-add-fill align-text-bottom"></i>
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Users</h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="userTable">
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
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">{{ $user->id }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ $user->profile }}" class="avatar avatar-sm me-3" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{-- <p class="text-xs font-weight-bold mb-0">Manager</p> --}}
                                        <p class="text-xs text-secondary mb-0">{{ $user->phone }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-uppercase text-xs text-secondary mb-0">
                                            @if ($user->gender == 'male')
                                                Male
                                            @elseif($user->gender == 'female')
                                                female
                                            @else
                                                Other
                                            @endif
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $user->Dob)->format('m/d/Y')}}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{ route('users.edit', [$user->id]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                        \
                                        <form action="{{ route('users.destroy', [$user->id]) }}" method="POST" class="d-inline delete_form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete_button font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
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
        let table = new DataTable('#userTable');
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
                'Are you sure want to delete this user?',
                onOk,
                onCancel,
                {
                    labels: {
                        confirm: 'Delete User'
                    }
                }
            )
        })
    </script>
    @if (session()->has('delete_status'))
        <script>
            let notifier = new AWN();
            notifier.info('User Successfully Deleted!', {durations: {info: 3000}})
        </script>
    @endif

    @if (session()->has('create_status'))
        <script>
            let notifier = new AWN();
            notifier.info('User Successfully Created!', {durations: {info: 3000}})
        </script>
    @endif

    @if (session()->has('update_status'))
        <script>
            let notifier = new AWN();
            notifier.info('User Successfully Updated!', {durations: {info: 3000}})
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