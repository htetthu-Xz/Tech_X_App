<div class="d-flex py-1">
    <div>
        <img src="{{ $instructor->profile }}" class="avatar avatar-sm me-3" alt="user1">
    </div>
    <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm">{{ $instructor->name }}</h6>
            <p class="text-xs text-secondary mb-0">{{ $instructor->email }}</p>
    </div>
</div>