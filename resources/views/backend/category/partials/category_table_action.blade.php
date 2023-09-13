<a href="{{ route('categories.edit', [$category->id]) }}" title="Edit" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
    <i class="text-primary fas fa-edit text-lg"></i>
</a>
\
<form action="{{ route('categories.destroy', [$category->id]) }}" title="Delete" method="POST" class="d-inline delete_form">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-danger delete_button font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
        <i class="fas fa-trash-alt text-lg"></i>
    </button>
</form>