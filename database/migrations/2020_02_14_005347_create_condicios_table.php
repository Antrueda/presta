<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('consinli');
            $table->string('condicio')->uniqued();
           $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_condicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->integer('consinli');
            $table->string('condicio')->uniqued();
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
        Schema::dropIfExists('condicios');
        Schema::dropIfExists('h_condicios');
    }
}
