<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_servicio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('paciente_id')->unsigned();
            $table->bigInteger('servicio_id')->unsigned();

            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_paciente_servicio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->integer('paciente_id');
            $table->integer('servicio_id');
            $table=CamposMagicos::h_magicos($table);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_paciente_servicio');
        Schema::dropIfExists('paciente_servicio');
    }
}
