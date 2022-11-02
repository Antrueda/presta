<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSisClinicasTable extends Migration
{
    private $tablaxxx = 'sis_clinicas';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablaxxx, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sucursal', 150)->unique();
            $table->bigInteger('clinica_id')->unsigned();
            $table->bigInteger('municipio_id')->unsigned();
            $table->bigInteger('user_crea_id')->default(1);
            $table->bigInteger('user_edita_id')->default(1);

            $table->bigInteger('sis_esta_id')->unsigned();
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->foreign('clinica_id')->references('id')->on('clinicas');
            $table->foreign('sis_esta_id')->references('id')->on('sis_estas');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE {$this->tablaxxx} comment 'TABLA QUE ALMACENARA LAS SUCURSALES DE LAS CLINICAS'");
        Schema::create('h_' . $this->tablaxxx, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_old');
            $table->string('sucursal', 150);
            $table->bigInteger('clinica_id');
            $table->bigInteger('municipio_id');
            $table->bigInteger('user_crea_id');
            $table->bigInteger('user_edita_id');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->bigInteger('sis_esta_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `h_{$this->tablaxxx}` comment 'TABLA QUE ALMACENARA LOS LOGS DE LA TABLA {$this->tablaxxx}'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_' . $this->tablaxxx);
        Schema::dropIfExists($this->tablaxxx);
    }
}
