<?php

use App\Models\Medicamentos\Npt;
use Illuminate\Database\Seeder;

class NptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Npt::create(['nombre'=>'PEDIÁTRICO','user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Npt::create(['nombre'=>'NEONATO','user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Npt::create(['nombre'=>'ADULTO','user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Npt::create(['nombre'=>'OTRO','user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    }
}
