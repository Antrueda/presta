@if(auth()->user()->can( $requestx->routexxx[0].'-editarxx'))
<a class="btn btn-sm btn-warning" href="{{ route($requestx->routexxx[0].'.editarxx', [$queryxxx->id]) }}">Editar</a>
@endif
<a class="btn btn-sm btn-primary" href="{{ route($requestx->routexxx[0].'.verxxxxx', [$queryxxx->id]) }}">Ver</a>
@if($queryxxx->sis_esta_id==1)
@if(auth()->user()->can( $requestx->routexxx[0].'-borrarxx'))
<a class="btn btn-sm btn-danger " href="{{ route($requestx->routexxx[0].'.borrarxx', [$queryxxx->id]) }}">Inactivar</a>
@endif
@else
@if(auth()->user()->can( $requestx->routexxx[0].'-activarx'))
<a class="btn btn-sm btn-warning " href="{{ route($requestx->routexxx[0].'.activarx', [$queryxxx->id]) }}">Activar</a>
@endif
@endif
