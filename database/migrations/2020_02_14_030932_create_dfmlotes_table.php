<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDfmlotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dfmlotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dformula_id')->unsigned();
            $table->bigInteger('mlote_id')->unsigned();
            $table->double('volumenx',2); 
            $table->foreign('dformula_id')->references('id')->on('dformulas');
            $table->foreign('mlote_id')->references('id')->on('mlotes');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_dfmlotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->double('volumenx',2); 
            $table->integer('dformula_id');
            $table->integer('mlote_id');
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
        Schema::dropIfExists('h_dfmlotes');
        Schema::dropIfExists('dfmlotes');
    }
}
