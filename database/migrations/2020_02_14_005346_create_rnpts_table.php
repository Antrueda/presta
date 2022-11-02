<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRnptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rnpts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table=CamposMagicos::getForeign($table, 'rango');
            $table=CamposMagicos::getForeign($table, 'npt');
            $table=CamposMagicos::magicos($table);
            $table->unique(['npt_id','rango_id']);
        });
        Schema::create('h_rnpts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table=CamposMagicos::getForeign($table, 'rango');
            $table=CamposMagicos::getForeign($table, 'npt');
            $table=CamposMagicos::magicos($table);
            $table->unique(['npt_id','rango_id']);
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
        Schema::dropIfExists('h_rnpts');
        Schema::dropIfExists('rnpts');
    }
}
