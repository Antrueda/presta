<div class="card">
  <div class="card-header">
    {{ $todoxxxx['cardhead']}}
  </div>
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany([
      'alistami-leer', 'alistami-crear', 'alistami-editar', 'alistami-borrar',
      'concilia-leer', 'concilia-crear', 'concilia-editar', 'concilia-borrar'
      ])
      <li class="nav-item">
        <a class="nav-link {{$todoxxxx['pestania']['alisconc'][0]}}
        {{ $todoxxxx['pestania']['alisconc'][3]}} text-sm" href="
        {{ $todoxxxx['pestania']['alisconc'][1] }}">
          ALISTAMIENTOS
          <span class="fas fa-check text-{{$todoxxxx['pestania']['alisconc'][2]}}" aria-hidden="true"></span>
        </a>

      </li>
      @endcanany
      @canany([
      'revision-leer', 'revision-crear', 'revision-editar', 'revision-borrar',
      'preparac-leer', 'preparac-crear', 'preparac-editar', 'preparac-borrar',
      'controlp-leer', 'controlp-crear', 'controlp-editar', 'controlp-borrar',
      'controlt-leer', 'controlt-crear', 'controlt-editar', 'controlt-borrar'])
      <li class="nav-item">
        <a class="nav-link {{$todoxxxx['pestania']['producci'][0]}}
        {{ $todoxxxx['pestania']['producci'][3]}} text-sm" href="
        {{ $todoxxxx['pestania']['producci'][1] }}">
          PRODUCCI&Oacute;N
          <span class="fas fa-check text-{{$todoxxxx['pestania']['producci'][2]}}" aria-hidden="true"></span>
        </a>
      </li>
      @endcanany
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      @if($todoxxxx['pestania']['alisconc'][4])
      @include('Produccion.tabsxxxx.alistami')
      @endif
      @if($todoxxxx['pestania']['producci'][4])
      @include('Produccion.tabsxxxx.producci')
      @endif
    </div>
  </div>
</div>