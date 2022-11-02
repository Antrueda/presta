  <div class="card text-left">
    <div class="card-header">
      <h1 style="text-align: center"><strong>{{ $todoxxxx["tituloxx"] }}</strong> </h1>
    </div>
    <div class="card-body">
      <h5 class="card-title"></h5>
      {!! Form::model($todoxxxx['modeloxx'],[$todoxxxx["routform"],'method'=>'PUT','id'=>"formulario"
      ,'enctype'=>"multipart/form-data"]) !!}
      @include('layouts.components.formulario.formular')
      {!! Form::close() !!}
    </div>
  </div>


