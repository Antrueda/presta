<?php

namespace App\Traits;

use App\Helpers\Fechas;
use App\Models\Administracion\Rango;
use App\Models\Clinica\Clinica;
use App\Models\Clinica\Crango;
use App\Models\Clinica\SisClinica;
use App\Models\Formulaciones\Cformula;
use App\Models\Formulaciones\Orden;
use App\Models\Medicamentos\Medicame;
use App\Models\Pacientes\Paciente;
use App\Models\Remision;

trait ClinicaTrait
{
    use DatatableTrait;

    public function getListados($request)
    {
        $clinicas = Clinica::select(['clinicas.id', 'clinicas.clinica', 's_estado', 'clinicas.sis_esta_id'])
            ->join('sis_estas', 'clinicas.sis_esta_id', '=', 'sis_estas.id')
            ->where(function ($queryxxx) use ($request) {
                $clinicax = auth()->user()->sis_clinica->clinica_id;
                if ($clinicax != 1) {
                    $queryxxx->where('clinicas.id', $clinicax);
                }
            });
        return $this->getDatatable($clinicas, $request);
    }
    public function getSucursales($request)
    {
        $clinicas = SisClinica::select(['sis_clinicas.id', 'sucursal', 'nombre', 's_estado', 'sis_clinicas.sis_esta_id'])
            ->join('municipios', 'sis_clinicas.sis_esta_id', '=', 'municipios.id')
            ->join('sis_estas', 'sis_clinicas.sis_esta_id', '=', 'sis_estas.id')
            ->where(function ($queryxxx) use ($request) {
                $queryxxx->where('sis_clinicas.clinica_id', $request->padrexxx);
            });
        return $this->getDatatable($clinicas, $request);
    }

    public function getAsignados($request)
    {
        $paciente = Medicame::select(['medicame_sis_clinica.id', 'medicames.nombgene', 's_estado', 'medicame_sis_clinica.sis_esta_id', 'medicame_sis_clinica.cobrsepa'])
            ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')
            ->join('sis_estas', 'medicame_sis_clinica.sis_esta_id', '=', 'sis_estas.id')
            ->where('medicame_sis_clinica.sis_clinica_id', $request->padrexxx);
        return $this->getCobrsepas($paciente, $request);
    }

    public  function getMedicametos($request)
    {
        $clinicas = Medicame::select('medicames.id')
            ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')
            ->where('medicame_sis_clinica.sis_clinica_id', $request->padrexxx)
            ->get();
        $paciente = Medicame::select('medicames.id', 'medicames.nombgene', 's_estado', 'medicames.sis_esta_id')
            ->join('sis_estas', 'medicames.sis_esta_id', '=', 'sis_estas.id')
            ->whereNotIn('medicames.id', $clinicas)
            ->where('medicames.sis_esta_id', 1);

        return $this->getDatatable($paciente, $request);
    }

    public  function getRangosAsignados($request)
    {
        $paciente = Crango::select(
            'crangos.id',
            'rangos.ranginic',
            'rangos.rangfina',
            'condicios.condicio',
            'rcodigos.codiprod',
            'crangos.sis_clinica_id',
            's_estado',
            'crangos.sis_esta_id'
        )
            ->join('rcodigos', 'crangos.rcodigo_id', '=', 'rcodigos.id')
            ->join('rcondicis', 'rcodigos.rcondici_id', '=', 'rcondicis.id')
            ->join('condicios', 'rcondicis.condicio_id', '=', 'condicios.id')
            ->join('rnpts', 'rcondicis.rnpt_id', '=', 'rnpts.id')
            ->join('rangos', 'rnpts.rango_id', '=', 'rangos.id')
            ->join('sis_estas', 'crangos.sis_esta_id', '=', 'sis_estas.id')
            ->where('crangos.sis_clinica_id', $request->padrexxx);
        return $this->getDatatable($paciente, $request);
    }

    public  function getRangos($request)
    {

        $paciente = Rango::select(['rangos.id', 'rangos.ranginic', 'rangos.rangfina', 'rangos.sis_esta_id', 'sis_estas.s_estado'])
            ->join('sis_estas', 'rangos.sis_esta_id', '=', 'sis_estas.id')
            ->where('rangos.sis_esta_id', 1);

        return $this->getDatatable($paciente, $request);
    }
    public static function getAsignarMedicam($request)
    {
        return SisClinica::find($request->clinicax)->medicames()->attach(
            [$request->medicame => ['user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]]
        );
    }

    public  function getRemisiones($request)
    {

        $paciente = Remision::select(['remisions.id', 'ordens.ordeprod', 'ordens.observac', 'ordens.sis_esta_id', 'sis_estas.s_estado'])
            ->join('ordens', 'remisions.orden_id', '=', 'ordens.id')

            ->join('sis_estas', 'remisions.sis_esta_id', '=', 'sis_estas.id')
            ->where('remisions.clinica_id', $request->padrexxx);

        return $this->getDatatable($paciente, $request);
    }

    public function getPacientes($request)
    {
        $paciente = Paciente::select([
            'pacientes.id', 'pacientes.nombres', 'pacientes.apellidos', 'pacientes.sis_esta_id',
            'sis_estas.s_estado', 'pacientes.cedula', 'pacientes.sis_clinica_id'
        ])
            ->join('sis_clinicas', 'pacientes.sis_clinica_id', '=', 'sis_clinicas.id')
            ->join('sis_estas', 'pacientes.sis_esta_id', '=', 'sis_estas.id')
            ->where('pacientes.sis_clinica_id', $request->padrexxx);

        return $this->getDatatable($paciente, $request);
    }


    public function getPacientesCformula($request)
    {
        $paciente = Cformula::select([
            'cformulas.id', 'cformulas.tiempo', 'cformulas.velocidad', 'cformulas.volumen',
            'cformulas.purga', 'cformulas.peso', 'cformulas.total', 'cformulas.sis_esta_id', 'cformulas.sis_clinica_id',
            'sis_estas.s_estado', 'cformulas.paciente_id', 'cformulas.userevis_id', 'cformulas.created_at'
        ])
            ->join('sis_estas', 'cformulas.sis_esta_id', '=', 'sis_estas.id')
            ->where('cformulas.paciente_id', $request->padrexxx->id);

        return $this->getDatatableFecha($paciente, $request);
    }

    public  function getOrdenes($dataxxxx)
    {
        $respuest = ['' => 'SIN FORMULACIONES PARA HOY'];
        $hoyxxxxx = date('Y-m-d');
        $paciente = Orden::select(['ordens.id', 'ordens.ordeprod'])

            ->join('cformulas', 'ordens.id', '=', 'cformulas.orden_id')
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->where('cformulas.created_at', 'LIKE', $hoyxxxxx . '%')
            ->where('sis_clinicas.clinica_id', $dataxxxx['padrexxx'])
            ->where('cformulas.terminado_id', '!=', null)
            ->first();
        if (isset($paciente->id)) {
            $respuest = [$paciente->id => $paciente->ordeprod];
        }
        return $respuest;
    }
}
