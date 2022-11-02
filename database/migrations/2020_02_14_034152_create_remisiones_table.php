<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('clinica_id')->unsigned(); // clinica dueña de la remisión
            $table->bigInteger('orden_id')->unsigned(); //orden de produccion con la que se genera la remision
            $table->bigInteger('quimfarm_id')->unsigned(); //químico farmacéutico que realiza la remisión
            $table->foreign('clinica_id')->references('id')->on('clinicas');
            $table->foreign('quimfarm_id')->references('id')->on('users');
            $table->foreign('orden_id')->references('id')->on('ordens');
            $table = CamposMagicos::magicos($table);
        });
        Schema::create('h_remisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->integer('orden_id')->unsigned(); //orden de produccion con la que se genera la remision
            $table->integer('clinica_id'); // clinica dueña de la remisión
            $table->integer('quimfarm_id')->unsigned(); //químico farmacéutico que realiza la remisión
            $table = CamposMagicos::h_magicos($table);
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
        Schema::dropIfExists('h_remisiones');
        Schema::dropIfExists('remisiones');
    }
}
