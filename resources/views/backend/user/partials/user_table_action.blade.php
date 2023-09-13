<a href="{{ route('users.edit', [$user->id]) }}" title="Edit" class="" data-toggle="tooltip" data-original-title="Edit user">
    <i class="text-primary fas fa-edit text-lg"></i>
</a>
\
<form action="{{ route('users.destroy', [$user->id]) }}" title="Delete" method="POST" class="d-inline delete_form">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete_button text-danger " data-toggle="tooltip" data-original-title="Delete user">
        <i class="fas fa-trash-alt text-lg"></i>
    </button>
</form>
\
<a href="{{ route('users.show', [$user->id]) }}" title="Details" class="x" data-toggle="tooltip" data-original-title="Edit user">
    <i class="text-info far fa-eye text-lg"></i>
</a>