<div class="card">
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['excel-leer', 'excel-crear', 'excel-editar', 'excel-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='excel') ?' active' : '' }} 
        text-sm" href="{{ route('excel', $todoxxxx['padrexxx']) }}">Excel</a></li>
      @endcanany     
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($excel))
        {{ $excel }}
        @endif
      </div>
    </div>
  </div>
</div>