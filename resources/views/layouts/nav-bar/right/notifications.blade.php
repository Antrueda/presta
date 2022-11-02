@canany([
'alerta-cliente', 'alerta-revisar', 'alerta-preparar', 'alerta-procesar', 'alerta-terminar',

])

<?php



$alertasx = Alertas::alertas();
?>
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell fa-2x fa-fw" style="padding-right: 60px;"></i>
        <span class="badge badge-danger navbar-badge" style="font-size: 20px;" id="campana">{{$alertasx['totalxxx']}}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header" id='totalnotifi'>{{$alertasx['notifica']}}</span>
        <div id='alertas'>

        </div>



        <div class="dropdown-divider"></div>
        <a href="{{route('alerta')}}" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
    </div>
</li>
@endcanany
