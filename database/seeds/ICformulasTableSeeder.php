<?php

use App\Models\Formulaciones\Cformula;
use Illuminate\Database\Seeder;

class ICformulasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

  Cformula::create([
                'id' => 1,
                'paciente_id' => 4287,
                'tiempo' => 24.0,
                'velocidad' => 20.8,
                'volumen' => 500.0,
                'purga' => 12.0,
                'peso' => 80.0,
                'total' => 512.0,
                'sis_clinica_id' => 1,
                'crango_id' => NULL,
                'userevis_id' => NULL,
                'userprep_id' => NULL,
                'proceso_id' => NULL,
                'terminado_id' => NULL,
                'carbvali' => 'SEGURA',
                'concarbo' => 0.0,
                'concprov' => 'NO ESTABLE',
                'concprot' => 0.0,
                'conclipv' => 'ESTABLE',
                'conclipi' => 0.0,
                'osmolari' => 0.1,
                'osmolarv' => 'VIA PERIFÉRICA',
                'gramtota' => 0.0,
                'protnitr' => 0.0,
                'proteica' => 0.0,
                'caloprov' => 0.0,
                'caloprot' => 0.0,
                'calolipv' => 0.0,
                'calolipi' => 0.0,
                'calocarv' => 0.0,
                'calocarb' => 0.0,
                'calototv' => 0.0,
                'calotota' => 0.0,
                'caltotkg' => 0.0,
                'calcfosf' => 0.0,
                'calcfosv' => 'SEGURA',
                'pesoteor' => 1.31,
                'orden_id' => 1,
                'user_crea_id' => 1,
                'user_edita_id' => 1,
                'sis_esta_id' => 1,
                'created_at' => '2021-06-10 08:57:50',
                'updated_at' => '2021-06-10 08:57:50',
                ]);
                Cformula::create([
                'id' => 2,
                'paciente_id' => 4287,
                'tiempo' => 24.0,
                'velocidad' => 20.8,
                'volumen' => 500.0,
                'purga' => 12.0,
                'peso' => 80.0,
                'total' => 512.0,
                'sis_clinica_id' => 1,
                'crango_id' => NULL,
                'userevis_id' => NULL,
                'userprep_id' => NULL,
                'proceso_id' => NULL,
                'terminado_id' => NULL,
                'carbvali' => 'SEGURA',
                'concarbo' => 0.0,
                'concprov' => 'NO ESTABLE',
                'concprot' => 0.0,
                'conclipv' => 'ESTABLE',
                'conclipi' => 0.0,
                'osmolari' => 0.1,
                'osmolarv' => 'VIA PERIFÉRICA',
                'gramtota' => 0.0,
                'protnitr' => 0.0,
                'proteica' => 0.0,
                'caloprov' => 0.0,
                'caloprot' => 0.0,
                'calolipv' => 0.0,
                'calolipi' => 0.0,
                'calocarv' => 0.0,
                'calocarb' => 0.0,
                'calototv' => 0.0,
                'calotota' => 0.0,
                'caltotkg' => 0.0,
                'calcfosf' => 0.0,
                'calcfosv' => 'SEGURA',
                'pesoteor' => 1.31,
                'orden_id' => 1,
                'user_crea_id' => 1,
                'user_edita_id' => 1,
                'sis_esta_id' => 1,
                'created_at' => '2021-06-10 08:58:44',
                'updated_at' => '2021-06-10 08:58:44',
            
            ]);
        
        
    }
}