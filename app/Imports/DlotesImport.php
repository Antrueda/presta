<?php

namespace App\Imports;

use App\Models\Dispositivos\Dlote;
use Maatwebsite\Excel\Concerns\ToModel;

class DlotesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]);        
        return new Dlote([
            'fechvenc'=>$date->format('Y-m-d'),'dmarca_id'=>$row[1],'inventar'=>$row[2],'lotexxxx'=>$row[3], 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,
        ]);
    }
}
