<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Seleccione una opci&oacute;n
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @if(auth()->user()->can( $requestx->routexxx[0].'-editar'))

        <div class="dropdown-item">
            <a class="btn btn-sm btn-warning " href="{{ route($requestx->routexxx[0].'.editar', $queryxxx->id) }}">Editar</a>
        </div>
        @endif
        @if(auth()->user()->can( $requestx->routexxx[0].'-leer'))
        <div class="dropdown-item">
            <a class="btn btn-sm btn-primary " href="{{ route($requestx->routexxx[0].'.ver', $queryxxx->id) }}">Ver</a>
        </div>
        @endif
        @if(auth()->user()->can( $requestx->routexxx[0].'-borrar'))
        <div class="dropdown-item">
            <a class="btn btn-sm btn-danger " href="{{ route($requestx->routexxx[0].'.borrar', $queryxxx->id) }}">Inactivar</a>
        </div>
        @endif
        @if(auth()->user()->can( $requestx->routexxx[1].'-leer'))
        @if($queryxxx->sis_esta_id==1)
        <div class="dropdown-item">
            <a class="btn btn-sm btn-warning" href="{{ route($requestx->routexxx[1], $queryxxx->id) }}">Formular</a>
        </div>
        @endif
        @endif
    </div>
</div>
