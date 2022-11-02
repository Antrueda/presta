<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Camposmagicos\CamposMagicos;

class CreateAlertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tipoaccion_id')->unsigned();
            $table->bigInteger('cformula_id')->unsigned();
            $table->boolean('leidaxxx');
            $table->string('routexxx',50);
            $table->foreign('cformula_id')->references('id')->on('cformulas');
            $table->foreign('tipoaccion_id')->references('id')->on('tipoaccions');


            $table=CamposMagicos::magicos($table);
        });
       Schema::create('h_alertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->integer('tipoaccion_id');
            $table->integer('cformula_id');
            $table->boolean('leidaxxx');
            $table->string('routexxx',50);
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
        Schema::dropIfExists('h_alertas');
        Schema::dropIfExists('alertas');
    }
}
