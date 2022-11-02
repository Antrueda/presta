<?php

use App\Models\Clinica\Clinica;
use App\Models\Clinica\SisClinica;

use Illuminate\Database\Seeder;

class SisClinicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clinicas = [
            ['clinica_id' => 1, 'municipio_id' => 641, 'sucursal' => 'NUMIXX', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //0
            ['clinica_id' => 2, 'municipio_id' => 641, 'sucursal' => 'AMRITZAR S.A.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //1
            ['clinica_id' => 3, 'municipio_id' => 641, 'sucursal' => 'ASOCIACION DE AMIGOS CONTRA EL CANCER - PROSEGUIR', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //2
            ['clinica_id' => 4, 'municipio_id' => 641, 'sucursal' => 'CENTRO DE INVESTIGACIONES ONCOLÓGICAS SAN DIEGO-CI', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //3
            ['clinica_id' => 5, 'municipio_id' => 641, 'sucursal' => 'NUEVA CLÍNICA EL BARZAL', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //4
            ['clinica_id' => 6, 'municipio_id' => 641, 'sucursal' => 'CLINICA DE MONTERIA', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //5
            ['clinica_id' => 7, 'municipio_id' => 641, 'sucursal' => 'CLINICA MEDILASER S.A.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //6
            ['clinica_id' => 8, 'municipio_id' => 641, 'sucursal' => 'CUIDARTE TU SALUD S.A.S.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //7
            ['clinica_id' => 9, 'municipio_id' => 641, 'sucursal' => 'E.S.E HOSPITAL SAN RAFAEL DE TUNJA', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //8
            ['clinica_id' => 10, 'municipio_id' => 641, 'sucursal' => 'E.S.E. HOSPITAL REGIONAL DE DUITAMA', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //9
            ['clinica_id' => 11, 'municipio_id' => 641, 'sucursal' => 'E.S.E. HOSPITAL SAN RAFAEL FUSAGASUGA', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //10
            ['clinica_id' => 12, 'municipio_id' => 641, 'sucursal' => 'EPS FAMISANAR S.A.S', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //11
            ['clinica_id' => 13, 'municipio_id' => 641, 'sucursal' => 'EUSALUD S.A.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //12
            ['clinica_id' => 14, 'municipio_id' => 641, 'sucursal' => 'EVALUAMOS IPS LIMITADA', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //13
            ['clinica_id' => 15, 'municipio_id' => 641, 'sucursal' => 'FUNDACION ABOOD SHAIO', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //14
            ['clinica_id' => 16, 'municipio_id' => 641, 'sucursal' => 'FUNDACION AMIGOS DE LA SALUD', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //15
            ['clinica_id' => 17, 'municipio_id' => 641, 'sucursal' => 'FUNDACION CLINICA DEL RIO', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //16
            ['clinica_id' => 18, 'municipio_id' => 641, 'sucursal' => 'GARCIA PEREZ MEDICA Y COMPAÑÍA S.A.S.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //17
            ['clinica_id' => 19, 'municipio_id' => 641, 'sucursal' => 'HOSPITAL DEPARTAMENTAL DE GRANADA E.S.E.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //18
            ['clinica_id' => 20, 'municipio_id' => 641, 'sucursal' => 'HOSPITAL DEPARTAMENTAL MARIA INMACULADA E.S.E', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //19
            ['clinica_id' => 21, 'municipio_id' => 641, 'sucursal' => 'HOSPITAL REGIONAL DE MONIQUIRA E.S.E', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //20
            ['clinica_id' => 22, 'municipio_id' => 641, 'sucursal' => 'HOSPITAL REGIONAL DE SOGAMOSO E.S.E', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //21
            ['clinica_id' => 23, 'municipio_id' => 641, 'sucursal' => 'I.P.S. BEST HOME CARE S.A.S.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //22
            ['clinica_id' => 24, 'municipio_id' => 641, 'sucursal' => 'ING CLINICAL CENTER SAS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //23
            ['clinica_id' => 25, 'municipio_id' => 641, 'sucursal' => 'INNOVAR SALUD S.A.S.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //24
            ['clinica_id' => 26, 'municipio_id' => 641, 'sucursal' => 'INVERSIONES CLINICA DEL META S.A.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //25
            ['clinica_id' => 27, 'municipio_id' => 641, 'sucursal' => 'MEDIFACA IPS S.A.S.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //26
            ['clinica_id' => 28, 'municipio_id' => 641, 'sucursal' => 'MEGASALUD IPS S.A.S.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //27
            ['clinica_id' => 29, 'municipio_id' => 641, 'sucursal' => 'MESSER DE COLOMBIA S.A.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //28
            ['clinica_id' => 30, 'municipio_id' => 641, 'sucursal' => 'MIOCARDIO S.A.S. CASTELLANA', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //29
            ['clinica_id' => 31, 'municipio_id' => 641, 'sucursal' => 'NACERSANO S.A.S.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //30
            ['clinica_id' => 32, 'municipio_id' => 641, 'sucursal' => 'NUEVA CLINICA DE SANTO TOMAS S.A.S.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //31
            ['clinica_id' => 33, 'municipio_id' => 641, 'sucursal' => 'NUMIXX SOCIEDAD POR ACCIONES SIMPLIFICADA SAS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //32
            ['clinica_id' => 34, 'municipio_id' => 641, 'sucursal' => 'PSQ S.A.S.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //33
            ['clinica_id' => 35, 'municipio_id' => 641, 'sucursal' => 'SALUD VITAL DE COLOMBIA IPS S.A.S.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //34
            ['clinica_id' => 36, 'municipio_id' => 641, 'sucursal' => 'SERVICIOS MEDICOS INTEGRALES DE SALUD S.A.S. SERVI', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //35
            ['clinica_id' => 37, 'municipio_id' => 641, 'sucursal' => 'SOCIEDAD CLINICA CARDIOVASCULAR CORAZON JOVEN', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //36
            ['clinica_id' => 38, 'municipio_id' => 641, 'sucursal' => 'SOCIEDAD MEDICO QUIRURGICA NUESTRA SEÑORA DE BELEN', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //37
            ['clinica_id' => 39, 'municipio_id' => 641, 'sucursal' => 'VISION TOTAL S.A.S.', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //38
            ['clinica_id' => 40, 'municipio_id' => 641, 'sucursal' => 'CLINICA LA CAROLINA', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //39
            ['clinica_id' => 41, 'municipio_id' => 641, 'sucursal' => 'J2 IPS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //40
            ['clinica_id' => 42, 'municipio_id' => 641, 'sucursal' => 'SEÑORA MERCEDES', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //41
            ['clinica_id' => 43, 'municipio_id' => 641, 'sucursal' => 'E.S.E HOSPITAL SAN RAFAEL DE FACATATIVA', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //42
            ['clinica_id' => 7, 'municipio_id' => 641, 'sucursal' => 'CLINICA MEDILASER S.A.1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //42
            ['clinica_id' => 7, 'municipio_id' => 641, 'sucursal' => 'CLINICA MEDILASER S.A.2', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1], //42

        ];
        foreach ($clinicas as $key => $value) {

            SisClinica::create($value);
        }
    }
}
