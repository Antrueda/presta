<?php

namespace App\Imports;

use App\Models\Medicamentos\Mmarca;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class MmarcasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mmarca([
            // 'id'=>$row[0],
            'nombcome'=>$row[3], 'osmorali'=>$row[4], 'pesoespe'=>$row[5], 'formfarm'=>$row[6], 'sis_esta_id'=>1, 'marcaxxx'=>$row[2], 
            'medicame_id'=>$row[1],'user_crea_id'=>Auth::user()->id,'user_edita_id'=>Auth::user()->id
        ]);
    }
}
