<?php

use App\Models\Remision;
use Illuminate\Database\Seeder;

class IRemisionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        Remision::create([
 
                'id' => 1,
                'clinica_id' => 1,
                'orden_id' => 1,
                'quimfarm_id' => 2,
                'user_crea_id' => 2,
                'user_edita_id' => 2,
                'sis_esta_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                ]);
        
        
    }
}