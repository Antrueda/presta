<div class="card card-outline card-secondary">
    <div class="card-header">
        {{$todoxxxx['tituhead']}}
    </div>
    <div class="card-header p-2">
        <ul class="nav nav-tabs">
            @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='controlpf') ?' active' : '' }}
        text-sm" href="{{ route('controlpf') }}">Controles en proceso y productos finalizados</a></li>
            @endcanany
            @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='orden') ?' active' : '' }}
        text-sm" href="{{ route('orden') }}">Órdenes de producción</a></li>
            @endcanany
        @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='alistami') ?' active' : '' }}
        text-sm" href="{{ route('alistami.reporte') }}">Alistamiento</a></li>
            @endcanany
            @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='controlt') ?' active' : '' }}
        text-sm" href="{{ route('controlt.reporte') }}">Etiquetas</a></li>
            @endcanany
            

        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
                {{ $crudxxxx }}  <!-- nombre que se le data en pestanias de la carpeta Acrud -->
            </div>
        </div>
    </div>
</div>
