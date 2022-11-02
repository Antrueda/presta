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
        @endif




        @if($todoxxxx['pestpadr']==3)
        @canany(['clinicax-leer', 'clinicax-crear', 'clinicax-editar', 'clinicax-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='clinicax') ?' active' : '' }}
        text-sm" href="{{ route('clinicax') }}">Clínicas</a></li>
        @endcanany
        @canany(['sisclini-leer', 'sisclini-crear', 'sisclini-editar', 'sisclini-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='sisclini') ?' active' : '' }}
        text-sm" href="{{ route('sisclini', $todoxxxx['parapest'][0]) }}">Sucursales</a></li>
        @endcanany
        @canany(['cmedicame-leer', 'cmedicame-crear', 'cmedicame-editar', 'cmedicame-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cmedicame') ?' active' : '' }}
        text-sm" href="{{ route('cmedicame', $todoxxxx['sucursal']) }}">Medicamentos</a></li>
        @endcanany
        @canany(['crango-leer', 'crango-crear', 'crango-editar', 'crango-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='crango') ?' active' : '' }}
        text-sm" href="{{ route('crango', $todoxxxx['sucursal']) }}">Rangos</a></li>
        @endcanany
        @canany(['cremision-leer', 'cremision-crear', 'cremision-editar', 'cremision-borrar'])
        <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cremision') ?' active' : '' }}
        text-sm" href="{{ route('cremision', $todoxxxx['sucursal']) }}">Remisiones</a></li>
        @endcanany
        @endif
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">

                    <div class="card-header">
                        {{$todoxxxx['cardheap']}}
                    </div>
                    <div class="card-body">

                        <ul class="nav nav-tabs" role="tablist">
                            @if($todoxxxx['pestpadr']==3)
                            @canany(['crango-leer', 'crango-crear', 'crango-editar', 'crango-borrar'])
                            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='crango') ?' active' : '' }}
        text-sm" href="{{ route('crango', $todoxxxx['sucursal']) }}">Rangos</a></li>
                            @endcanany
                            @canany(['cremision-leer', 'cremision-crear', 'cremision-editar', 'cremision-borrar'])
                            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cremision') ?' active' : '' }}
        text-sm" href="{{ route('cremision', $todoxxxx['sucursal']) }}">Medicamentos Rango</a></li>
                            @endcanany
                            @canany(['cremision-leer', 'cremision-crear', 'cremision-editar', 'cremision-borrar'])
                            <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cremision') ?' active' : '' }}
        text-sm" href="{{ route('cremision', $todoxxxx['sucursal']) }}">Medicamentos Excluidos</a></li>
                            @endcanany
                            @endif
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
                                        @if(isset($crango))
                                        {{ $crango }}
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
