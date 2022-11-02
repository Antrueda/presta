<div class="card card-outline card-secondary">
    <div class="card-header">
        {{$todoxxxx['tituhead']}}
    </div>
    <div class="card-header p-2">
        <ul class="nav nav-tabs">
        @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='alistami') ?' active' : '' }}
        text-sm" href="{{ route('alistami.reporte') }}">Alistamiento de insumos</a></li>
            @endcanany
            @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='controlpf') ?' active' : '' }}
        text-sm" href="{{ route('controlpf') }}">Controles en procesos</a></li>
            @endcanany
            @canany(['ordprodu-leer','ordprodu-crear','ordprodu-editar','ordprodu-borrar'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='ordprodu') ?' active' : '' }}
        text-sm" href="{{ route('ordprodu') }}">Orden de producción</a></li>
            @endcanany
            @canany(['etiqueta-leer','etiqueta-imprimir'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='etiqueta') ?' active' : '' }}
            text-sm" href="{{ route('controlt.reporte') }}">Etiquetas</a></li>
            @endcanany
            @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cerliblo') ?' active' : '' }}
            text-sm" href="{{ route('cerliblo.reporte') }}">Certificado de Liberación de Lote</a></li>
            @endcanany
            @canany(['reportes-modulo'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='concilia') ?' active' : '' }}
            text-sm" href="{{ route('concilia.reporte') }}">Conciliación de Materiales</a></li>
            @endcanany
        </ul>

    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
            {{ $crudxxxx }}
            </div>
        </div>
    </div>
</div>
