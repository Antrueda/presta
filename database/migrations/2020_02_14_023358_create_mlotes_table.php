<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMlotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mlotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fechvenc');
            $table->bigInteger('minvima_id')->unsigned();
            $table->double('inventar',6,2);
            $table->string('lotexxxx',15);

            $table->foreign('minvima_id')->references('id')->on('minvimas');
            $table=CamposMagicos::magicos($table);


        });
        Schema::create('h_mlotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->date('fechvenc');
            $table->integer('minvima_id');
            $table->double('inventar',6,2);
            $table->string('lotexxxx',15);


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
        Schema::dropIfExists('h_mlotes');
        Schema::dropIfExists('mlotes');
    }
}
