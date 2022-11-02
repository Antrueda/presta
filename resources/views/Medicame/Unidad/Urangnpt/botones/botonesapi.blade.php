@if($requestx->puededit)
<a class="btn btn-sm btn-primary" href="{{ route('urnpt.editar', [$queryxxx->unidad_id,$queryxxx->id]) }}">Editar</a>
@endif
<a class="btn btn-sm btn-primary" href="{{ route('urnpt.ver', [$queryxxx->unidad_id,$queryxxx->id]) }}">Ver</a>

