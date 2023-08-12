@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-sm ml-0"><i class="ri-error-warning-line fw-bold text-sm mx-1"></i>{{ $error }}</li>
            @endforeach 
        </ul>
    </div>
@endif

@if (session()->has('err'))
    <div class="alert alert-danger">
        <ul>
            <li class="text-sm">Your email has not been verified yet.</li>
            <li class="text-sm">Please check your email inbox to verify your email.</li>
            <li class="text-sm">Do not have verification link? <a class="s-resend" href="{{ route('verification.resend') }}">Resent verification link</a></li>
        </ul>
    </div>
@endif