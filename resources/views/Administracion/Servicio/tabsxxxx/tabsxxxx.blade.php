<div class="card">
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['cservicio-leer', 'cservicio-crear', 'cservicio-editar', 'cservicio-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='cservicio') ?' active' : '' }} text-sm" href="{{ route('cservicio', $todoxxxx['padrexxx']) }}">Servicios</a></li>
      @endcanany
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($cservicio))
        {{ $cservicio }}
        @endif
      </div>
    </div>
  </div>
</div>