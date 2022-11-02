
@if($requestx->puededit)
<a class="btn btn-sm btn-primary" href="{{ route('unidad.editar', $queryxxx->id) }}">Editar</a>
@endif
<a class="btn btn-sm btn-primary" href="{{ route('unidad.ver', $queryxxx->id) }}">Ver</a>
@if($requestx->puedasig)
<a class="btn btn-sm btn-primary" href="{{ route('urango', $queryxxx->id) }}">Asignar Rangos</a>
@endif