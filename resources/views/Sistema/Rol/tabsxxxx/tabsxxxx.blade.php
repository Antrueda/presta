<div class="card">
  <div class="card-header">
    {{ $todoxxxx['cardhead'] }}
  </div>
  <div class="card-header p-2">
    <ul class="nav nav-tabs">
      @canany(['roles-leer', 'roles-crear', 'roles-editar', 'roles-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='roles') ?' active' : '' }} text-sm" 
        href="{{ route('roles.editar', $todoxxxx['parametr']) }}">Roles</a></li>
      @endcanany
      @canany(['rpermiso-leer', 'rpermiso-crear', 'rpermiso-editar', 'rpermiso-borrar'])
      <li class="nav-item"><a class="nav-link{{ ($todoxxxx['slotxxxx']=='rpermiso') ?' active' : '' }} text-sm" 
        href="{{ route('rpermiso', $todoxxxx['parametr']) }}">Permisos</a></li>
      @endcanany
      
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="tab-pane active" id="{{ $todoxxxx['slotxxxx'] }}">
        @if(isset($roles))
          {{ $roles }}
        @endif
        @if(isset($rpermiso))
          {{ $rpermiso }}
        @endif
       
      </div>
    </div>
  </div>
</div>