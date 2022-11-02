<?php

use App\Models\Produccion\ProPreplibe;
use Illuminate\Database\Seeder;

class IProPreplibesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

     ProPreplibe::create([
                'id' => 1,
                'userevis_id' => 2,
                'userprep_id' => 2,
                'user_crea_id' => 2,
                'user_edita_id' => 2,
                'sis_esta_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                ]);
        
        
    }
}