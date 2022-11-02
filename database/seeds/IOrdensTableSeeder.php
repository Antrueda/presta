<?php

use App\Models\Formulaciones\Orden;
use Illuminate\Database\Seeder;

class IOrdensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

         Orden::create([

                'id' => 1,
                'ordeprod' => '100621',
                'observac' => NULL,
                'user_crea_id' => 1,
                'user_edita_id' => 1,
                'sis_esta_id' => 1,
                'created_at' => '2021-06-10 08:57:50',
                'updated_at' => '2021-06-10 08:57:50',
                ]);
        
        
    }
}