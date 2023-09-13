<a href="{{ route('admins.edit', [$admin->id]) }}" title="Edit" class="cursor-pointer font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
    <i class="text-primary fas fa-edit text-lg"></i>
</a>
\
<form action="{{ route('admins.destroy', [$admin->id]) }}" title="Delete" method="POST" class="cursor-pointer d-inline delete_form">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete_button text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
        <i class="fas fa-trash-alt text-lg"></i>
    </button>
</form>
\
<a href="{{ route('admins.show', [$admin->id]) }}" title="Details" class="cursor-pointer font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
    <i class="text-info far fa-eye text-lg"></i>
</a>