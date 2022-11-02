@extends('layouts.index')

@section('content')
	 @component('layouts.components.tablajquery.index', ['todoxxxx'=>$todoxxxx])
      @slot('tableName')
      tabla
      @endslot
      @slot('class')
      @endslot
      
    @endcomponent 
@endsection