<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinvimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minvimas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reginvim',25);
            $table->bigInteger('mmarca_id')->unsigned();

            $table->foreign('mmarca_id')->references('id')->on('mmarcas');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_minvimas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->string('reginvim',25);
            $table->integer('mmarca_id');
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
        Schema::dropIfExists('h_minvimas');
        Schema::dropIfExists('minvimas');
    }
}
