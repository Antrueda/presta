<?php

namespace App\Imports;

use App\Models\Administracion\Rango\Rcodigo;
use Maatwebsite\Excel\Concerns\ToModel;

class RcodigosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {     
        return new Rcodigo([
            'rcondici_id'=>$row[1],'codiprod'=>$row[2],
            'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,
        ]);
    }
}
