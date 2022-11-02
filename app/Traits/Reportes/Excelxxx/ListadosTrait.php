<?php

namespace App\Traits\Reportes\Excelxxx;

use App\Models\Sistema\SisDepartam;
use App\Models\Sistema\SisMunicipio;
use App\Models\Sistema\SisPai;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;


/**
 * Este trait permite armar las consultas para ubicacion que arman las datatable
 */
trait ListadosTrait
{
    use DatatableTrait;

    /**
     * encontrar listar paises
     */


    public function listaPaises(Request $request)
    {

        if ($request->ajax()) {
            $request->routexxx = [$this->opciones['routxxxx'], 'departam'];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.Botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            $dataxxxx =  SisPai::select(['sis_pais.id', 'sis_pais.s_pais', 'sis_pais.sis_esta_id', 'sis_estas.s_estado'])
                ->join('sis_estas', 'sis_pais.sis_esta_id', '=', 'sis_estas.id');
            return $this->getDt($dataxxxx, $request);
        }
    }

    public function listaDepartamentos(Request $request)
    {

        if ($request->ajax()) {
            $request->routexxx = [$this->opciones['routxxxx'], 'municipi'];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.Botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            $dataxxxx =  SisDepartam::select(['sis_departams.id', 'sis_departams.s_departamento', 'sis_departams.sis_esta_id', 'sis_estas.s_estado'])
                ->join('sis_estas', 'sis_departams.sis_esta_id', '=', 'sis_estas.id');
            return $this->getDt($dataxxxx, $request);
        }
    }

    public function listaMunicipios(Request $request)
    {

        if ($request->ajax()) {
            $request->routexxx = [$this->opciones['routxxxx'], 'comboxxx'];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.Botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            $dataxxxx =  SisMunicipio::select(['sis_municipios.id', 'sis_municipios.s_municipio', 'sis_municipios.sis_esta_id', 'sis_estas.s_estado'])
                ->join('sis_estas', 'sis_municipios.sis_esta_id', '=', 'sis_estas.id');
            return $this->getDt($dataxxxx, $request);
        }
    }
}
