<a href="{{ route('instructors.edit', [$instructor->id]) }}" title="Edit" class="font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
    <i class="text-primary fas fa-edit text-lg"></i>
</a>
\
<form action="{{ route('instructors.destroy', [$instructor->id]) }}" title="Delete" method="POST" class="d-inline delete_form">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete_button text-danger font-weight-bold" data-toggle="tooltip" data-original-title="Delete user">
        <i class="fas fa-trash-alt text-lg"></i>
    </button>
</form>
\
<a href="{{ route('instructors.show', [$instructor->id]) }}" title="Details" class="font-weight-bold" data-toggle="tooltip" data-original-title="Edit user">
    <i class="text-info far fa-eye text-lg"></i>
</a>