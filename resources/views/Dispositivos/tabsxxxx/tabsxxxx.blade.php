<div class="card">
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
     @canany(['dmedico-leer', 'dmedico-crear', 'dmedico-editar', 'dmedico-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='dmedico') ?' active' : '' }} 
        text-sm" href="{{ route('dmedico.editar', $todoxxxx['padrexxx']) }}">Dispositivo Médico</a></li>
      @endcanany
      @canany(['dmarca-leer', 'dmarca-crear', 'dmarca-editar', 'dmarca-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='dmarca') ?' active' : '' }} 
        text-sm" href="{{ route('dmarca', $todoxxxx['padrexxx']) }}">Marcas</a></li>
      @endcanany
      @canany(['dlote-leer', 'dlote-crear', 'dlote-editar', 'dlote-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='dlote') ?' active' : '' }} 
        text-sm" href="{{ route('dlote', $todoxxxx['padrexxx']) }}">Lotes</a></li>
      @endcanany
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
      @if(isset($dmedico))
      {{ $dmedico }}
      @endif
      @if(isset($dmarca))
      {{ $dmarca }}
      @endif
      @if(isset($dlote))
      {{ $dlote }}
      @endif
      </div>
    </div>
  </div>
</div>