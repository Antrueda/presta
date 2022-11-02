<?php

use App\Models\Produccion\Proceso;
use Illuminate\Database\Seeder;

class IProcesosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
Proceso::create([
  
                'id' => 1,
                'coloraci' => 1,
                'ausepart' => 1,
                'ausefuga' => 1,
                'ausemise' => 1,
                'nopasaxx' => 1,
                'estaproc' => 1,
                'listermi' => 1,
                'user_crea_id' => 2,
                'user_edita_id' => 2,
                'sis_esta_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                ]);
        
        
    }
}