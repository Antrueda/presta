<?php

use App\Models\Administracion\Genero;
use Illuminate\Database\Seeder;

class GenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genero::create(['nombre'=>'MASCULINO','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Genero::create(['nombre'=>'FEMENINO','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Genero::create(['nombre'=>'OTRO','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
    }
}
