<?php

namespace App\Http\Controllers\Reportes\Excelxxx;

use App\Http\Controllers\Controller;
use App\Traits\Reportes\Excelxxx\ListadosTrait;
use App\Traits\Reportes\Excelxxx\Modulo\DataTablesModuloTrait;
use App\Traits\Reportes\Excelxxx\Modulo\ParametrizarModuloTrait;
use App\Traits\Reportes\Excelxxx\Modulo\VistasModuloTrait;
use App\Traits\Reportes\Excelxxx\PestaniasTrait;

class ExcelModuloController extends Controller
{
    use ListadosTrait; // trait que arma las consultas para las datatables
    use ParametrizarModuloTrait; // trait donde se inicializan las opciones de configuracion
    use DataTablesModuloTrait; // trait donde se arman las datatables que se van a utilizar
    use VistasModuloTrait; // trait que arma la logica para lo metodos: crud
    use PestaniasTrait; // trit que construye las pestañas que va a tener el modulo con respectiva logica
    public function __construct()
    {
        $this->opciones['permmidd'] = 'excelxxx';
        $this->opciones['permisox'] = 'excelxxx';
        $this->opciones['routxxxx'] = 'excelxxx';
        $this->getOpciones();
        $this->middleware($this->getMware());
    }

    public function index()
    {
       $this->getPestanias([]);
        // ddd($this->opciones['pestania']);
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->getTablas($this->opciones)]);
    }
}
