<?php

use App\Models\Dispensacione;
use Illuminate\Database\Seeder;

class IDispensacionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        Dispensacione::create([

                'id' => 1,
                'fechaxxx' => '2021-06-10',
                'opxxxxxx' => 1,
                'producto' => 'aaaaa',
                'user_crea_id' => 2,
                'user_edita_id' => 2,
                'sis_esta_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                ]);
        
        
    }
}