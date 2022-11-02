@foreach ($todoxxxx['tablasxx'] as $tablasxx)
  @component('layouts.components.tablajquery.generalx', ['todoxxxx'=>$tablasxx])
    @slot('tableName')
    {{$tablasxx['tablaxxx'] }}
    @endslot
    @slot('class')
    @endslot 
  @endcomponent
@endforeach