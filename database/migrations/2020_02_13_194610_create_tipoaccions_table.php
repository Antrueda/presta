<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoaccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoaccions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tituloxx',50)->unique();
            $table->string('permisox',50);
            $table->string('iconoxxx',50);
            $table->string('pestania',150);
            $table->string('routexxx',50);
            $table->string('titulink',50);
            $table->text('cuerpoxx');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_tipoaccions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->string('tituloxx',50);
            $table->string('permisox',50);
            $table->string('iconoxxx',50);
            $table->string('pestania',150);
            $table->string('routexxx',50);
            $table->string('titulink',50);
            $table->text('cuerpoxx');
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
        Schema::dropIfExists('h_tipoaciones');
        Schema::dropIfExists('tipoaciones');
    }
}
