<div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
     @canany(['medicamento-leer', 'medicamento-crear', 'medicamento-editar', 'medicamento-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='medicame') ?' active' : '' }}
        text-sm" href="{{ route('medicamento.editar', $todoxxxx['padrexxx']) }}">Medicamento</a></li>
      @endcanany
      @canany(['mmarca-leer', 'mmarca-crear', 'mmarca-editar', 'mmarca-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='mmarca') ?' active' : '' }}
        text-sm" href="{{ route('mmarca', $todoxxxx['padrexxx']) }}">Marcas</a></li>
      @endcanany
      @canany(['minvima-leer', 'minvima-crear', 'minvima-editar', 'minvima-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='minvima') ?' active' : '' }}
        text-sm" href="{{ route('minvima', $todoxxxx['padrexxx']) }}">Registros Invima</a></li>
      @endcanany
      @canany(['mlote-leer', 'mlote-crear', 'mlote-editar', 'mlote-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='mlote') ?' active' : '' }}
        text-sm" href="{{ route('mlote', $todoxxxx['padrexxx']) }}">Lotes</a></li>
      @endcanany
      @canany(['mnpt-leer', 'mnpt-crear', 'mnpt-editar', 'mnpt-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='mnpt') ?' active' : '' }}
        text-sm" href="{{ route('mnpt', $todoxxxx['padrexxx']) }}">Rango Formulación</a></li>
      @endcanany
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
      @if(isset($medicame))
      {{ $medicame }}
      @endif
      @if(isset($mmarca))
      {{ $mmarca }}
      @endif
      @if(isset($minvima))
      {{ $minvima }}
      @endif
      @if(isset($mlote))
      {{ $mlote }}
      @endif
      @if(isset($mnpt))
      {{ $mnpt }}
      @endif
      </div>
    </div>
  </div>
</div>
