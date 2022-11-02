<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasaMedicameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casa_medicame', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('medicame_id')->unsigned();
            $table->bigInteger('casa_id')->unsigned();

            $table->foreign('medicame_id')->references('id')->on('medicames');
            $table->foreign('casa_id')->references('id')->on('casas');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_casa_medicame', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->integer('medicame_id');
            $table->integer('casa_id');
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
        Schema::dropIfExists('h_casa_medicame');
        Schema::dropIfExists('casa_medicame');
    }
}
