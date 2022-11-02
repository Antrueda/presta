<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMmarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mmarcas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombcome',150);
            $table->double('osmorali',10,2);
            $table->double('pesoespe',4,2);
            $table->string('formfarm',50);
            $table->bigInteger('medicame_id')->unsigned();
            $table->string('marcaxxx',50);

            $table->foreign('medicame_id')->references('id')->on('medicames');
            $table=CamposMagicos::magicos($table);

        });
        Schema::create('h_mmarcas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->string('nombcome',150);
            $table->double('osmorali',10,2);
            $table->double('pesoespe',4,2);
            $table->string('formfarm',50);
            $table->integer('medicame_id');
            $table->string('marcaxxx',50);
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
        Schema::dropIfExists('h_mmarcas');
        Schema::dropIfExists('mmarcas');
    }
}
