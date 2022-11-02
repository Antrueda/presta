<?php



use Illuminate\Database\Seeder;

class IAlertasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('alertas')->delete();
        
        \DB::table('alertas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tipoaccion_id' => 2,
                'cformula_id' => 1,
                'leidaxxx' => 0,
                'routexxx' => '1',
                'user_crea_id' => 1,
                'user_edita_id' => 1,
                'sis_esta_id' => 1,
                'created_at' => '2021-06-10 08:57:50',
                'updated_at' => '2021-06-10 08:57:50',
            ),
            1 => 
            array (
                'id' => 2,
                'tipoaccion_id' => 2,
                'cformula_id' => 2,
                'leidaxxx' => 0,
                'routexxx' => '2',
                'user_crea_id' => 1,
                'user_edita_id' => 1,
                'sis_esta_id' => 1,
                'created_at' => '2021-06-10 08:58:44',
                'updated_at' => '2021-06-10 08:58:44',
            ),
        ));
        
        
    }
}