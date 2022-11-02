<?php

use App\Models\Medicamentos\Unidad\Unidad;
use Illuminate\Database\Seeder;

class UnidadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidad::create(['s_unidad' => 'mg Vit A/dia', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'UI Vit A/kg/dia', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'g/kg/día', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'mcg Zn++/kg/día', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'mcg/kg/dia', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'mcgZn/día', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'mEq/kg/día', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'mg / kg /min', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'mg/día', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'mg/Kg/día', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'ml', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'mL/día', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'mmol/día', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Unidad::create(['s_unidad' => 'mmol/Kg/día', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
    }
}
