<?php

namespace App\Imports;

use App\Models\Pacientes\Paciente;
use App\Models\Pacientes\Pacientec;
use Maatwebsite\Excel\Concerns\ToModel;

class PacientesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $nombrexx = explode(' ', $row[0]);
        $generoxx = 0;

        if (strtoupper($nombrexx[0]) == 'HIJO' || strtoupper($nombrexx[0]) == 'HIJA') {
            if (strtoupper($nombrexx[0]) == 'HIJO') {
                $generoxx = 1;
            } else {
                $generoxx = 2;
            }
        } else {
            $generoxx = 3;
        }
        $numeroxx=rand(1, 12);
        return new Pacientec([
            'registro' => date('Y-m-d', time()),
            'cedula' => ($row[2] == '') ? str_pad($numeroxx, ($numeroxx<10?12:11), "0", STR_PAD_RIGHT ) : $row[2], 
            'nombres' => $row[0],
            'apelldios' => $row[0],
            'peso' => ($row[4] == '') ? 0 : $row[4],
            'genero_id' => $generoxx,
            'ep_id' => 1,
            'cama' => ($row[8] == '') ? 0 : $row[8],
            'fechnaci' => ($row[3] == '') ? date('Y-m-d', time()) : $row[3],
            'departamento_id' => 14,
            'municipio_id' => 641,
            'npt_id' => 4,
            'servicio_id' => $row[9],
            'sis_clinica_id' => $row[1],
            'sis_esta_id' => 1,
            'user_crea_id' => 1,
            'user_edita_id' => 1,
            'observac' => ''
        ]);
    }
}
