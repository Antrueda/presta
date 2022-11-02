<?php
$actualxx = date('Y-m-d', time());
$fechregi = explode(' ', $queryxxx->created_at);
?>
@if($queryxxx->terminado_id)
    @if($actualxx==$fechregi[0])
        <a class="btn btn-sm btn-primary" href="{{route('controlt.editar', $queryxxx->terminado_id)}}">Editar</a>
    @endif
    <a class="btn btn-sm btn-primary" href="{{route('controlt.ver', $queryxxx->terminado_id)}}">Ver</a>
    <a class="btn btn-sm btn-primary " href="{{ route('reporpdf.etiquetanpt', $queryxxx->terminado_id) }}">Etiqueta</a>
@else
    <a class="btn btn-sm btn-primary" href="{{route('controlt.nuevo', $queryxxx->id) }}">Crear</a>
@endif