@extends('layouts.index')
@section('content')
<div class="card text-left">
  @include('reutilizar.titulocav')
  <div class="card-body">
    <h5 class="card-title"></h5>
  {!! Form::model($todoxxxx['modeloxx'],[route($todoxxxx["routxxxx"].'.editar', $todoxxxx["parametr"]),'method'=>'PUT']) !!}
    @include('layouts.components.botones.botones')  
    @include($todoxxxx["rutacarp"].'formulario.formulario')
    @include('layouts.components.botones.botones')  
  
  {!! Form::close() !!}
      </div>
</div>
@endsection
 @section('codigo')
@include($todoxxxx["rutacarp"].'formulario.js')
@endsection

