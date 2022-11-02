<?php

namespace App\Imports;

use App\Models\Medicamentos\Minvima;
use Maatwebsite\Excel\Concerns\ToModel;

class MinvimasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Minvima([
            'reginvim'=>$row[1], 'mmarca_id'=>$row[0], 'sis_esta_id'=>1, 'user_crea_id'=>1, 'user_edita_id'=>1,
        ]);
    }
}
