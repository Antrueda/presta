<div class="card">
  
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['rangonpt-leer', 'rangonpt-crear', 'rangonpt-editar', 'rangonpt-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='rangonpt') ?' active' : '' }}
        text-sm" href="{{ route('rangonpt', $todoxxxx['parametr']) }}">RANGO NPT</a></li>
      @endcanany
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($rangonpt))
        {{ $rangonpt }}
        @endif
      </div>
    </div>
  </div>
</div>