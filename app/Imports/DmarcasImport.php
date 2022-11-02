<?php

namespace App\Imports;

use App\Models\Dispositivos\Dmarca;
use Maatwebsite\Excel\Concerns\ToModel;

class DmarcasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dmarca([
            'reginvim'=>$row[3],  'sis_esta_id'=>1,'dmedico_id'=>$row[1],'marcaxxx'=>$row[2],'user_crea_id'=>1,'user_edita_id'=>1,
        ]);
    }
}
