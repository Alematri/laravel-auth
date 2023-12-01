<form
class="d-inline-block"
action="{{ $route }}"
method="POST"
onsubmit="return confirm('{{ $message }}')"
>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-outline-secondary"><i class="fa-solid fa-trash-can"></i></button>
</form>
