<?php

namespace App\Imports;
use App\Models\Administracion\Rango\Rcondici;
use Maatwebsite\Excel\Concerns\ToModel;
class RcondicisImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {     
        return new Rcondici([
            'rnpt_id'=>$row[1],'condicio_id'=>$row[2],
            'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,
        ]);
    }
}
