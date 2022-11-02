<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDmarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmarcas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reginvim',150);
            $table->string('marcaxxx',50);
            $table=CamposMagicos::getForeign($table,'dmedico');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_dmarcas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->string('reginvim',150);
            $table->integer('dmedico_id');
            $table->string('marcaxxx',50);
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
        Schema::dropIfExists('h_dmarcas');
        Schema::dropIfExists('dmarcas');

    }
}
