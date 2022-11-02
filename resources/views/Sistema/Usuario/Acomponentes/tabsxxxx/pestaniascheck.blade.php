@canany([$permisox.'-leer', $permisox.'-crear', $permisox.'-editar'])
<li class="nav-item" readonly><a class="nav-link{{ ($todoxxxx['slotxxxx']==$permisox) ?' active' : '' }}
        text-sm" href="{{ route($checkxxx==0?$permisox.'.nuevo':$permisox.'.editar', $todoxxxx['parametr']) }}">
        {{$pestania}}
        @if($checkxxx==0)
        <span class="fas fa-times text-danger" aria-hidden="true"></span>
        @else
        <span class="fas fa-check text-success" aria-hidden="true"></span>
        @endif
    </a></li>
@endcanany
