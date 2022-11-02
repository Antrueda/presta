<?php

namespace App\Helpers\Produccion;

use App\Helpers\DatatableHelper;
use App\Models\Formulaciones\Cformula;
use App\Models\Produccion\Calistam;

class Produccion
{
    /**
     * lista las formulaciones para arevision
     *
     * @param [type] $request
     * @return void
     */
    public static function getPacientesCformula($request)
    {
        $paciente = Cformula::select([
            'cformulas.id', 'cformulas.tiempo', 'cformulas.velocidad', 'cformulas.volumen',
            'cformulas.purga', 'cformulas.peso', 'cformulas.total', 'cformulas.sis_esta_id',
            'sis_estas.s_estado', 'cformulas.paciente_id', 'cformulas.userevis_id','clinicas.clinica'
        ])
            ->join('sis_estas', 'cformulas.sis_esta_id', '=', 'sis_estas.id')
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->join('clinicas', 'sis_clinicas.clinica_id', '=', 'clinicas.id')
            ->where('cformulas.created_at', 'LIKE', date('Y-m-d',time()).'%')
            ->orderBy('cformulas.userevis_id', 'ASC')
            ->orderBy('cformulas.created_at', 'ASC');

        return DatatableHelper::getDtb($paciente, $request);
    }
    public static function getAlistamientos($request)
    {
        $paciente = Calistam::select([
            'calistams.id', 'calistams.producto', 'ordens.ordeprod', 'calistams.sis_esta_id',
            'sis_estas.s_estado', 'calistams.created_at'
        ])
            ->join('ordens', 'calistams.orden_id', '=', 'ordens.id')
            ->join('sis_estas', 'calistams.sis_esta_id', '=', 'sis_estas.id');

        return DatatableHelper::getDt($paciente, $request);
    }
    public static function getPacientesRevision($request)
    {
        $paciente = Cformula::select([
            'cformulas.id', 'cformulas.sis_esta_id',
            'sis_estas.s_estado',
            'clinicas.clinica', 'pacientes.nombres', 'pacientes.apellidos', 'pacientes.cedula',
            'cformulas.userevis_id'
        ])
            ->join('pacientes', 'cformulas.paciente_id', '=', 'pacientes.id')
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->join('clinicas', 'sis_clinicas.clinica_id', '=', 'clinicas.id')
            ->join('sis_estas', 'cformulas.sis_esta_id', '=', 'sis_estas.id')
            // ->where('cformulas.userevis_id', '!=', null)
            ->where('cformulas.sis_esta_id',  1)
            ->where('cformulas.created_at', 'LIKE', date('Y-m-d',time()).'%')
            ->orderBy('cformulas.created_at', 'ASC');
        return DatatableHelper::getDtb($paciente, $request);
    }
    public static function getPacientesPreparacion($request)
    {
        $paciente = Cformula::select([
            'cformulas.id', 'cformulas.sis_esta_id',
            'sis_estas.s_estado',
            'clinicas.clinica', 'pacientes.nombres', 'pacientes.apellidos', 'pacientes.cedula', 'cformulas.userprep_id'
        ])
            ->join('pacientes', 'cformulas.paciente_id', '=', 'pacientes.id')
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->join('clinicas', 'sis_clinicas.clinica_id', '=', 'clinicas.id')
            ->join('sis_estas', 'cformulas.sis_esta_id', '=', 'sis_estas.id')
            ->where('cformulas.userevis_id', '!=', null)
            ->where('cformulas.created_at', 'LIKE', date('Y-m-d',time()).'%')
            ->orderBy('cformulas.userprep_id', 'ASC')
            ->orderBy('cformulas.created_at', 'ASC');
        return DatatableHelper::getDtb($paciente, $request);
    }

    public static function getControles($request)
    {
        $paciente = Cformula::select([
            'cformulas.id', 'cformulas.sis_esta_id',
            'sis_estas.s_estado','cformulas.created_at',
            'clinicas.clinica', 'pacientes.nombres', 'pacientes.apellidos', 'pacientes.cedula',
            'cformulas.proceso_id'
        ])
            ->join('pacientes', 'cformulas.paciente_id', '=', 'pacientes.id')
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->join('clinicas', 'sis_clinicas.clinica_id', '=', 'clinicas.id')
            ->join('sis_estas', 'cformulas.sis_esta_id', '=', 'sis_estas.id')
            ->where('cformulas.created_at', 'LIKE', date('Y-m-d',time()).'%')
            ->where('cformulas.userprep_id', '!=', null)
            ->orderBy('cformulas.proceso_id', 'ASC')
            ->orderBy('cformulas.created_at', 'ASC');
        return DatatableHelper::getDtb($paciente, $request);
    }
    public static function getTerminados($request)
    {
        $paciente = Cformula::select([
            'cformulas.id', 'cformulas.sis_esta_id', 'cformulas.terminado_id',
            'sis_estas.s_estado','cformulas.created_at', 'pacientes.cedula',
            'clinicas.clinica', 'pacientes.nombres', 'pacientes.apellidos'
        ])
            ->join('pacientes', 'cformulas.paciente_id', '=', 'pacientes.id')
            ->join('procesos', 'cformulas.proceso_id', '=', 'procesos.id')
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->join('clinicas', 'sis_clinicas.clinica_id', '=', 'clinicas.id')
            ->join('sis_estas', 'cformulas.sis_esta_id', '=', 'sis_estas.id')
            ->where('cformulas.created_at', 'LIKE', date('Y-m-d',time()).'%')
            ->orderBy('cformulas.terminado_id', 'ASC')
            ->orderBy('cformulas.created_at', 'ASC');
        return DatatableHelper::getDtb($paciente, $request);
    }

    public static function getConciliaciones($request)
    {
        $paciente = Calistam::select([
            'calistams.id', 'calistams.producto', 'ordens.ordeprod', 'calistams.sis_esta_id',
            'sis_estas.s_estado', 'calistams.created_at'
        ])
            ->join('ordens', 'calistams.orden_id', '=', 'ordens.id')
            ->join('sis_estas', 'calistams.sis_esta_id', '=', 'sis_estas.id')
            ->where('calistams.id', $request->padrexxx);

        return DatatableHelper::getDt($paciente, $request);
    }



    public static function getConciliacionesTotal($request)
    {
        $paciente = Calistam::select([
            'calistams.id', 'calistams.producto', 'ordens.ordeprod', 'calistams.sis_esta_id',
            'sis_estas.s_estado', 'calistams.created_at'
        ])
            ->join('ordens', 'calistams.orden_id', '=', 'ordens.id')
            ->join('sis_estas', 'calistams.sis_esta_id', '=', 'sis_estas.id')
            ;

        return DatatableHelper::getDt($paciente, $request);
    }
}
