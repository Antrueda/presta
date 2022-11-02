<?php

use App\Models\Medicamentos\Mlote;
use Illuminate\Database\Seeder;

class MlotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lotesxxx=[
            [ 'fechvenc'=>'2021-11-01', 'minvima_id'=>1, 'inventar'=>9999.99, 'lotexxxx'=>'16NM6134', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:23', 'updated_at'=>'2020-07-29 15:48:40', ],
            [ 'fechvenc'=>'2021-11-01', 'minvima_id'=>1, 'inventar'=>9999.99, 'lotexxxx'=>'16NM6123', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:23', 'updated_at'=>'2020-07-29 15:48:22', ],
            [ 'fechvenc'=>'2022-01-01', 'minvima_id'=>1, 'inventar'=>860.38, 'lotexxxx'=>'16PM6700', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:23', 'updated_at'=>'2020-07-29 15:51:23', ],
            [ 'fechvenc'=>'2021-02-01', 'minvima_id'=>4, 'inventar'=>9999.99, 'lotexxxx'=>'16NC3555', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:23', 'updated_at'=>'2020-06-08 12:47:23', ],
            [ 'fechvenc'=>'2021-04-01', 'minvima_id'=>4, 'inventar'=>9999.99, 'lotexxxx'=>'16NE4331', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:23', 'updated_at'=>'2020-06-08 12:47:23', ],
            [ 'fechvenc'=>'2021-06-01', 'minvima_id'=>4, 'inventar'=>9999.99, 'lotexxxx'=>'16NG4942', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:23', 'updated_at'=>'2020-06-08 12:47:23', ],
            [ 'fechvenc'=>'2021-07-01', 'minvima_id'=>4, 'inventar'=>9999.99, 'lotexxxx'=>'16NH5143', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:23', 'updated_at'=>'2020-06-08 12:47:23', ],
            [ 'fechvenc'=>'2021-09-01', 'minvima_id'=>4, 'inventar'=>9999.99, 'lotexxxx'=>'16NK5643', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:23', 'updated_at'=>'2020-06-08 12:47:23', ],
            [ 'fechvenc'=>'2021-07-01', 'minvima_id'=>6, 'inventar'=>9911.69, 'lotexxxx'=>'16NG4787', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 12:47:23', 'updated_at'=>'2020-07-29 15:56:50', ],
            [ 'fechvenc'=>'2021-10-01', 'minvima_id'=>6, 'inventar'=>9999.99, 'lotexxxx'=>'16NK5697', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 12:47:23', 'updated_at'=>'2020-07-29 15:57:00', ],
            [ 'fechvenc'=>'2021-11-01', 'minvima_id'=>6, 'inventar'=>9999.99, 'lotexxxx'=>'16NL5957', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:23', 'updated_at'=>'2020-06-08 12:47:23', ],
            [ 'fechvenc'=>'2021-08-01', 'minvima_id'=>7, 'inventar'=>9886.87, 'lotexxxx'=>'12MIL19', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-29 16:00:32', ],
            [ 'fechvenc'=>'2022-04-01', 'minvima_id'=>7, 'inventar'=>9999.99, 'lotexxxx'=>'12NEL24', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-06-08 12:47:24', ],
            [ 'fechvenc'=>'2021-08-01', 'minvima_id'=>8, 'inventar'=>9999.99, 'lotexxxx'=>'4PK908301', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-29 16:03:30', ],
            [ 'fechvenc'=>'2021-10-01', 'minvima_id'=>10, 'inventar'=>6650.55, 'lotexxxx'=>'BCCD1201', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-29 16:10:17', ],
            [ 'fechvenc'=>'2022-07-01', 'minvima_id'=>13, 'inventar'=>9558.98, 'lotexxxx'=>'75NG1424', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-28 13:51:25', ],
            [ 'fechvenc'=>'2022-06-01', 'minvima_id'=>15, 'inventar'=>9999.99, 'lotexxxx'=>'75NF1071', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-29 16:14:05', ],
            [ 'fechvenc'=>'2022-12-01', 'minvima_id'=>15, 'inventar'=>9999.99, 'lotexxxx'=>'75NM2330', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-29 16:15:06', ],
            [ 'fechvenc'=>'2022-10-01', 'minvima_id'=>15, 'inventar'=>9999.99, 'lotexxxx'=>'75NK1795', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-29 16:14:19', ],
            [ 'fechvenc'=>'2022-01-01', 'minvima_id'=>16, 'inventar'=>9627.41, 'lotexxxx'=>'42K901111', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-28 13:51:25', ],
            [ 'fechvenc'=>'2022-09-01', 'minvima_id'=>17, 'inventar'=>9602.92, 'lotexxxx'=>'19421012', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-28 13:51:25', ],
            [ 'fechvenc'=>'2021-10-01', 'minvima_id'=>18, 'inventar'=>9798.82, 'lotexxxx'=>'80588', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-29 16:24:10', ],
            [ 'fechvenc'=>'2023-09-01', 'minvima_id'=>19, 'inventar'=>9999.99, 'lotexxxx'=>'SMA-517-2', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-29 16:24:44', ],
            [ 'fechvenc'=>'2022-01-01', 'minvima_id'=>20, 'inventar'=>9939.68, 'lotexxxx'=>'19066051', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-26 19:59:22', ],
            [ 'fechvenc'=>'2022-05-01', 'minvima_id'=>21, 'inventar'=>9966.93, 'lotexxxx'=>'12NEB15', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-28 13:51:25', ],
            [ 'fechvenc'=>'2021-09-01', 'minvima_id'=>24, 'inventar'=>9909.54, 'lotexxxx'=>'10NK3969', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-29 16:30:44', ],
            [ 'fechvenc'=>'2020-09-01', 'minvima_id'=>25, 'inventar'=>9880.61, 'lotexxxx'=>'10NH2073', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-29 16:33:23', ],
            [ 'fechvenc'=>'2022-06-01', 'minvima_id'=>26, 'inventar'=>9959.81, 'lotexxxx'=>'VIC-203', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-26 19:59:22', ],
            [ 'fechvenc'=>'2021-05-01', 'minvima_id'=>27, 'inventar'=>9977.85, 'lotexxxx'=>'1905536', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-07-26 19:59:22', ],
            [ 'fechvenc'=>'2021-07-01', 'minvima_id'=>27, 'inventar'=>9999.99, 'lotexxxx'=>'1907090', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-06-08 12:47:24', ],
            [ 'fechvenc'=>'2021-08-01', 'minvima_id'=>27, 'inventar'=>9999.99, 'lotexxxx'=>'1908529', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:24', 'updated_at'=>'2020-06-08 12:47:24', ],
            [ 'fechvenc'=>'2024-12-01', 'minvima_id'=>28, 'inventar'=>9969.81, 'lotexxxx'=>'1912242E3', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:25', 'updated_at'=>'2020-07-26 19:59:22', ],
            [ 'fechvenc'=>'2021-08-01', 'minvima_id'=>29, 'inventar'=>9995.76, 'lotexxxx'=>'1908355', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 12:47:25', 'updated_at'=>'2020-07-30 08:34:32', ],
            [ 'fechvenc'=>'2021-12-01', 'minvima_id'=>29, 'inventar'=>9999.99, 'lotexxxx'=>'1912031', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:25', 'updated_at'=>'2020-06-08 12:47:25', ],
            [ 'fechvenc'=>'2022-05-01', 'minvima_id'=>30, 'inventar'=>9999.99, 'lotexxxx'=>'1905548', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:25', 'updated_at'=>'2020-06-08 12:47:25', ],
            [ 'fechvenc'=>'2022-02-01', 'minvima_id'=>30, 'inventar'=>9996.67, 'lotexxxx'=>'1902553', 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:25', 'updated_at'=>'2020-07-26 19:59:22', ],
            [ 'fechvenc'=>'2020-06-01', 'minvima_id'=>33, 'inventar'=>9999.99, 'lotexxxx'=>'16MF1035', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 12:47:25', 'updated_at'=>'2020-06-08 13:56:25', ],
            [ 'fechvenc'=>'2021-09-01', 'minvima_id'=>35, 'inventar'=>9999.99, 'lotexxxx'=>'194238081', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:25', 'updated_at'=>'2020-07-30 08:43:27', ],
            [ 'fechvenc'=>'2021-10-01', 'minvima_id'=>37, 'inventar'=>9935.94, 'lotexxxx'=>'16NL5911', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:25', 'updated_at'=>'2020-07-29 15:55:29', ],
            [ 'fechvenc'=>'2022-10-01', 'minvima_id'=>38, 'inventar'=>9995.89, 'lotexxxx'=>'12NKL28', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:25', 'updated_at'=>'2020-07-29 16:29:22', ],
            [ 'fechvenc'=>'2021-10-01', 'minvima_id'=>39, 'inventar'=>9989.65, 'lotexxxx'=>'10NL5273', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:25', 'updated_at'=>'2020-07-29 16:31:55', ],
            [ 'fechvenc'=>'2020-12-01', 'minvima_id'=>42, 'inventar'=>9999.99, 'lotexxxx'=>'16NF4704', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:25', 'updated_at'=>'2020-07-30 08:46:52', ],
            [ 'fechvenc'=>'2022-05-01', 'minvima_id'=>43, 'inventar'=>7215.11, 'lotexxxx'=>'SB20EHI', 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 12:47:25', 'updated_at'=>'2020-07-30 08:53:32', ],
            [ 'fechvenc'=>'2021-09-01', 'minvima_id'=>31, 'inventar'=>0, 'lotexxxx'=>'111', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 13:57:14', 'updated_at'=>'2020-07-30 08:42:50', ],
            [ 'fechvenc'=>'2025-06-05', 'minvima_id'=>32, 'inventar'=>66.39, 'lotexxxx'=>'ABCDE12345', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 20:42:36', 'updated_at'=>'2020-07-30 08:41:21', ],
            [ 'fechvenc'=>'2022-01-01', 'minvima_id'=>33, 'inventar'=>2580, 'lotexxxx'=>'16PA6380', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-28 11:51:57', 'updated_at'=>'2020-07-30 08:37:42', ],
            [ 'fechvenc'=>'2021-05-01', 'minvima_id'=>7, 'inventar'=>9999.99, 'lotexxxx'=>'12NFL05', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-29 15:59:58', 'updated_at'=>'2020-07-29 15:59:58', ],
            [ 'fechvenc'=>'2022-11-01', 'minvima_id'=>17, 'inventar'=>9999.99, 'lotexxxx'=>'19486010', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-29 16:22:20', 'updated_at'=>'2020-07-29 16:22:20', ],
            [ 'fechvenc'=>'2023-01-01', 'minvima_id'=>17, 'inventar'=>9999.99, 'lotexxxx'=>'20066012', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-29 16:23:03', 'updated_at'=>'2020-07-29 16:23:03', ],
            [ 'fechvenc'=>'2021-03-01', 'minvima_id'=>25, 'inventar'=>9999.99, 'lotexxxx'=>'10PA7880', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-29 16:34:01', 'updated_at'=>'2020-07-29 16:34:01', ],
            [ 'fechvenc'=>'2022-09-01', 'minvima_id'=>46, 'inventar'=>9999.99, 'lotexxxx'=>'VIC-204', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-29 16:42:11', 'updated_at'=>'2020-07-29 16:42:11', ],
            [ 'fechvenc'=>'2021-10-01', 'minvima_id'=>36, 'inventar'=>9999.99, 'lotexxxx'=>'16NL5923', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-30 08:44:30', 'updated_at'=>'2020-07-30 08:44:30', ],
            [ 'fechvenc'=>'2020-10-01', 'minvima_id'=>42, 'inventar'=>9999.99, 'lotexxxx'=>'16ND3909', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-30 08:49:42', 'updated_at'=>'2020-07-30 08:49:42', ],
            [ 'fechvenc'=>'2021-06-01', 'minvima_id'=>42, 'inventar'=>9999.99, 'lotexxxx'=>'16NM6277', 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-30 08:51:05', 'updated_at'=>'2020-07-30 08:51:05', ],
            ];
foreach ($lotesxxx as $key => $value) {
 Mlote::create($value);
}

        }
}
