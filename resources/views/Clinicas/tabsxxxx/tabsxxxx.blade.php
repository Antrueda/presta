<div class="card">
    <div class="card-header">
        {{$todoxxxx['cardhead']}}
    </div>
    <div class="card-body">

        <ul class="nav nav-tabs" role="tablist">
            @if($todoxxxx['pestpadr']==1 || $todoxxxx['pestpadr']==2 || $todoxxxx['pestpadr']==3|| $todoxxxx['pestpadr']==4)
            @canany(['clinicax-leer', 'clinicax-crear', 'clinicax-editar', 'clinicax-borrar'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxy']=='clinicax') ?' active' : '' }}
        text-sm" href="{{ route('clinicax') }}">Clínica</a></li>
            @endcanany
            @if($todoxxxx['pestpadr']==3|| $todoxxxx['pestpadr']==4)
            @canany(['paciente-leer', 'paciente-crear', 'paciente-editar', 'paciente-borrar'])
            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxy']=='paciente') ?' active' : '' }}
        text-sm" href="{{ route('paciente', $todoxxxx['parapest'][0]) }}">Paciente</a></li>
            @endcanany
            @endif
            @endif


        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="card">
                @include($todoxxxx['tabsxxxx'])
            </div>
        </div>
    </div>
</div>
