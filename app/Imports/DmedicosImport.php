<?php

namespace App\Imports;

use App\Models\Dispositivos\Dmedico;
use Maatwebsite\Excel\Concerns\ToModel;

class DmedicosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dmedico([
            'nombrexx'=>$row[1],
            'sis_esta_id'=>1,
            'user_crea_id'=>1,
            'user_edita_id'=>1,
        ]);
    }
}
