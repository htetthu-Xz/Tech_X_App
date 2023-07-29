@if ($errors->any())
    <div class="bd-callout bd-callout-danger mx-auto p-2">
        <ul class="mb-0 px-0">
            @foreach ($errors->all() as $error)
                <li class="text-sm"><i class="ri-error-warning-line fw-bold text-sm mx-1"></i>{{ $error }}</li>
            @endforeach 
        </ul>
    </div>
@endif

@if (session()->has('success'))
    <div class="bd-callout bd-callout-success mx-auto p-2">
        <ul class="mb-0 px-0">
            <li class="text-sm"><i class="ri-check-fill fw-bold text-sm mx-1"></i>{{ session('success') }}</li>
        </ul>
    </div>
@endif