<?php
$clasexxx='warning';
$textoxxx='NO';
if($queryxxx->cobrsepa==1){
    $clasexxx='success';
    $textoxxx='SI';
}
?>
@if(Auth()->user()->can($requestx->routexxx[0] . '-editar'))
<a class="btn btn-sm btn-{{$clasexxx}} estadoxx" href="javascript:void(0)" id="cobrsepa_{{$queryxxx->id}}">{{$textoxxx}}</a>
@else
{{$textoxxx}}
@endif
