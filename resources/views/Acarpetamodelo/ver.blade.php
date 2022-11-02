@extends('layouts.index')
@section('content')
<div class="card text-left">
  @include('reutilizar.titulocav')
  <div class="card-body">
    <h5 class="card-title"></h5>
    {!! Form::open([route($todoxxxx["routxxxx"].'.ver', $todoxxxx["parametr"]), 'method' => 'DELETE']) !!}
      @include('layouts.components.botones.botones')  
      @include($todoxxxx["rutacarp"].'formulario.formulario')
      @include('layouts.components.botones.botones') 
    {!! Form::close() !!}
  </div>
</div>
@endsection