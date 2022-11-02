<?php

use App\Models\Administracion\Ep;
use Illuminate\Database\Seeder;

class EpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $epsxxxxx= [
            [ 'nombre' => 'SIN EPS', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:25', ],
            [ 'nombre' => 'ALIANSALUD', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:25', ],
            [ 'nombre' => 'AMBUQ', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:25', ],
            [ 'nombre' => 'ANASWAYUU', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:26', ],
            [ 'nombre' => 'ASOCIACIÓN DE BARRIOS UNIDOS DE QUIBDÓ E.S.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:47:40', ],
            [ 'nombre' => 'ASOCIACIÓN INDÍGENA DEL CAUCA', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:49:03', ],
            [ 'nombre' => 'ASOCIACIÓN INDÍGENA DEL CESAR Y LA GUAJIRA- DUSAKAWI', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:49:39', ],
            [ 'nombre' => 'ASOCIACIÓN MUTUAL LA ESPERANZA ASMET SALUD', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:50:08', ],
            [ 'nombre' => 'ASOCIACIÓN MUTUAL SER EMPRESA DE SALUD E.S.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:45:41', ],
            [ 'nombre' => 'CAFESALUD', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:26', ],
            [ 'nombre' => 'CAJA DE COMPENSACIÓN FAMILIAR BARRANCABERMEJA -CAFABA', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:50:57', ],
            [ 'nombre' => 'CAJA DE COMPENSACIÓN FAMILIAR COMFAMILIAR -CAMACOL', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:26', ],
            [ 'nombre' => 'CAJA DE COMPENSACIÓN FAMILIAR DE LA GUAJIRA', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:26', ],
            [ 'nombre' => 'CAJA DE COMPESACIÓN FAMILIAR DE ANTIOQUIA-COMFAMA', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:51:57', ],
            [ 'nombre' => 'CAJA DE COMPESACIÓN FAMILIAR DE CARTAGENA-COMFAMLIAR CARTAGENA', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:52:25', ],
            [ 'nombre' => 'CAJA DE COMPESACIÓN FAMILIAR DE NARIÑO-COMFAMILIAR NARIÑO', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:52:46', ],
            [ 'nombre' => 'CAJA DE COMPESACIÓN FAMILIAR DE SUCRE', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:53:23', ],
            [ 'nombre' => 'CAJA DE COMPESACIÓN FAMILIAR DEL HUILA -COMFAMILIAR', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:53:46', ],
            [ 'nombre' => 'CAJA DE PREVISIÓN SOCIAL DE BOYACÁ', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:46:46', ],
            [ 'nombre' => 'CAJA DEPARTAMENTAL DE PREVISIÓN DE NORTE DE SANTANDER', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:54:16', ],
            [ 'nombre' => 'CAJA PREVISIÓN SOCIAL DE LA SUPERINTENDENCIA BANCARIA', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:54:52', ],
            [ 'nombre' => 'CAJA SANTANDEREANA DE SUBSIDIO FAMILIAR-CAJASAN', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:26', ],
            [ 'nombre' => 'CAJACOPI ATLANTICO', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
            [ 'nombre' => 'CAJANAL E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:59:52', ],
            [ 'nombre' => 'CAPRECOM E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:00:14', ],
            [ 'nombre' => 'CAPRESOCA E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:00:37', ],
            [ 'nombre' => 'COLMÉDICA', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
            [ 'nombre' => 'COLSEGUROS E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:00:56', ],
            [ 'nombre' => 'COLSUBSIDIO', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
            [ 'nombre' => 'COMFACA', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
            [ 'nombre' => 'COMFACHOCO', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
            [ 'nombre' => 'COMFACOR', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
            [ 'nombre' => 'COMFACUNDI', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
              [ 'nombre' => 'COMFANORTE', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
            [ 'nombre' => 'COMFAORIENTE', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
            [ 'nombre' => 'COMFASUCRE', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
            [ 'nombre' => 'COMFENALCO ANTIOQUIA', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
            [ 'nombre' => 'COMFENALCO DE TOLIMA', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
            [ 'nombre' => 'COMFENALCO QUINDIO', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:27', ],
            [ 'nombre' => 'COMFENALCO SANTANDER', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:28', ],
            [ 'nombre' => 'COMFENALCO VALLE E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:01:48', ],
            [ 'nombre' => 'COMPARTA', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:28', ],
            [ 'nombre' => 'COMPENSAR E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:01:21', ],
            [ 'nombre' => 'CONVIDA A.R.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 15:59:33', ],
            [ 'nombre' => 'COOMEVA', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:28', ],
            [ 'nombre' => 'COOSALUD', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:28', ],
            [ 'nombre' => 'CORPORACIÓN ELÉCTRICA COSTA ATLANTICA CORELCA', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:08:42', ],
            [ 'nombre' => 'CRUZ BLANCA E.P.S S.A', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:10:46', ],
            [ 'nombre' => 'DIRECCIÓN SERVICIO MEDICO Y ODONTOLÓGICO DE LA E.A.A.B', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:03:45', ],
            [ 'nombre' => 'DIV. SERVICIO MÉDICO MUNICIPIO DE SANTIAGO DE CALÍ', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:09:45', ],
            [ 'nombre' => 'E.P.S CALISALUD', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:28', ],
            [ 'nombre' => 'E.P.S CONDOR', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:28', ],
            [ 'nombre' => 'E.P.S DE CALDAS', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:28', ],
            [ 'nombre' => 'E.P.S SERVICIO OCCIDENTAL DE SALUD S.A', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:04:47', ],
            [ 'nombre' => 'E.P.S FAMISANAR LTDA - CAFAM', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:14:22', ],
            [ 'nombre' => 'E.P.S UNIMEC', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:10:22', ],
            [ 'nombre' => 'E.P.S CONVIDA', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:05:30', ],
            [ 'nombre' => 'MEDIMÁS E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:12:49', ],
            [ 'nombre' => 'ECOOPSOS', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:28', ],
            [ 'nombre' => 'EMDISALUD', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:29', ],
            [ 'nombre' => 'EMPRESAS PÚBLICAS DE MEDELLÍN-DEPARTAMENTO MÉDICO', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:16:36', ],
            [ 'nombre' => 'EMSSANAR E.S.S', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:29', ],
            [ 'nombre' => 'E.P.S SANITAS', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:06:12', ],
            [ 'nombre' => 'E.P.S SERVICIOS MÉDICOS COLPATRIA', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:07:00', ],
            [ 'nombre' => 'E.P.S SURA', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:07:30', ],
            [ 'nombre' => 'FONDO DE PASIVO SOCIAL DE LOS FERROCARRILES NALES', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:29', ],
            [ 'nombre' => 'FONDO PREVISIÓN SOCIAL DEL CONGRESO REPÚBLICA', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:13:43', ],
            [ 'nombre' => 'HUMANA VIVIR S.A. E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:17:10', ],
            [ 'nombre' => 'INSTITUTO COLOMBIANO DE LA REFORMA AGRARIA -INCORA', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:29', ],
            [ 'nombre' => 'INSTITUTO DE LOS SEGUROS SOCIALES', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:29', ],
            [ 'nombre' => 'MALLAMAS', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:29', ],
            [ 'nombre' => 'MANEXKA E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:20:43', ],
            [ 'nombre' => 'MUTUAL SERVICIOS', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:15:12', ],
            [ 'nombre' => 'NUEVA E.P.S CONTRIBUTIVO', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:20:14', ],
            [ 'nombre' => 'NUEVA E.P.S SUBSIDIADA', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:19:53', ],
            [ 'nombre' => 'PIJAOS SALUD E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:18:17', ],
            [ 'nombre' => 'RED SALUD ATENCIÓN HUMANA E.P.S S.A', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:21:31', ],
            [ 'nombre' => 'S.O.S E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:24:24', ],
            [ 'nombre' => 'SALUD COLMENA E.P.S. S.A', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:21:59', ],
            [ 'nombre' => 'SALUD COLPATRIA', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:30', ],
            [ 'nombre' => 'SALUD TOTAL', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:30', ],
            [ 'nombre' => 'SALUDCOLOMBIA E.P.S S.A.', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:25:09', ],
            [ 'nombre' => 'SALUDVIDA', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:30', ],
            [ 'nombre' => 'SELVASALUD', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:30', ],
            [ 'nombre' => 'SERVICIOS DE SALUD DE LA CORPORACIÓN AUTÓNOMA REGIONAL', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:23:51', ],
            [ 'nombre' => 'SERVICIO OCCIDENTAL DE SALUD', 'user_crea_id' => '1', 'user_edita_id' => 1, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-06-08 12:47:30', ],
            [ 'nombre' => 'SOLSALUD S.A. E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:25:46', ],
            [ 'nombre' => 'SUSALUD E.P.S', 'user_crea_id' => '1', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:26:11', ],
            [ 'nombre' => 'COLSANITAS E.P.S', 'user_crea_id' => '2', 'user_edita_id' => 2, 'sis_esta_id' => 1, 'created_at' => '', 'updated_at' => '2020-07-28 16:26:49', ],
            ];


            foreach ($epsxxxxx as $key => $value) {
               Ep::create($value);
            }
    }
}
