<?php

namespace App\Imports;

use App\Models\Administracion\Rango;
use Maatwebsite\Excel\Concerns\ToModel;

class RangosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {     
        return new Rango([
            'ranginic'=>$row[1],'rangfina'=>$row[2],
            'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,
        ]);
    }
}
