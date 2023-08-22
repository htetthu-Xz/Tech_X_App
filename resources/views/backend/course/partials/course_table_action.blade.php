<a href="{{ route('episodes.index', [$course->id]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Episode index">
    Episodes
</a>
\
<a href="{{ route('courses.edit', [$course->id]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
    Edit
</a>
\
<form action="{{ route('courses.destroy', [$course->id]) }}" method="POST" class="d-inline delete_form">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete_button font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
        Delete
    </button>
</form>
\
<a href="{{ route('courses.show', [$course->id]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
    Detail
</a>