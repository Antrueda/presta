<?php

$tablaxxx='generalx';
if(isset($todoxxxx['rowscols'])){
    $tablaxxx=$todoxxxx['rowscols'];
}
?>

@foreach ($todoxxxx['tablasxx'] as $tablasxx)

  @component('layouts.components.tablajquery.'.$tablaxxx, ['todoxxxx'=>$tablasxx])
    @slot('tableName')
    {{$tablasxx['tablaxxx'] }}
    @endslot
    @slot('class')
    @endslot
  @endcomponent
@endforeach
