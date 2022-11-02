<?php

use App\Models\Administracion\Condicio;
use Illuminate\Database\Seeder;

class CondiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condicio::create(['consinli'=>3,'id' => 1, 'condicio' => 'S/ LIPIDOS', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>1,'id' => 2, 'condicio' => 'C/LIPIDOS', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>2,'id' => 3, 'condicio' => 'S/E**', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>2,'id' => 4, 'condicio' => 'C/S LIPIDOS', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>1,'id' => 5, 'condicio' => 'C/LIPIDOS CON OMEGA 3', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>1,'id' => 6, 'condicio' => 'C/LIPIDOS SMOFLIPID', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>3,'id' => 7, 'condicio' => 'S/LIPIDOS + AMIN AL 15%', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>1,'id' => 8, 'condicio' => 'C/LIPIDOS + AMIN AL 15%', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>2,'id' => 9, 'condicio' => 'C/S LIPIDOS + AMIN 15%', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>2,'id' => 10, 'condicio' => 'C/S SMOFLIPID', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>1,'id' => 11, 'condicio' => 'C/SMOFLIPID + AMIN AL 15%', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>2,'id' => 12, 'condicio' => 'C/S LIPIDOS OMEGA', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>2,'id' => 13, 'condicio' => 'C/S LIPIDOS OMEGA + AA AL 15%', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>1,'id' => 14, 'condicio' => 'C/LIPIDOS CENTRAL', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
        Condicio::create(['consinli'=>1,'id' => 15, 'condicio' => 'C/LIPIDOS CENTRAL REPETIDO', 'sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1]);
    }
}
