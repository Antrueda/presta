<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSisEstasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sis_estas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_estado');
            $table->Integer('i_estado');
            $table->Integer('user_crea_id'); 
            $table->Integer('user_edita_id');
            $table->timestamps();
        });
        Schema::create('h_sis_estas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('s_estado');
            $table->Integer('i_estado');
            $table->Integer('user_crea_id'); 
            $table->Integer('user_edita_id');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->timestamps();
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
        Schema::dropIfExists('h_sis_estas');
        Schema::dropIfExists('sis_estas');
    }
}
