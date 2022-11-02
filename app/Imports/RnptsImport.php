<?php

namespace App\Imports;

use App\Models\Administracion\Rango\Rnpt;
use Maatwebsite\Excel\Concerns\ToModel;

class RnptsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {     
        return new Rnpt([
            'rango_id'=>$row[1],'npt_id'=>$row[2],
            'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,
        ]);
    }
}
