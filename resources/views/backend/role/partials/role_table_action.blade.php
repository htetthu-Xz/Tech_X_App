<a href="{{ route('roles.edit', [$role->id]) }}" title="Edit" class="" data-toggle="tooltip" data-original-title="Edit user">
    <i class="text-primary fas fa-edit text-lg"></i>
</a>
\
<form action="{{ route('roles.destroy', [$role->id]) }}" title="Delete" method="POST" class="d-inline delete_form">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete_button" data-toggle="tooltip" data-original-title="Delete user">
        <i class="fas fa-trash-alt text-danger text-lg"></i>
    </button>
</form>
\
<a href="{{ route('roles.show', [$role->id]) }}" title="Details" class="" data-toggle="tooltip" data-original-title="Edit user">
    <i class="text-info far fa-eye text-lg"></i>
</a>