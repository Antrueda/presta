<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Seleccione una opción
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @if(auth()->user()->can( $requestx->routexxx[0].'-editar'))
        @if($queryxxx->userevis_id==null)
        <div class="dropdown-item">
            <a class="btn btn-sm btn-warning " href="{{ route($requestx->routexxx[0].'.editar', $queryxxx->id) }}">Editar</a>
        </div>
        @endif
        @endif
        @if(auth()->user()->can( $requestx->routexxx[0].'-leer'))
        <div class="dropdown-item">
            <a class="btn btn-sm btn-primary " href="{{ route($requestx->routexxx[0].'.ver', $queryxxx->id) }}">Ver</a>
        </div>
        @endif
        @if(auth()->user()->can( $requestx->routexxx[0].'-borrar'))
        @if($queryxxx->userevis_id==null)
        <div class="dropdown-item">
            <a class="btn btn-sm btn-danger " href="{{ route($requestx->routexxx[0].'.borrar', $queryxxx->id) }}">Inactivar</a>
        </div>
        @endif
        @endif
        @if(auth()->user()->can( $requestx->routexxx[0].'-copiar'))
        @if($requestx->padrexxx->sis_esta_id==1)
        <div class="dropdown-item">
            <a class="btn btn-sm btn-warning" href="{{ route($requestx->routexxx[0].'.copiar', $queryxxx->id) }}">Copiar Formulación</a>
        </div>
        @endif
        @endif
    </div>
</div>
