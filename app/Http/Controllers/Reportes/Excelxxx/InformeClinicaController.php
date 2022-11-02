<?php

namespace App\Http\Controllers\Reportes\Excelxxx;

use App\Http\Controllers\Controller;
use App\Traits\Reportes\Excelxxx\CrudTrait;
use App\Traits\Reportes\Excelxxx\Infoclin\DataTablesTrait;
use App\Traits\Reportes\Excelxxx\Infoclin\ParametrizarTrait;
use App\Traits\Reportes\Excelxxx\Infoclin\VistasTrait;
use App\Traits\Reportes\Excelxxx\Infoclin\InformeClinicaTrait;
use App\Traits\Reportes\Excelxxx\ListadosTrait;
use App\Traits\Reportes\Excelxxx\PestaniasTrait;

class InformeClinicaController extends Controller
{
    use ParametrizarTrait; // trait donde se inicializan las opciones de configuracion
    use PestaniasTrait; // trit que construye las pestañas que va a tener el modulo con respectiva logica
    use ListadosTrait; // trait que arma las consultas para las datatables
    use CrudTrait; // trait donde se hace el crud de localidades

    use DataTablesTrait; // trait donde se arman las datatables que se van a utilizar
    use VistasTrait; // trait que arma la logica para lo metodos: crud
    use InformeClinicaTrait; // armar los métodos del controllador
    public function __construct()
    {
        $this->opciones['permisox'] = 'infoclin';
        $this->opciones['routxxxx'] = 'infoclin';
        $this->pestania[1][5] = 'active';
        $this->getOpciones();
        $this->middleware($this->getMware());
    }

}
