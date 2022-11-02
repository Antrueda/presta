<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Conciliaciones(PDF)</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('img/favicon-96x96.png') }}">
  </head>
  <body>
    <style>
      .flotar{
        float: left;
      }
    </style>
    <div style="border: 1px #000 solid; width: 100%; height: 80px; ">
      <div class="flotar" style="width: 30%; border-right: 1px #000 solid">
        <img src="{{ url('img/logo4.fw.png') }}"   style="width: 235px; height: 76px; padding: 2px;">
      </div>
      <div class="flotar" style="width: 50%; text-align: center; padding-top: 20px;border-right: 1px #000 solid; height: 60px;">
        CONCILIACIÓN DE MATERIALES
      </div>
      <div class="flotar" style="width: 20%;text-align: center;">
        <div style=" padding: 10px 0px 10px 0px; border-bottom: 1px #000 solid">CÓDIGO</div>
        <div style=" padding: 10px 0px 10px 0px;">PRO-FO-12-V1</div>
      </div>
    </div>

    <div style=" width: 100%; padding-top: 10px ">
      <div class="flotar" style="width: 30%;text-align: center;">PRODUCTO</div>
      <div class="flotar" style="width: 25%;text-align: center; border-bottom: 1px #000 solid">{{$cabecera->producto}}</div>
      <div class="flotar" style="width: 10%;text-align: center;">FECHA</div>
      <div class="flotar" style="width: 10%;text-align: center; border-bottom: 1px #000 solid">{{explode(' ',$cabecera->created_at)[0]}}</div>
      <div class="flotar" style="width: 5%;text-align: center;">OP</div>
      <div class="flotar" style="width: 20%;text-align: center; border-bottom: 1px #000 solid">{{$cabecera->orden->ordeprod}}</div>
    </div>
    <div style=" width: 100%; padding-top: 40px ">
      <table style=" border: 1px #000 solid" border='1' cellspacing="0" >
        @include('Produccion.Conciliacion.formulario.pdf.cuerpoxx')
      </table>

    </div>
  </body>
</html>
