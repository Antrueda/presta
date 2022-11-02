<div class="card">
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['eps-leer', 'eps-crear', 'eps-editar', 'eps-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='eps') ?' active' : '' }} text-sm" href="{{ route('eps', $todoxxxx['padrexxx']) }}">EPS</a></li>
      @endcanany     
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($eps))
        {{ $eps }}
        @endif
      </div>
    </div>
  </div>
</div>