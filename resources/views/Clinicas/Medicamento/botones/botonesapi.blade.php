<?php
$clasexxx='danger';
$textoxxx='Inactivar';
if($queryxxx->sis_esta_id==2){
    $clasexxx='success';
    $textoxxx='Activar';
}
?>
@if(Auth()->user()->can($requestx->routexxx[0] . '-editar'))
<a class="btn btn-sm btn-{{$clasexxx}} estadoxx" href="javascript:void(0)" id="estadoxx_{{$queryxxx->id}}">{{$textoxxx}}</a>
@endif
