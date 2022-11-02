<?php

namespace App\Helpers;

use App\Models\Administracion\Condicio;
use App\Models\Administracion\Rango;
use App\Models\Administracion\Servicio;
use App\Models\Clinica\Crango;
use App\Models\Clinica\MedicameSisClinica;
use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Medicame;
use App\Models\Pacientes\Paciente;
use Illuminate\Support\Facades\Auth;

class Clinicas
{
    public static function getClinicas($request)
    {
        $clinicas = SisClinica::select(['sis_clinicas.id', 'clinicas.clinica', 's_estado', 'sis_clinicas.sis_esta_id'])
            ->join('clinicas', 'sis_clinicas.clinica_id', '=', 'clinicas.id')
            ->join('sis_estas', 'sis_clinicas.sis_esta_id', '=', 'sis_estas.id')
            ->where(function ($queryxxx) use ($request) {
                if ($request->padrexxx != 1) {
                    $queryxxx->where('sis_clinicas.id', $request->padrexxx);
                }
            });
        return DatatableHelper::getDt($clinicas, $request);
    }

    public static function asignarMedicam($request)
    {
        return SisClinica::find($request->clinicax)->medicames()->attach(
            [$request->medicame => ['user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]]
        );
    }

    public static function getMedicametos($request)
    {
        $notinxxx = [];
        $clinicas = Medicame::select('medicames.id')
            ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')
            ->where('medicame_sis_clinica.sis_clinica_id', $request->clinicax)
            ->get();
        foreach ($clinicas as $clinicax) {
            $notinxxx[] = $clinicax->id;
        }

        $paciente = Medicame::select('medicames.id', 'medicames.nombgene', 's_estado', 'medicames.sis_esta_id')
            ->join('sis_estas', 'medicames.sis_esta_id', '=', 'sis_estas.id')
            ->whereNotIn('medicames.id', $notinxxx)
            ->where('medicames.sis_esta_id', 1);

        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function getMedicamentosAsignados($request)
    {
        $paciente = Medicame::select(['medicame_sis_clinica.id', 'medicames.nombgene', 's_estado', 'medicame_sis_clinica.sis_esta_id'])
            ->join('medicame_sis_clinica', 'medicames.id', '=', 'medicame_sis_clinica.medicame_id')
            ->join('sis_estas', 'medicame_sis_clinica.sis_esta_id', '=', 'sis_estas.id')
            ->where('medicame_sis_clinica.sis_clinica_id', $request->clinicax);
        return DatatableHelper::getDt($paciente, $request);
    }

    public static function getPacientesAsignados($request)
    {
        $paciente = Paciente::select(
            'pacientes.id',
            'pacientes.nombres',
            'pacientes.apellidos',
            's_estado',
            'pacientes.sis_esta_id'
        )
            ->join('paciente_sis_clinica', 'pacientes.id', '=', 'paciente_sis_clinica.paciente_id')
            ->join('sis_estas', 'pacientes.sis_esta_id', '=', 'sis_estas.id')
            ->where('paciente_sis_clinica.sis_clinica_id', $request->clinicax);
        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getPacientes($request)
    {
        $notinxxx = [];
        $paciente = Paciente::select('pacientes.id')
            ->join('paciente_sis_clinica', 'pacientes.id', '=', 'paciente_sis_clinica.paciente_id')
            ->where('paciente_sis_clinica.sis_clinica_id', $request->clinicax)->get();

        foreach ($paciente as $pacientx) {
            $notinxxx[] = $pacientx->id;
        }

        $paciente = Paciente::select('pacientes.id', 'pacientes.nombres', 'pacientes.apellidos', 's_estado', 'pacientes.sis_esta_id')
            ->join('sis_estas', 'pacientes.sis_esta_id', '=', 'sis_estas.id')
            ->whereNotIn('pacientes.id', $notinxxx)
            ->where('pacientes.sis_esta_id', 1);

        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function asignarPaciente($request)
    {

        return SisClinica::find($request->clinicax)->pacientes()->attach(
            [$request->paciente => ['user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]]
        );
    }



    public static function getRangosAsignados($request)
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
            ->where('crangos.sis_clinica_id', $request->clinicax);
        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getRangos($request)
    {

        $paciente = Rango::select(['rangos.id', 'rangos.ranginic', 'rangos.rangfina', 'rangos.sis_esta_id', 'sis_estas.s_estado'])
            ->join('sis_estas', 'rangos.sis_esta_id', '=', 'sis_estas.id')
            ->where('rangos.sis_esta_id', 1);

        return DatatableHelper::getDatatable($paciente, $request);
    }
    public static function asignarRango($request)
    {
        return SisClinica::find($request->clinicax)->rangos()->attach(
            [$request->rangoxxx => ['user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]]
        );
    }

    public static function getServicios($request)
    {
        $paciente = Servicio::select(
            'servicios.id',
            'servicios.servicio',
            's_estado',
            'servicios.sis_esta_id'
        )
            ->join('sis_estas', 'servicios.sis_esta_id', '=', 'sis_estas.id');
        return DatatableHelper::getDatatable($paciente, $request);
    }

    public static function getCondicio($request)
    {
        return response()->json(Condicio::combo([
            'cabecera' => false, 'ajaxxxxx' => true,
            'clinicax' => $request->clinicax, 'rango_id' => $request->crangoxx, 'condicio' => 0
        ]));
    }

    public static function getInactivarMedicam($request)
    {
        $registrx = explode('_', $request->registro);
        $dataxxxx = [];
        $registro = MedicameSisClinica::where('id', $registrx[1])->first();
        switch ($registrx[0]) {
            case 'estadoxx':
                $dataxxxx = ['sis_esta_id' => ($registro->sis_esta_id == 1) ? 2 : 1, 'user_edita_id' => Auth::user()->id];
                break;
            case 'cobrsepa':

                $dataxxxx = ['cobrsepa' => ($registro->cobrsepa == 1) ? 2 : 1, 'user_edita_id' => Auth::user()->id];
                break;
        }
        $registro->update($dataxxxx);
        return [];
    }
}
