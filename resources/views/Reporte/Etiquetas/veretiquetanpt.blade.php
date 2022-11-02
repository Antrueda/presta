@extends('layouts.index')
@section('styles')


@endsection
@section('content')
  <div class="row" style="font-size: 35px;">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 style="text-align: center">Etiqueta Formulación</h1>
        </div>
        <div class="panel-body" style="text-align: justify;">
            <?php $tamaniox=20 ?>
          @include('Reporte.Etiquetas.etiquetanpt')
        </div>
      </div>
    </div>
  </div>
  @endsection
