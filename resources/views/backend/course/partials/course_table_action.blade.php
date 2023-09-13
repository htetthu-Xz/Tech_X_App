<a href="{{ route('episodes.index', [$course->id]) }}" title="Episode" class="text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Episode index">
    <i class="fas fa-play-circle text-lg text-success"></i>
</a>
\
<a href="{{ route('courses.edit', [$course->id]) }}" title="Edit" class="text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
    <i class="text-primary fas fa-edit text-lg"></i>
</a>
\
<form action="{{ route('courses.destroy', [$course->id]) }}" title="Delete" method="POST" class="d-inline delete_form">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete_button font-weight-bold" data-toggle="tooltip" data-original-title="Delete user">
        <i class="fas fa-trash-alt text-danger text-lg"></i>
    </button>
</form>
\
<a href="{{ route('courses.show', [$course->id]) }}" title="Details" class="text-secondary font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
    <i class="text-info far fa-eye text-lg"></i>
</a>