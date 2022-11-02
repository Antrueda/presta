<?php
$actualxx = date('Y-m-d', time());
$fechregi = explode(' ', $queryxxx->created_at);
?>




@if($requestx->puededit)
    @if($actualxx==$fechregi[0])
        <a class="btn btn-sm btn-primary" href="{{ route('alistami.editar', [$queryxxx->id]) }}">Editar</a>
    @endif
@endif
    <a class="btn btn-sm btn-primary" href="{{ route('alistami.ver', [$queryxxx->id]) }}">Ver</a>
    <a class="btn btn-sm btn-primary" href="{{ route('concilia', [$queryxxx->id]) }}">Conciliación</a>
<a class="btn btn-sm btn-primary" href="{{ route('alistami.imprimir',$queryxxx->id) }}">Imprimir</a>