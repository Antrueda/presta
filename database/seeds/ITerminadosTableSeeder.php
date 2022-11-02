<?php

use App\Models\Produccion\Terminado;
use Illuminate\Database\Seeder;

class ITerminadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        Terminado::create([
       
                'id' => 1,
                'completo' => 1,
                'particul' => 1,
                'integrid' => 1,
                'contenid' => 1,
                'fugasxxx' => 1,
                'miscelas' => 1,
                'burbujas' => 1,
                'document' => 1,
                'teorico_' => 1.0,
                'realxxx_' => 1.0,
                'pesobols' => 1.0,
                'limitesx' => 1,
                'concepto' => 1,
                'estaterm' => 1,
                'nopasaxx' => 1,
                'user_crea_id' => 2,
                'user_edita_id' => 2,
                'sis_esta_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                ]);
        
        
    }
}