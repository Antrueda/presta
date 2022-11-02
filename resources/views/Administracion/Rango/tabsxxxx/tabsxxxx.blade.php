<div class="card">
  <div class="card-header">
    {{ $todoxxxx['cardhead'] }}
  </div>
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['rango-leer', 'rango-crear', 'rango-editar', 'rango-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='rango') ?' active' : '' }} text-sm" 
        href="{{ route('rango', $todoxxxx['padrexxx']) }}">Rango</a></li>
      @endcanany
      @canany(['rnpt-leer', 'rnpt-crear', 'rnpt-editar', 'rnpt-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='rnpt') ?' active' : '' }} text-sm" 
        href="{{ route('rnpt', $todoxxxx['padrexxx']) }}">NPTS</a></li>
      @endcanany
      @canany(['rcondici-leer', 'rcondici-crear', 'rcondici-editar', 'rcondici-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='rcondici') ?' active' : '' }} text-sm" 
        href="{{ route('rcondici', $todoxxxx['padrexxx']) }}">Condicones</a></li>
      @endcanany
      @canany(['rcodigo-leer', 'rcodigo-crear', 'rcodigo-editar', 'rcodigo-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='rcodigo') ?' active' : '' }} text-sm" 
        href="{{ route('rcodigo', $todoxxxx['padrexxx']) }}">Códigos Producto</a></li>
      @endcanany
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($rango))
        {{ $rango }}
        @endif
        @if(isset($rnpt))
        {{ $rnpt }}
        @endif
        @if(isset($rcondici))
        {{ $rcondici }}
        @endif
        @if(isset($rcodigo))
        {{ $rcodigo }}
        @endif
      </div>
    </div>
  </div>
</div>