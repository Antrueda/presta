<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCformulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cformulas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('paciente_id')->unsigned();
            $table->double('tiempo', 15, 2);
            $table->double('velocidad', 15, 2);
            $table->double('volumen', 15, 2);
            $table->double('purga', 15, 2);
            $table->double('peso', 15, 2);
            $table->double('total', 15, 2);
            $table->bigInteger('sis_clinica_id')->unsigned();
            $table->bigInteger('crango_id')->unsigned()->nullable()->comment('RANGO ASIGNADO A LA FORMULACION');
            $table->bigInteger('userevis_id')->unsigned()->nullable()->comment('USUARIO QUE REVISA LA FORMULACION');
            $table->bigInteger('userprep_id')->unsigned()->nullable()->comment('USUARIO QUE PREPARA LA FORMULACION');
            $table->bigInteger('proceso_id')->unsigned()->nullable()->comment('PROCESO DE LA FORMULACION');
            $table->bigInteger('terminado_id')->unsigned()->nullable()->comment('TERMINADO DE LA FORMULACION');

            $table->string('carbvali')->default(0)->commente('CONCENTRACIÓN DE CARBOHIDRATOS (%) validacion');
            $table->double('concarbo', 15, 2)->default(0)->comment('CONCENTRACIÓN DE CARBOHIDRATOS (%) cantidad');
            $table->string('concprov')->default(0)->commente('CONCENTRACIÓN DE PROTEÍNA (%) (>1%) validacion');
            $table->double('concprot', 15, 2)->default(0)->comment('CONCENTRACIÓN DE PROTEÍNA (%) (>1%) cantidad');
            $table->string('conclipv')->default(0)->commente('CONCENTRACIÓN DE LÍPIDOS (%) (>1%) validacion');
            $table->double('conclipi', 15, 2)->default(0)->comment('CONCENTRACIÓN DE LÍPIDOS (%) (>1%) cantidad');
            $table->double('osmolari', 15, 2)->default(0)->comment('OSMOLARIDAD (mOsm/L) cantidad');
            $table->string('osmolarv')->default(0)->commente('OSMOLARIDAD (mOsm/L) validacion');
            $table->double('gramtota', 15, 2)->default(0)->comment('GRAMOS TOTALES DE NITRÓGENO');
            $table->double('protnitr', 15, 2)->default(0)->comment('RELACIÓN: Caloría No proteícas/g Nitrógeno');
            $table->double('proteica', 15, 2)->default(0)->comment('Caloría No proteícas/g A.A');
            $table->double('caloprov', 15, 2)->default(0)->comment('CALORÍAS PROTEICAS validacion');
            $table->double('caloprot', 15, 2)->default(0)->comment('CALORÍAS PROTEICAS cantidad');
            $table->double('calolipv', 15, 2)->default(0)->comment('CALORÍAS LÍPIDOS validacion');
            $table->double('calolipi', 15, 2)->default(0)->comment('CALORÍAS LÍPIDOS cantidad');
            $table->double('calocarv', 15, 2)->default(0)->comment('CALORÍAS CARBOHIDRATOS validacion');
            $table->double('calocarb', 15, 2)->default(0)->comment('CALORÍAS CARBOHIDRATOS cantidad');
            $table->double('calototv', 15, 2)->default(0)->comment('CALORÍAS TOTALES validacion');
            $table->double('calotota', 15, 2)->default(0)->comment('CALORÍAS TOTALES cantidad');
            $table->double('caltotkg', 15, 2)->default(0)->comment('CALORÍAS TOTALES/Kg//Día');
            $table->double('calcfosf', 15, 2)->default(0)->comment('RELACIÓN CALCIO/FÓSFORO (< 2) cantidad');
            $table->string('calcfosv')->default(0)->commente('RELACIÓN CALCIO/FÓSFORO (< 2) validacion');
            $table->double('pesoteor', 15, 2)->default(0)->comment('PESO TEÓRICO cantidad');


            $table->bigInteger('orden_id')->unsigned();

            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('crango_id')->references('id')->on('crangos');
            $table->foreign('sis_clinica_id')->references('id')->on('sis_clinicas');
            $table->foreign('userevis_id')->references('id')->on('users');
            $table->foreign('userprep_id')->references('id')->on('users');
            $table->foreign('proceso_id')->references('id')->on('procesos');
            $table->foreign('terminado_id')->references('id')->on('terminados');
            $table->foreign('orden_id')->references('id')->on('ordens');

            $table=CamposMagicos::magicos($table);

        });
        Schema::create('h_cformulas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->bigInteger('paciente_id')->unsigned();
            $table->double('tiempo', 15, 2);
            $table->double('velocidad', 15, 2);
            $table->double('volumen', 15, 2);
            $table->double('purga', 15, 2);
            $table->double('peso', 15, 2);
            $table->double('total', 15, 2);
            $table->integer('sis_clinica_id');
            $table->bigInteger('crango_id')->unsigned()->nullable()->comment('RANGO ASIGNADO A LA FORMULACION');
            $table->bigInteger('userevis_id')->unsigned()->nullable()->comment('USUARIO QUE REVISA LA FORMULACION');
            $table->bigInteger('userprep_id')->unsigned()->nullable()->comment('USUARIO QUE PREPARA LA FORMULACION');
            $table->bigInteger('proceso_id')->unsigned()->nullable()->comment('PROCESO DE LA FORMULACION');
            $table->bigInteger('terminado_id')->unsigned()->nullable()->comment('TERMINADO DE LA FORMULACION');

            $table->string('carbvali')->default(0)->commente('CONCENTRACIÓN DE CARBOHIDRATOS (%) validacion');
            $table->double('concarbo', 15, 2)->default(0)->comment('CONCENTRACIÓN DE CARBOHIDRATOS (%) cantidad');
            $table->string('concprov')->default(0)->commente('CONCENTRACIÓN DE PROTEÍNA (%) (>1%) validacion');
            $table->double('concprot', 15, 2)->default(0)->comment('CONCENTRACIÓN DE PROTEÍNA (%) (>1%) cantidad');
            $table->string('conclipv')->default(0)->commente('CONCENTRACIÓN DE LÍPIDOS (%) (>1%) validacion');
            $table->double('conclipi', 15, 2)->default(0)->comment('CONCENTRACIÓN DE LÍPIDOS (%) (>1%) cantidad');
            $table->double('osmolari', 15, 2)->default(0)->comment('OSMOLARIDAD (mOsm/L) cantidad');
            $table->string('osmolarv')->default(0)->commente('OSMOLARIDAD (mOsm/L) validacion');
            $table->double('gramtota', 15, 2)->default(0)->comment('GRAMOS TOTALES DE NITRÓGENO');
            $table->double('protnitr', 15, 2)->default(0)->comment('RELACIÓN: Caloría No proteícas/g Nitrógeno');
            $table->double('proteica', 15, 2)->default(0)->comment('Caloría No proteícas/g A.A');
            $table->double('caloprov', 15, 2)->default(0)->comment('CALORÍAS PROTEICAS validacion');
            $table->double('caloprot', 15, 2)->default(0)->comment('CALORÍAS PROTEICAS cantidad');
            $table->double('calolipv', 15, 2)->default(0)->comment('CALORÍAS LÍPIDOS validacion');
            $table->double('calolipi', 15, 2)->default(0)->comment('CALORÍAS LÍPIDOS cantidad');
            $table->double('calocarv', 15, 2)->default(0)->comment('CALORÍAS CARBOHIDRATOS validacion');
            $table->double('calocarb', 15, 2)->default(0)->comment('CALORÍAS CARBOHIDRATOS cantidad');
            $table->double('calototv', 15, 2)->default(0)->comment('CALORÍAS TOTALES validacion');
            $table->double('calotota', 15, 2)->default(0)->comment('CALORÍAS TOTALES cantidad');
            $table->double('caltotkg', 15, 2)->default(0)->comment('CALORÍAS TOTALES/Kg//Día');
            $table->double('calcfosf', 15, 2)->default(0)->comment('RELACIÓN CALCIO/FÓSFORO (< 2) cantidad');
            $table->string('calcfosv')->default(0)->commente('RELACIÓN CALCIO/FÓSFORO (< 2) validacion');
            $table->double('pesoteor', 15, 2)->default(0)->comment('PESO TEÓRICO cantidad');

            $table->integer('orden_id');
            $table->softDeletes();
            $table=CamposMagicos::h_magicos($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_cformulas');
        Schema::dropIfExists('cformulas');
    }
}
