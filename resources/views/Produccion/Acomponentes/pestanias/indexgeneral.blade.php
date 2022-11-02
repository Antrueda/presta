@foreach ($todoxxxx['tablasxx'] as $tablasxx)

  @component('layouts.components.tablajquery.rowspancolspan', ['todoxxxx'=>$tablasxx])
    @slot('tableName')
    {{$tablasxx['tablaxxx'] }}
    @endslot
    @slot('class')
    @endslot
  @endcomponent
@endforeach
