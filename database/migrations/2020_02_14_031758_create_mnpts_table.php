<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMnptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mnpts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('medicame_id')->unsigned();
            $table->bigInteger('urangnpt_id')->unsigned();
            $table->foreign('medicame_id')->references('id')->on('medicames');
            $table->foreign('urangnpt_id')->references('id')->on('urangnpts');
            $table=CamposMagicos::magicos($table);
            $table->softDeletes();
        });
        Schema::create('h_mnpts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_old');
            $table->integer('medicame_id');
            $table->integer('urangnpt_id');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
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
        Schema::dropIfExists('h_mnpts');
        Schema::dropIfExists('mnpts');
    }
}
