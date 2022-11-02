<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrangosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crangos', function (Blueprint $table) {
            $table->bigIncrements('id');
           
            $table=CamposMagicos::getForeign($table,'sis_clinica');
            $table=CamposMagicos::getForeign($table,'rcodigo');
            $table=CamposMagicos::magicos($table);
            $table->unique(['rcodigo_id','sis_clinica_id']);
        });
        Schema::create('h_crangos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->integer('sis_clinica_id');
            $table->integer('rcodigo_id');
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
        Schema::dropIfExists('h_crangos');
        Schema::dropIfExists('crangos');
    }
}
