<div class="card">
  <div class="card-header p-2">
    <ul class="nav nav-pills">
      <li class="nav-item"><a class="nav-link active text-sm" href="#datosBasicos" data-toggle="tab">Datos Básicos</a></li>
      <li class="nav-item"><a class="nav-link text-sm" href="#dependencias" data-toggle="tab">Dependencias</a></li>
      <li class="nav-item"><a class="nav-link text-sm" href="#roles" data-toggle="tab">Roles</a></li>
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <div class="active tab-pane" id="datosBasicos">
        {{ $datosBasicos }}
      </div>
      <div class="tab-pane" id="dependencias">
        {{ $dependencias }}
      </div>
      <div class="tab-pane" id="roles">
        {{ $roles }}
      </div>
    </div>
  </div>
</div>