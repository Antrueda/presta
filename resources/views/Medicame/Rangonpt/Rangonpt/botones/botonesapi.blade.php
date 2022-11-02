
@if($requestx->puededit)
<a class="btn btn-sm btn-primary" href="{{ route('rangonpt.editar', $queryxxx->id) }}">Editar</a>
@endif
<a class="btn btn-sm btn-primary" href="{{ route('rangonpt.ver', $queryxxx->id) }}">Ver</a>