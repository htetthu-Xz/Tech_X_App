<a href="{{ route('roles.edit', [$role->id]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
    Edit
</a>
\
<form action="{{ route('roles.destroy', [$role->id]) }}" method="POST" class="d-inline delete_form">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete_button font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
        Delete
    </button>
</form>
\
<a href="{{ route('roles.show', [$role->id]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
    Detail
</a>