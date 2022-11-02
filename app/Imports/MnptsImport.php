<?php

namespace App\Imports;

use App\Models\Medicamentos\Mnpt;
use Maatwebsite\Excel\Concerns\ToModel;

class MnptsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Mnpt([
            'medicame_id' => $row[0],
            'npt_id' => $row[5],
            'sis_esta_id' => 1, 'randesde' => $row[2], 'ranhasta' => $row[3], 'rangunid' => $row[4], 'user_crea_id' => 1, 'user_edita_id' => 1,
        ]);
    }
}
