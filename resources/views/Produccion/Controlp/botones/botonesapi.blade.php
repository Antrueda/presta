<?php
$actualxx=date('Y-m-d',time());
$fechregi=explode(' ',$queryxxx->created_at);
?>
@if($queryxxx->proceso_id!=0)
    @if($actualxx==$fechregi[0])
        <a class="btn btn-sm btn-primary" href="{{route('controlp.editar',$queryxxx->proceso_id) }}">Editar</a>
    @endif
    <a class="btn btn-sm btn-primary" href="{{route('controlp.ver',$queryxxx->proceso_id) }}">Ver</a>
@else
    <a class="btn btn-sm btn-primary" href="{{route('controlp.nuevo', $queryxxx->id) }}">Crear {{$queryxxx->proceso_id}}</a>
@endif



