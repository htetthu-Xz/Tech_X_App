<a href="{{ route('instructors.edit', [$instructor->id]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
    Edit
</a>
\
<form action="{{ route('instructors.destroy', [$instructor->id]) }}" method="POST" class="d-inline delete_form">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete_button font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
        Delete
    </button>
</form>
\
<a href="{{ route('instructors.show', [$instructor->id]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
    Detail
</a>