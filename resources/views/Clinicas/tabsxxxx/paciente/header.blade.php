<div class="card-header">
    {{$todoxxxx['cardheap']}}
</div>
<div class="card-body">

    <ul class="nav nav-tabs" role="tablist">
        @if($todoxxxx['pestpadr']==1)
        @canany(['clinicax-leer', 'clinicax-crear', 'clinicax-editar', 'clinicax-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='clinicax') ?' active' : '' }}
        text-sm" href="{{ route('clinicax') }}">Clínicas</a></li>
        @endcanany
        @endif

        @if($todoxxxx['pestpadr']==2)
        @canany(['clinicax-leer', 'clinicax-crear', 'clinicax-editar', 'clinicax-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='clinicax') ?' active' : '' }}
        text-sm" href="{{ route('clinicax') }}">Clínicas</a></li>
        @endcanany
        @canany(['sisclini-leer', 'sisclini-crear', 'sisclini-editar', 'sisclini-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='sisclini') ?' active' : '' }}
        text-sm" href="{{ route('sisclini', $todoxxxx['parametr']) }}">Sucursales</a></li>
        @endcanany
        @canany(['cremision-leer', 'cremision-crear', 'cremision-editar', 'cremision-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cremision') ?' active' : '' }}
        text-sm" href="{{ route('cremision', $todoxxxx['sucursal']) }}">Remisiones</a></li>
        @endcanany
        @endif




        @if($todoxxxx['pestpadr']==3)
        @canany(['paciente-leer', 'paciente-crear', 'paciente-editar', 'paciente-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='paciente') ?' active' : '' }}
        text-sm" href="{{ route('paciente', $todoxxxx['parapest'][0]) }}">Pacientes</a></li>
        @endcanany

        @endif

        @if($todoxxxx['pestpadr']==4)
        @canany(['paciente-leer', 'paciente-crear', 'paciente-editar', 'paciente-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='paciente') ?' active' : '' }}
        text-sm" href="{{ route('paciente', $todoxxxx['parapest'][0]) }}">Paciente</a></li>
        @endcanany
        @canany(['formular-leer', 'formular-crear', 'formular-editar', 'formular-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='formular') ?' active' : '' }}
        text-sm" href="{{ route('formular', $todoxxxx['parapest'][1]) }}">Formulaciones</a></li>
        @endcanany

        @endif
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">

                    @if(isset($formular))
                    {{ $formular }}
                    @endif
                    @if(isset($paciente))
                    {{ $paciente }}
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
