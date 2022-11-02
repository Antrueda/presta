<?php

use App\Models\Dispositivos\Dmarca;
use Illuminate\Database\Seeder;

class DmarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcaxxx=[
            [ 'reginvim'=>'2009DM-0004987', 'marcaxxx'=>'BD', 'dmedico_id'=>'1', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:38', 'updated_at'=>'2020-06-08 12:52:38', ],
            [ 'reginvim'=>'2018DM-0017986', 'marcaxxx'=>'BD', 'dmedico_id'=>'2', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:38', 'updated_at'=>'2020-06-08 12:52:38', ],
            [ 'reginvim'=>'2008M-011909-R1', 'marcaxxx'=>'TECNOFAR TQ S.A.S', 'dmedico_id'=>'3', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:38', 'updated_at'=>'2020-06-08 12:52:38', ],
            [ 'reginvim'=>'N/A', 'marcaxxx'=>'DISTRIBUIDORA ALONSO', 'dmedico_id'=>'4', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:38', 'updated_at'=>'2020-06-08 12:52:38', ],
            [ 'reginvim'=>'N/A', 'marcaxxx'=>'ALBERTO CADAVI', 'dmedico_id'=>'5', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:38', 'updated_at'=>'2020-06-08 12:52:38', ],
            [ 'reginvim'=>'2016DM-0014249', 'marcaxxx'=>'PLASTITEC S.A', 'dmedico_id'=>'6', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:38', 'updated_at'=>'2020-06-08 12:52:38', ],
            [ 'reginvim'=>'2016DM-0014249', 'marcaxxx'=>'PLASTITEC S.A', 'dmedico_id'=>'7', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:38', 'updated_at'=>'2020-06-08 12:52:38', ],
            [ 'reginvim'=>'2016DM-0014249', 'marcaxxx'=>'PLASTITEC S.A', 'dmedico_id'=>'8', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:38', 'updated_at'=>'2020-06-08 12:52:38', ],
            [ 'reginvim'=>'2016DM-0014249', 'marcaxxx'=>'PLASTITEC S.A', 'dmedico_id'=>'9', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:38', 'updated_at'=>'2020-06-08 12:52:38', ],
            [ 'reginvim'=>'2016DM-0014249', 'marcaxxx'=>'PLASTITEC S.A', 'dmedico_id'=>'10', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2010DM-0006448', 'marcaxxx'=>'PISA', 'dmedico_id'=>'11', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2012DM-0008471', 'marcaxxx'=>'LABORATORIO GOTHAPLAS LTDA', 'dmedico_id'=>'12', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2018DM-0002585-R1', 'marcaxxx'=>'BBRAUN', 'dmedico_id'=>'13', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'N/A', 'marcaxxx'=>'JULIO LAVERDE', 'dmedico_id'=>'14', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'N/A', 'marcaxxx'=>'FE IMPRESORAS', 'dmedico_id'=>'15', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2017DM-0015022', 'marcaxxx'=>'BBRAUN', 'dmedico_id'=>'16', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2009DM-0004830', 'marcaxxx'=>'CUREBAND', 'dmedico_id'=>'17', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'N/A', 'marcaxxx'=>'DISTRIBUIDORA ALONSO', 'dmedico_id'=>'18', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'N/A', 'marcaxxx'=>'DESMEDICOS', 'dmedico_id'=>'18', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2017DM-0016700', 'marcaxxx'=>'ALFASAFE', 'dmedico_id'=>'19', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2013DM-000602', 'marcaxxx'=>'PROTEXION', 'dmedico_id'=>'19', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2017DM-0016700', 'marcaxxx'=>'ALFASAFE', 'dmedico_id'=>'20', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2013DM-000602', 'marcaxxx'=>'PROTEXION', 'dmedico_id'=>'20', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2017DM-0016700', 'marcaxxx'=>'ALFASAFE', 'dmedico_id'=>'21', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2013DM-000602', 'marcaxxx'=>'PROTEXION', 'dmedico_id'=>'21', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2015DM-0012707', 'marcaxxx'=>'ALFASAFE', 'dmedico_id'=>'22', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2015DM-0012707', 'marcaxxx'=>'ALFASAFE', 'dmedico_id'=>'23', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2015DM-0003606-R1', 'marcaxxx'=>'PRECISION CARE', 'dmedico_id'=>'23', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2015DM-0012707', 'marcaxxx'=>'ALFASAFE', 'dmedico_id'=>'24', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2015DM-0012707', 'marcaxxx'=>'ALFASAFE', 'dmedico_id'=>'25', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2013DM-0001569-R1', 'marcaxxx'=>'PRECISION CARE', 'dmedico_id'=>'26', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2018DM-0001797-R1', 'marcaxxx'=>'ALFA TRADING S.A', 'dmedico_id'=>'26', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:39', 'updated_at'=>'2020-06-08 12:52:39', ],
            [ 'reginvim'=>'2013DM-000438-R2', 'marcaxxx'=>'RYMCO', 'dmedico_id'=>'26', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2013DM-0001569-R2', 'marcaxxx'=>'PRECISION CARE', 'dmedico_id'=>'27', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2018DM-0001797-R1', 'marcaxxx'=>'ALFASAFE', 'dmedico_id'=>'28', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2013DM-000438-R2', 'marcaxxx'=>'RYMCO', 'dmedico_id'=>'29', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2013DM-0001569-R1', 'marcaxxx'=>'PRECISION CARE', 'dmedico_id'=>'29', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2019DM-0020742', 'marcaxxx'=>'MEDISPO', 'dmedico_id'=>'29', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2018DM-0001797-R1', 'marcaxxx'=>'ALFASAFE', 'dmedico_id'=>'30', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2013DM-0001569-R1', 'marcaxxx'=>'PRECISION CARE', 'dmedico_id'=>'30', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2013DM-000438-R2', 'marcaxxx'=>'RYMCO', 'dmedico_id'=>'30', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2018DM-0001797-R1', 'marcaxxx'=>'ALFASAFE', 'dmedico_id'=>'31', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2013DM-0001569-R1', 'marcaxxx'=>'PRECISION CARE', 'dmedico_id'=>'31', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'N/A', 'marcaxxx'=>'DISTRIBUIDORA ALONSO', 'dmedico_id'=>'32', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'N/A', 'marcaxxx'=>'LA CAROLINA', 'dmedico_id'=>'33', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'N/A', 'marcaxxx'=>'DISTRIBUIDORA ALONSO', 'dmedico_id'=>'34', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2010DM-0006448', 'marcaxxx'=>'DESMEDICOS', 'dmedico_id'=>'34', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2010DM-0006448', 'marcaxxx'=>'POLYMEDICAL DE COLOMBIA', 'dmedico_id'=>'35', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:52:40', 'updated_at'=>'2020-06-08 12:52:40', ],
            [ 'reginvim'=>'2017DM-0016656', 'marcaxxx'=>'PRESICION CARE (BURETROL)', 'dmedico_id'=>'12', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-30 11:04:25', 'updated_at'=>'2020-07-30 11:06:45', ],
            [ 'reginvim'=>'2015DM-0012707-R1', 'marcaxxx'=>'ALFASAFE PREMIUM', 'dmedico_id'=>'22', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-31 08:58:27', 'updated_at'=>'2020-07-31 08:58:27', ],
            ];
            foreach ($marcaxxx as $key => $value) {
               Dmarca::create($value);
            }


    }
}
