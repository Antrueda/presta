<?php
$actualxx = date('Y-m-d', time());
$fechregi = explode(' ', $queryxxx->created_at);
?>



<a class="nav-link dropdown-toggle btn btn-sm btn-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ACCIONES</a>
<div class="dropdown-menu">
    <a class="btn btn-sm btn-primary" href="{{ route('concilia.editar', $queryxxx->id) }}">Editar</a>
    <a class="btn btn-sm btn-primary" href="{{ route('concilia.ver', $queryxxx->id) }}">Ver</a>
    <a class="btn btn-sm btn-primary" href="{{ route('concilia.imprimir', $queryxxx->id) }}">Imprimir</a>
</div>