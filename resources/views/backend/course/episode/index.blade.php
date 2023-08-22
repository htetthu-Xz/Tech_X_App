@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        {{-- @include('backend.layouts.page_info') --}}
        <div class="text-end">
            <a href="{{ route('episodes.create', [$id]) }}" class="btn btn-primary">
                Create Episode
                <i class="ni ni-button-play align-text-bottom"></i>
            </a>
        </div>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Episodes</h6>
            </div>
            <div class="card-body pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" id="adminTable">
                        <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Course</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Summary</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Privacy</th>
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
        <div class="text-start">
            <a href="{{ url()->previous() }}" class="btn btn-dark">
                <i class="ri-arrow-left-s-line align-middle"></i>
                back
            </a>
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
            ajax: "{{ route('episodes.index', [$id]) }}",
            columns: [
                {
                    data:'title',
                    name:'title',
                    class: 'mb-0 text-sm'
                },
                {
                    data:'course',
                    name:'course',
                    class: 'mb-0 text-sm'
                },
                {
                    data:'summary',
                    name:'summary',
                    class: 'text-xs mb-0 align-middle'
                },
                {
                    data:'privacy',
                    name:'privacy',
                    class: 'text-secondary text-xs font-weight-bold align-middle',
                },
                {
                    data:'created_date',
                    name:'created_date',
                    class: 'text-secondary text-xs font-weight-bold align-middle',
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
            'Are you sure want to delete this episode?',
            onOk,
            onCancel,
            {
                labels: {
                    confirm: 'Delete Episode'
                }
            }
        )
    })
</script>
@endpush   
