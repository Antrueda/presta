<?php


use App\Models\Clinica\Clinica;
use Illuminate\Database\Seeder;

class ClinicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clinicas = [
            ['id' => 1, 'nitxxxxx' => 17496705, 'clinica' => 'NUMIXX', 'telefono' => '12346789', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 2, 'nitxxxxx' => 900025914, 'clinica' => 'AMRITZAR S.A.', 'telefono' => '7910645', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 3, 'nitxxxxx' => 830090073, 'clinica' => 'ASOCIACION DE AMIGOS CONTRA EL CANCER - PROSEGUIR', 'telefono' => '5557080', 'digiveri' => 3, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 4, 'nitxxxxx' => 830099212, 'clinica' => 'CENTRO DE INVESTIGACIONES ONCOLÓGICAS SAN DIEGO-CI', 'telefono' => '0313208400', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 2, 'sis_esta_id' => 1],
            ['id' => 5, 'nitxxxxx' => 900470909, 'clinica' => 'NUEVA CLÍNICA EL BARZAL', 'telefono' => '0386849799', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 2, 'sis_esta_id' => 1],
            ['id' => 6, 'nitxxxxx' => 891001122, 'clinica' => 'CLINICA DE MONTERIA', 'telefono' => '3157840013', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 7, 'nitxxxxx' => 813001952, 'clinica' => 'CLINICA MEDILASER S.A.', 'telefono' => '3176610945', 'digiveri' => 0, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 8, 'nitxxxxx' => 900241765, 'clinica' => 'CUIDARTE TU SALUD S.A.S.', 'telefono' => '3847450 ext:2116', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 9, 'nitxxxxx' => 891800231, 'clinica' => 'E.S.E HOSPITAL SAN RAFAEL DE TUNJA', 'telefono' => '7405030', 'digiveri' => 0, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 10, 'nitxxxxx' => 891855438, 'clinica' => 'E.S.E. HOSPITAL REGIONAL DE DUITAMA', 'telefono' => '3102146162', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 11, 'nitxxxxx' => 890680025, 'clinica' => 'E.S.E. HOSPITAL SAN RAFAEL FUSAGASUGA', 'telefono' => '3134905971', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 12, 'nitxxxxx' => 830003564, 'clinica' => 'EPS FAMISANAR S.A.S', 'telefono' => '3185893826', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 13, 'nitxxxxx' => 800227072, 'clinica' => 'EUSALUD S.A.', 'telefono' => '4320872 EXT 917', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 14, 'nitxxxxx' => 900005955, 'clinica' => 'EVALUAMOS IPS LIMITADA', 'telefono' => '7848903 EXT 303', 'digiveri' => 6, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 15, 'nitxxxxx' => 860006656, 'clinica' => 'FUNDACION ABOOD SHAIO', 'telefono' => '5938210', 'digiveri' => 9, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 16, 'nitxxxxx' => 812005522, 'clinica' => 'FUNDACION AMIGOS DE LA SALUD', 'telefono' => '3165328070', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 17, 'nitxxxxx' => 900540156, 'clinica' => 'FUNDACION CLINICA DEL RIO', 'telefono' => 'no tiene', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 18, 'nitxxxxx' => 800231038, 'clinica' => 'GARCIA PEREZ MEDICA Y COMPAÑÍA S.A.S.', 'telefono' => '2871949', 'digiveri' => 2, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 19, 'nitxxxxx' => 800037021, 'clinica' => 'HOSPITAL DEPARTAMENTAL DE GRANADA E.S.E.', 'telefono' => '6587800', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 20, 'nitxxxxx' => 891180098, 'clinica' => 'HOSPITAL DEPARTAMENTAL MARIA INMACULADA E.S.E', 'telefono' => '3107775144', 'digiveri' => 5, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 21, 'nitxxxxx' => 891800395, 'clinica' => 'HOSPITAL REGIONAL DE MONIQUIRA E.S.E', 'telefono' => '7282630', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 22, 'nitxxxxx' => 891855039, 'clinica' => 'HOSPITAL REGIONAL DE SOGAMOSO E.S.E', 'telefono' => '7702201', 'digiveri' => 9, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 23, 'nitxxxxx' => 900657491, 'clinica' => 'I.P.S. BEST HOME CARE S.A.S.', 'telefono' => 'no tiene', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 24, 'nitxxxxx' => 901049161, 'clinica' => 'ING CLINICAL CENTER SAS', 'telefono' => 'no tiene', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 25, 'nitxxxxx' => 830095842, 'clinica' => 'INNOVAR SALUD S.A.S.', 'telefono' => '6098585', 'digiveri' => 3, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 26, 'nitxxxxx' => 892000401, 'clinica' => 'INVERSIONES CLINICA DEL META S.A.', 'telefono' => '6614400 EXT 1155', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 27, 'nitxxxxx' => 900529056, 'clinica' => 'MEDIFACA IPS S.A.S.', 'telefono' => '8439102', 'digiveri' => 9, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 28, 'nitxxxxx' => 813008574, 'clinica' => 'MEGASALUD IPS S.A.S.', 'telefono' => 'no tiene', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 29, 'nitxxxxx' => 860005114, 'clinica' => 'MESSER DE COLOMBIA S.A.', 'telefono' => '3123511070', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 30, 'nitxxxxx' => 900328323, 'clinica' => 'MIOCARDIO S.A.S. CASTELLANA', 'telefono' => '2095042', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 31, 'nitxxxxx' => 900910031, 'clinica' => 'NACERSANO S.A.S.', 'telefono' => '8390668', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 32, 'nitxxxxx' => 900879006, 'clinica' => 'NUEVA CLINICA DE SANTO TOMAS S.A.S.', 'telefono' => '3216551507', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 33, 'nitxxxxx' => 830109312, 'clinica' => 'NUMIXX SOCIEDAD POR ACCIONES SIMPLIFICADA SAS', 'telefono' => '6244487', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 34, 'nitxxxxx' => 900536325, 'clinica' => 'PSQ S.A.S.', 'telefono' => '3193708091', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 35, 'nitxxxxx' => 830124110, 'clinica' => 'SALUD VITAL DE COLOMBIA IPS S.A.S.', 'telefono' => '6010569', 'digiveri' => 6, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 36, 'nitxxxxx' => 800162035, 'clinica' => 'SERVICIOS MEDICOS INTEGRALES DE SALUD S.A.S. SERVI', 'telefono' => '3017148620', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 37, 'nitxxxxx' => 900280825, 'clinica' => 'SOCIEDAD CLINICA CARDIOVASCULAR CORAZON JOVEN', 'telefono' => '8620909', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 38, 'nitxxxxx' => 800174851, 'clinica' => 'SOCIEDAD MEDICO QUIRURGICA NUESTRA SEÑORA DE BELEN', 'telefono' => '8866888', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 39, 'nitxxxxx' => 830504734, 'clinica' => 'VISION TOTAL S.A.S.', 'telefono' => '3165274180', 'digiveri' => 2, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1],
            ['id' => 40, 'nitxxxxx' => 535531, 'clinica' => 'CLINICA LA CAROLINA', 'telefono' => '3167408391', 'digiveri' => 6, 'user_crea_id' => 2, 'user_edita_id' => 2, 'sis_esta_id' => 1],
            ['id' => 41, 'nitxxxxx' => 52086912, 'clinica' => 'J2 IPS', 'telefono' => '3167408382', 'digiveri' => 0, 'user_crea_id' => 2, 'user_edita_id' => 2, 'sis_esta_id' => 1],
            ['id' => 42, 'nitxxxxx' => 8548631364, 'clinica' => 'SEÑORA MERCEDES', 'telefono' => '3507553959', 'digiveri' => 9, 'user_crea_id' => 2, 'user_edita_id' => 2, 'sis_esta_id' => 1],
            ['id' => 43, 'nitxxxxx' => 8999991513, 'clinica' => 'E.S.E HOSPITAL SAN RAFAEL DE FACATATIVA', 'telefono' => '8901915', 'digiveri' => 1, 'user_crea_id' => 2, 'user_edita_id' => 2, 'sis_esta_id' => 1],
        ];
        foreach ($clinicas as $key => $value) {
            Clinica::create(
                ['nitxxxxx' => $value["nitxxxxx"], 'clinica' => $value["clinica"], 'telefono' => $value["telefono"], 'digiveri' => $value["digiveri"], 'user_crea_id' => $value["user_crea_id"], 'user_edita_id' => $value["user_edita_id"], 'sis_esta_id' => $value["sis_esta_id"]]
            );
        }
    }
}
