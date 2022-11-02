<?php

namespace App\Imports;

use App\Models\Clinica\SisClinica;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class SisClinicasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SisClinica([
            'nitxxxxx'=>$row[1], 'clinica'=>$row[0], 'telefono'=>$row[3], 'sis_esta_id'=>1, 'digiveri'=>$row[2], 
            'user_crea_id'=>1, 'user_edita_id'=>1,
        ]);
    }
}
