<?php

use App\Models\Dispositivos\Dlote;
use Illuminate\Database\Seeder;

class DlotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lotesxxx=[
            [ 'id'=>1, 'fechvenc'=>'2024-01-01', 'inventar'=>'9999.99', 'lotexxxx'=>'8331670', 'dmarca_id'=>1, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:40', 'updated_at'=>'2020-06-08 17:52:40', ],
            [ 'id'=>2, 'fechvenc'=>'2024-06-01', 'inventar'=>'9999.99', 'lotexxxx'=>'9227703', 'dmarca_id'=>2, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:40', 'updated_at'=>'2020-07-30 13:55:25', ],
            [ 'id'=>3, 'fechvenc'=>'2024-05-01', 'inventar'=>'9999.99', 'lotexxxx'=>'201919', 'dmarca_id'=>33, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:40', 'updated_at'=>'2020-07-30 13:56:24', ],
            [ 'id'=>4, 'fechvenc'=>'2022-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'9R027', 'dmarca_id'=>3, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:40', 'updated_at'=>'2020-06-08 17:52:40', ],
            [ 'id'=>5, 'fechvenc'=>'2022-06-01', 'inventar'=>'9999.99', 'lotexxxx'=>'23062020', 'dmarca_id'=>4, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 13:57:48', ],
            [ 'id'=>6, 'fechvenc'=>'2122-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'N/A', 'dmarca_id'=>5, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-06-08 17:52:41', ],
            [ 'id'=>7, 'fechvenc'=>'2029-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'5797-30C03', 'dmarca_id'=>6, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 13:59:32', ],
            [ 'id'=>8, 'fechvenc'=>'2023-01-01', 'inventar'=>'9999.99', 'lotexxxx'=>'5797-27L04', 'dmarca_id'=>6, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-06-08 17:52:41', ],
            [ 'id'=>9, 'fechvenc'=>'2022-10-01', 'inventar'=>'9999.99', 'lotexxxx'=>'5797-29I05', 'dmarca_id'=>6, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 13:59:53', ],
            [ 'id'=>10, 'fechvenc'=>'2022-10-01', 'inventar'=>'9999.99', 'lotexxxx'=>'5797-29I25', 'dmarca_id'=>6, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 14:00:38', ],
            [ 'id'=>11, 'fechvenc'=>'2023-06-01', 'inventar'=>'9999.99', 'lotexxxx'=>'5789-30F16', 'dmarca_id'=>7, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 14:02:30', ],
            [ 'id'=>12, 'fechvenc'=>'2022-10-01', 'inventar'=>'9999.99', 'lotexxxx'=>'5789-30F03', 'dmarca_id'=>7, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 14:03:00', ],
            [ 'id'=>13, 'fechvenc'=>'2023-06-01', 'inventar'=>'9999.99', 'lotexxxx'=>'5800-30E17', 'dmarca_id'=>8, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 14:04:45', ],
            [ 'id'=>14, 'fechvenc'=>'2023-07-01', 'inventar'=>'9999.99', 'lotexxxx'=>'5791-30F19', 'dmarca_id'=>9, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 15:59:45', ],
            [ 'id'=>15, 'fechvenc'=>'2023-06-01', 'inventar'=>'9999.99', 'lotexxxx'=>'5791-30F03', 'dmarca_id'=>9, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 16:00:21', ],
            [ 'id'=>16, 'fechvenc'=>'2023-05-01', 'inventar'=>'9999.99', 'lotexxxx'=>'5793-30E11', 'dmarca_id'=>10, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 16:01:09', ],
            [ 'id'=>17, 'fechvenc'=>'2024-06-01', 'inventar'=>'9999.99', 'lotexxxx'=>'069008', 'dmarca_id'=>11, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 16:02:20', ],
            [ 'id'=>18, 'fechvenc'=>'2023-10-01', 'inventar'=>'9999.99', 'lotexxxx'=>'108175', 'dmarca_id'=>11, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-06-08 17:52:41', ],
            [ 'id'=>19, 'fechvenc'=>'2023-02-01', 'inventar'=>'9999.99', 'lotexxxx'=>'0908708-0410220', 'dmarca_id'=>12, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-06-08 17:52:41', ],
            [ 'id'=>20, 'fechvenc'=>'2022-12-01', 'inventar'=>'9999.99', 'lotexxxx'=>'10M041B564', 'dmarca_id'=>13, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 16:56:15', ],
            [ 'id'=>21, 'fechvenc'=>'2021-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'18L12LA313', 'dmarca_id'=>13, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 16:56:29', ],
            [ 'id'=>22, 'fechvenc'=>'2021-07-01', 'inventar'=>'9999.99', 'lotexxxx'=>'18G24LA201', 'dmarca_id'=>13, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 16:56:40', ],
            [ 'id'=>23, 'fechvenc'=>'2122-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'N/A', 'dmarca_id'=>14, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-06-08 17:52:41', ],
            [ 'id'=>24, 'fechvenc'=>'2122-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'N/A', 'dmarca_id'=>15, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-06-08 17:52:41', ],
            [ 'id'=>25, 'fechvenc'=>'2024-09-01', 'inventar'=>'9999.99', 'lotexxxx'=>'00061701264', 'dmarca_id'=>16, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 16:57:49', ],
            [ 'id'=>26, 'fechvenc'=>'2024-01-01', 'inventar'=>'9999.99', 'lotexxxx'=>'0061664825', 'dmarca_id'=>16, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 16:57:59', ],
            [ 'id'=>27, 'fechvenc'=>'2023-06-01', 'inventar'=>'9999.99', 'lotexxxx'=>'0061630956', 'dmarca_id'=>16, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>2, 'created_at'=>'2020-06-08 17:52:41', 'updated_at'=>'2020-07-30 16:58:09', ],
            [ 'id'=>28, 'fechvenc'=>'2024-05-01', 'inventar'=>'9999.99', 'lotexxxx'=>'ZD20190601', 'dmarca_id'=>17, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-07-30 18:15:33', ],
            [ 'id'=>29, 'fechvenc'=>'2024-06-01', 'inventar'=>'9999.99', 'lotexxxx'=>'ZD20190605', 'dmarca_id'=>17, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-07-30 17:03:00', ],
            [ 'id'=>30, 'fechvenc'=>'2124-05-01', 'inventar'=>'9999.99', 'lotexxxx'=>'11219', 'dmarca_id'=>18, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>31, 'fechvenc'=>'2124-05-01', 'inventar'=>'9999.99', 'lotexxxx'=>'UW/DSM/19/005', 'dmarca_id'=>19, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>32, 'fechvenc'=>'2022-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'C117122112', 'dmarca_id'=>20, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-07-31 14:01:39', ],
            [ 'id'=>33, 'fechvenc'=>'2022-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'1912L053515', 'dmarca_id'=>21, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-07-30 18:38:30', ],
            [ 'id'=>34, 'fechvenc'=>'2024-08-01', 'inventar'=>'9999.99', 'lotexxxx'=>'C117122113', 'dmarca_id'=>50, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-07-31 13:59:52', ],
            [ 'id'=>35, 'fechvenc'=>'2024-10-01', 'inventar'=>'9999.99', 'lotexxxx'=>'20191017', 'dmarca_id'=>23, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>36, 'fechvenc'=>'2024-12-01', 'inventar'=>'9999.99', 'lotexxxx'=>'20191210', 'dmarca_id'=>23, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>37, 'fechvenc'=>'2024-08-01', 'inventar'=>'9999.99', 'lotexxxx'=>'2902018S', 'dmarca_id'=>24, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>38, 'fechvenc'=>'2024-10-01', 'inventar'=>'9999.99', 'lotexxxx'=>'20191010', 'dmarca_id'=>25, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>39, 'fechvenc'=>'2024-08-01', 'inventar'=>'9999.99', 'lotexxxx'=>'YY1929309', 'dmarca_id'=>26, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>40, 'fechvenc'=>'2024-08-01', 'inventar'=>'9999.99', 'lotexxxx'=>'YY1929210', 'dmarca_id'=>27, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>41, 'fechvenc'=>'2024-10-01', 'inventar'=>'9999.99', 'lotexxxx'=>'191015', 'dmarca_id'=>28, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>42, 'fechvenc'=>'2023-09-01', 'inventar'=>'9999.99', 'lotexxxx'=>'YY1824311', 'dmarca_id'=>29, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>43, 'fechvenc'=>'2023-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'YY1825212', 'dmarca_id'=>30, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>44, 'fechvenc'=>'2025-03-01', 'inventar'=>'9999.99', 'lotexxxx'=>'20200320', 'dmarca_id'=>31, 'user_crea_id'=>1, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-07-31 14:03:48', ],
            [ 'id'=>45, 'fechvenc'=>'2024-07-01', 'inventar'=>'9999.99', 'lotexxxx'=>'1038A1', 'dmarca_id'=>32, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>46, 'fechvenc'=>'2024-12-01', 'inventar'=>'9999.99', 'lotexxxx'=>'20191206', 'dmarca_id'=>33, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>47, 'fechvenc'=>'2024-12-01', 'inventar'=>'9999.99', 'lotexxxx'=>'20191206', 'dmarca_id'=>34, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:42', 'updated_at'=>'2020-06-08 17:52:42', ],
            [ 'id'=>48, 'fechvenc'=>'2024-09-01', 'inventar'=>'9999.99', 'lotexxxx'=>'1054H20', 'dmarca_id'=>35, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>49, 'fechvenc'=>'2025-01-01', 'inventar'=>'9999.99', 'lotexxxx'=>'202003', 'dmarca_id'=>36, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>50, 'fechvenc'=>'2024-09-01', 'inventar'=>'9999.99', 'lotexxxx'=>'20190822', 'dmarca_id'=>37, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>51, 'fechvenc'=>'2024-12-01', 'inventar'=>'9999.99', 'lotexxxx'=>'20191206', 'dmarca_id'=>37, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>52, 'fechvenc'=>'2024-12-01', 'inventar'=>'9999.99', 'lotexxxx'=>'302122019', 'dmarca_id'=>38, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>53, 'fechvenc'=>'2024-09-01', 'inventar'=>'9999.99', 'lotexxxx'=>'1053F5', 'dmarca_id'=>39, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>54, 'fechvenc'=>'2024-12-01', 'inventar'=>'9999.99', 'lotexxxx'=>'20191206', 'dmarca_id'=>40, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>55, 'fechvenc'=>'2024-08-01', 'inventar'=>'9999.99', 'lotexxxx'=>'201934', 'dmarca_id'=>41, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>56, 'fechvenc'=>'2024-10-01', 'inventar'=>'9999.99', 'lotexxxx'=>'1078J50', 'dmarca_id'=>42, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>57, 'fechvenc'=>'2024-07-01', 'inventar'=>'9999.99', 'lotexxxx'=>'20190716', 'dmarca_id'=>43, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>58, 'fechvenc'=>'2022-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'26943', 'dmarca_id'=>44, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>59, 'fechvenc'=>'2122-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'N/A', 'dmarca_id'=>45, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>60, 'fechvenc'=>'2122-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'11219', 'dmarca_id'=>46, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>61, 'fechvenc'=>'2122-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'UW/DSM/19/007', 'dmarca_id'=>47, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>62, 'fechvenc'=>'2024-02-01', 'inventar'=>'9999.99', 'lotexxxx'=>'20190228', 'dmarca_id'=>48, 'user_crea_id'=>1, 'user_edita_id'=>1, 'sis_esta_id'=>1, 'created_at'=>'2020-06-08 17:52:43', 'updated_at'=>'2020-06-08 17:52:43', ],
            [ 'id'=>63, 'fechvenc'=>'2022-06-01', 'inventar'=>'9999.99', 'lotexxxx'=>'O-E 28024', 'dmarca_id'=>4, 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-30 13:58:30', 'updated_at'=>'2020-07-30 13:58:30', ],
            [ 'id'=>64, 'fechvenc'=>'2024-09-01', 'inventar'=>'9999.99', 'lotexxxx'=>'190928', 'dmarca_id'=>28, 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-30 16:05:31', 'updated_at'=>'2020-07-30 16:05:31', ],
            [ 'id'=>65, 'fechvenc'=>'2024-09-01', 'inventar'=>'9999.99', 'lotexxxx'=>'190928', 'dmarca_id'=>49, 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-30 16:09:21', 'updated_at'=>'2020-07-30 16:09:21', ],
            [ 'id'=>66, 'fechvenc'=>'2024-09-01', 'inventar'=>'9999.99', 'lotexxxx'=>'190928', 'dmarca_id'=>49, 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-30 16:10:51', 'updated_at'=>'2020-07-30 16:10:51', ],
            [ 'id'=>67, 'fechvenc'=>'2024-03-01', 'inventar'=>'9999.99', 'lotexxxx'=>'YH20190320', 'dmarca_id'=>17, 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-30 18:35:58', 'updated_at'=>'2020-07-30 18:35:58', ],
            [ 'id'=>68, 'fechvenc'=>'2022-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'C117122112', 'dmarca_id'=>20, 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-30 18:41:47', 'updated_at'=>'2020-07-30 18:41:47', ],
            [ 'id'=>69, 'fechvenc'=>'2020-08-01', 'inventar'=>'9999.99', 'lotexxxx'=>'010120', 'dmarca_id'=>28, 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-31 13:50:44', 'updated_at'=>'2020-07-31 13:50:44', ],
            [ 'id'=>70, 'fechvenc'=>'2022-11-01', 'inventar'=>'9999.99', 'lotexxxx'=>'C117122113', 'dmarca_id'=>22, 'user_crea_id'=>2, 'user_edita_id'=>2, 'sis_esta_id'=>1, 'created_at'=>'2020-07-31 14:01:05', 'updated_at'=>'2020-07-31 14:01:05', ],
            ];
            foreach ($lotesxxx as $key => $value) {
                Dlote::create($value);
            }

         }
}
