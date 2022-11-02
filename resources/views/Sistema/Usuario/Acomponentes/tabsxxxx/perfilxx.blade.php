<div class="card card-outline card-secondary">
  <div class="card-body box-profile">
    <div class="text-center">
      <img class="profile-user-img img-fluid img-circle" src="{{ asset('adminlte/dist/img/avatar5.png') }} " alt="User profile picture">
    </div>
    <h3 class="profile-username text-center">
      {{ $todoxxxx['usuariox']->s_primer_nombre }}
      {{ $todoxxxx['usuariox']->s_segundo_nombre }}
      {{ $todoxxxx['usuariox']->s_primer_apellido }}
      {{ $todoxxxx['usuariox']->s_segundo_apellido }}</h3>

    <ul class="list-group list-group-unbordered mb-4">
      <li class="list-group-item">
        <b>TIPO DOCUMENTO</b>
        <a class="float-right">{{ $todoxxxx['usuariox']->nnaj_docu->tipoDocumento->nombre }}</a>
      </li>
      <li class="list-group-item">
        <b>DOCUMENTO</b>
        <a class="float-right">{{ $todoxxxx['usuariox']->nnaj_docu->s_documento }}</a>
      </li>
      <li class="list-group-item">
        <b>FECHA DE NACIMIENTO</b>
        <a class="float-right">{{ $todoxxxx['usuariox']->nnaj_nacimi->d_nacimiento }}</a>
      </li>
      <li class="list-group-item">
        <b></b>
        <a class="float-right">{{ $todoxxxx['usuariox']->nnaj_nacimi->Edad }} años</a>
      </li>
      <li class="list-group-item">
        <b>SEXO DE NACIMIENTO</b>
        <a class="float-right">{{ $todoxxxx['usuariox']->nnaj_sexo->prmSexo->nombre }}</a>
      </li>
      <li class="list-group-item">
        <b>DIRECCION</b>
        <a class="float-right">{{ count($todoxxxx['usuariox']->SisNnaj->FiResidencia)>0 ? $todoxxxx['usuariox']->SisNnaj->FiResidencia->where('sis_esta_id', 1)->sortByDesc('id')->first()->direccion : '' }}</a>
      </li>
      <li class="list-group-item">
        <b>TELEFONO</b>
        <a class="float-right">{{ count($todoxxxx['usuariox']->SisNnaj->FiResidencia)>0 ? $todoxxxx['usuariox']->SisNnaj->FiResidencia->where('sis_esta_id', 1)->sortByDesc('id')->first()->telefonos : '' }}</a>
      </li>
      <li class="list-group-item">
        <b>NOMBRE IDENTITARIO</b>
        <a class="float-right">{{ $todoxxxx['usuariox']->nnaj_sexo->s_nombre_identitario }}</a>
      </li>
      <li class="list-group-item">
        <b>TIPO DE POBLACION</b>
        <a class="float-right">{{ $todoxxxx['usuariox']->prmTipoPobla->nombre }}</a>
      </li>
    </ul>
  </div>
</div>
