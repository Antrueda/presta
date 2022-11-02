<?php

use App\Models\Formulaciones\Dformula;
use Illuminate\Database\Seeder;

class IDformulasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

     Dformula::create([
      
                'id' => 1,
                'cformula_id' => 1,
                'medicame_id' => 1,
                'preparar' => NULL,
                'cantidad' => 1.0,
                'rtotal' => 1.0,
                'volumen' => 1.0,
                'purga' => 1.0,
                'user_crea_id' => 2,
                'user_edita_id' => 2,
                'sis_esta_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                ]);
        
        
    }
}