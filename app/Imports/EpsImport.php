<?php

namespace App\Imports;

use App\Models\Administracion\Ep;
use Maatwebsite\Excel\Concerns\ToModel;

class EpsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
$dataxxxx=[
            'nombre'=>$row[0], 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,
];
if($row[0]!=''){
 return new Ep($dataxxxx);
}

        
    }
}
