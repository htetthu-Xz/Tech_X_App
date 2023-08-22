<a href="{{ route('episodes.edit', [$episode->Course->id, $episode->id]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
    Edit
</a>
\
<form action="{{ route('episodes.destroy', [$episode->Course->id, $episode->id]) }}" method="POST" class="d-inline delete_form">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete_button font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
        Delete
    </button>
</form>
\
<a href="{{ route('episodes.show', [$episode->Course->id, $episode->id]) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
    Detail
</a>