<div class="card card-outline card-secondary">
    <div class="card-header">
        {{$todoxxxx['tituhead']}}
    </div>
    <div class="card-header p-2">
        <ul class="nav nav-tabs">
            @if($todoxxxx['pestpadr']==1||$todoxxxx['pestpadr']==2||$todoxxxx['pestpadr']==3)
            @canany(['usuarios-leer', 'usuarios-crear', 'usuarios-editar', 'usuarios-borrar'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='usuarios') ?' active' : '' }} text-sm" href="{{ route('usuarios') }}">Usuarios</a></li>
            @endcanany
            @endif
            @if($todoxxxx['pestpadr']==2)

            @canany(['usuarios-leer', 'usuarios-crear', 'usuarios-editar', 'usuarios-borrar'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='usuarioc') ?' active' : '' }} text-sm" href="{{ route('usuarios.nuevo', $todoxxxx['parametr']) }}">Usuario</a></li>
            @endcanany

            @endif
            @if($todoxxxx['pestpadr']==3)

            @canany(['usuarios-leer', 'usuarios-crear', 'usuarios-editar', 'usuarios-borrar'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='usuarioe') ?' active' : '' }} text-sm" href="{{ route('usuarios.editar', $todoxxxx['parametr']) }}">Usuario</a></li>
            @endcanany
            @canany(['uroles-leer', 'uroles-crear', 'uroles-editar', 'uroles-borrar'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='uroles') ?' active' : '' }} text-sm" href="{{ route('uroles', $todoxxxx['parametr']) }}">Roles</a></li>
            @endcanany
            @canany(['usuarios-polidato'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='polidato') ?' active' : '' }} text-sm" href="{{ route('usuarios.polidato', $todoxxxx['parametr']) }}">Pol&iacute;tica De Datos</a></li>
            @endcanany
            @endif
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
                {{ $crudxxxx }} <!-- nombre que se le data en pestanias de la carpeta Acrud -->
            </div>
        </div>
    </div>
</div>
