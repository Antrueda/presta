<?php

namespace App\Imports;

use App\Models\Medicamentos\Medicame;
use Maatwebsite\Excel\Concerns\ToModel;

class MedicamesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Medicame([
            'nombgene' => $row[2],
            'concentr' => $row[3],
            'unidconc' => $row[4],
            'unidmedi' => $row[5],
            'casa_id' => $row[1],
            'sis_clinica_id' => 1,
            'sis_esta_id' => 1,
            'user_crea_id' => 1,
            'user_edita_id' => 1,
        ]);
    }
}
