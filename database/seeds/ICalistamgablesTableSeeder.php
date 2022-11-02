<?php

use App\Models\Produccion\Calistamgables;
use Illuminate\Database\Seeder;

class ICalistamgablesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        


           Calistamgables::create([
                'id' => 1,
                'calistam_id' => 1,
                'unidad' => 1.0,
                'cantcons' => 1.0,
                'diferenc' => NULL,
                'calistamgable_id' => 41,
                'calistamgable_type' => 'App\\Models\\Medicamentos\\Mlote',
                'user_crea_id' => 1,
                'user_edita_id' => 1,
                'sis_esta_id' => 1,
                'created_at' => '2021-06-10 08:59:28',
                'updated_at' => '2021-06-10 08:59:46',
                ]);
      
           Calistamgables::create([
                'id' => 2,
                'calistam_id' => 1,
                'unidad' => 1.0,
                'cantcons' => 1.0,
                'diferenc' => NULL,
                'calistamgable_id' => 38,
                'calistamgable_type' => 'App\\Models\\Dispositivos\\Dlote',
                'user_crea_id' => 1,
                'user_edita_id' => 1,
                'sis_esta_id' => 1,
                'created_at' => '2021-06-10 08:59:28',
                'updated_at' => '2021-06-10 08:59:46',
                ]);
        
        
    }
}