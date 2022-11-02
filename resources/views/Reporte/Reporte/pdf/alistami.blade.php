@foreach($datosxxx['formular'] as $formulax)
<table style=" width: 100%;" cellspacing='0' >
  <tr>
    <td style="width: 15%; text-align: left; height: 75px;border: 1px #000 solid " rowspan="2" >
      <img src="{{ url('img/Numixx_Nuevo_Logo.png') }}"   style="width: 135px; height: 76px;" alt="logo">
    </td>
    <td style=" width: 70%; text-align: center;border: 1px #000 solid  " colspan="2" rowspan="2">CONTROLES EN PROCESO Y PRODUCTO TERMINADO</td>

    <td style=" width: 15%; text-align: left; border: 1px #000 solid">CÓDIGO</td>
  </tr>
  <tr>
    <td style="  text-align: left; border: 1px #000 solid">PRO-FO-11-V1</td>
  </tr>

</table>
<table style=" width: 100%;"  cellspacing='0'>
  <tr >
    <td style="text-align: left;height: 30px;border: 1px #000 solid" >
      PRODUCTO
    </td>
    <td style=" text-align: left; text-align: center;border: 1px #000 solid" >
      NUTRICIÓN PARENTAL
    </td>
    <td style=" text-align: left;border: 1px #000 solid" >
      ORDEN DE PRODUCCIÓN
    </td>
    <td style=" text-align: left; text-align: center;border: 1px #000 solid" >
      {{$datosxxx['ordenxxx']->ordeprod}}
    </td>
    <td style=" text-align: left;border: 1px #000 solid"  >
      FECHA
    </td>
    <td style=" text-align: left;text-align: center;border: 1px #000 solid"  >
      {{$datosxxx['ordenxxx']->created_at}}
    </td>

  </tr>

</table>
<style>
  .verticalText {
    writing-mode: vertical-lr;
    transform: rotate(270deg);
  }
</style>

<table cellspacing='0' style=" width: 100%;">
  @foreach($formulax['pintarxx'] as $datoxxxx)
  @if($datoxxxx->rowspanx==2)
  <tr>
    <td rowspan="2" style="width: 24%;border: 1px #000 solid"  >{{$datoxxxx->itemxxxx}}</td>
    <td colspan="38" style="border: 1px #000 solid; text-align: center">LOTES:</td>
  </tr>
  <tr>
    @foreach($datoxxxx->validado as $validadx)
    <td style="width: 2%;border: 1px #000 solid; height: 50px" ><p class="{{$validadx['clasexxx']}}" >{{$validadx['valorxxx']}}</p></td>
    @endforeach
  </tr>
  @else
  <tr>
    <td colspan="{{$datoxxxx->colspanx}}" style="border: 1px #000 solid">{{$datoxxxx->itemxxxx}}</td>
    @if($datoxxxx->colspanx==0)
    @foreach($datoxxxx->validado as $validadx)
    <td style="width: 2%;border: 1px #000 solid;text-align: center"  >{{$validadx['valorxxx']}}</td>
    @endforeach
    @endif
  </tr>
  @endif

  @endforeach
</table>
<table style="width: 100%; padding-top: 25px;padding-bottom: 25px" cellspacing='0'>
  <tr>
    <td style="width: 24%"  ></td>
    <td style="width: 60%" >Preparado por:</td>
    <td style="border: 2px #000 solid;">FECHA</td>
    <td ></td>
  </tr>
  <tr>
    <td></td>
    <td  style="border-bottom: 2px #000 solid">Q.F {{$formulax['userprep']}}</td>

    <td style="border: 2px #000 solid;">{{explode(' ',$datosxxx['ordenxxx']->created_at)[0]}}</td>
    <td ></td>
  </tr>
  <tr>
    <td colspan="5" style="height: 20px"></td>
  </tr>
  <tr>
    <td ></td>
    <td >Liberado por:</td>
    <td style="border: 2px #000 solid;">FECHA</td>
    <td ></td>
  </tr>
  <tr>
    <td></td>
    <td style="border-bottom: 2px #000 solid;">Q.F {{$formulax['userlibe']}}</td>
    <td style="border: 2px #000 solid;"> {{explode(' ',$datosxxx['ordenxxx']->created_at)[0]}}</td>
    <td ></td>
  </tr>
</table>
<table style="width: 100%; padding-bottom: 1px" cellspacing='0'>
  <tr>
    <th style="width: 10%;height: 40px; border: 1px #000 solid"  >Observaciones</th>
    <td style=" border: 1px #000 solid">{{$datosxxx['ordenxxx']->observac}}</td>
  </tr>
</table>
@if($formulax['otrapagi']==1)
<div style="page-break-after:always;"></div>
@endif
@endforeach







