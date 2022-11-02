<?php

namespace App\Imports;

use App\Models\Medicamentos\Mlote;
use Maatwebsite\Excel\Concerns\ToModel;

class MlotesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1]);  
        return new Mlote([
            'fechvenc'=>$date->format('Y-m-d'), 'minvima_id'=>$row[0], 'inventar'=>$row[2], 'lotexxxx'=>$row[3], 'sis_esta_id'=>1, 'user_crea_id'=>1, 'user_edita_id'=>1,
        ]);
    }
}
