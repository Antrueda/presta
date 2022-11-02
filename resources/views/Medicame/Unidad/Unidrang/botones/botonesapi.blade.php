
@if($requestx->puededit)
<a class="btn btn-sm btn-primary" href="{{ route('urango.editar', [$queryxxx->unidad_id,$queryxxx->id]) }}">Editar</a>
@endif
<a class="btn btn-sm btn-primary" href="{{ route('urango.ver', [$queryxxx->unidad_id,$queryxxx->id]) }}">Ver</a>
@if($requestx->puedasig)
<a class="btn btn-sm btn-primary" href="{{ route('urnpt', $queryxxx->id) }}">Asingar NPT</a>
@endif
