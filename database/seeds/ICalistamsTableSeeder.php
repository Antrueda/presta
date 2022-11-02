<?php

use App\Models\Produccion\Calistam;
use Illuminate\Database\Seeder;

class ICalistamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        Calistam::create([
                'id' => 1,
                'producto' => 'NUTRICIÓN PARENTERAL',
                'orden_id' => 1,
                'concilia' => 0,
                'user_crea_id' => 1,
                'user_edita_id' => 1,
                'sis_esta_id' => 1,
                'created_at' => '2021-06-10 08:59:28',
                'updated_at' => '2021-06-10 08:59:28',
                ]);
        
        
    }
}