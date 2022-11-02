<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicames', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sis_clinica_id')->unsigned();
            $table->bigInteger('casa_id')->unsigned();
            $table->string('nombgene',100)->unique();
            $table->double('concentr', 20, 2);
            $table->string('unidconc',20);
            $table->string('unidmedi',20);

            $table->foreign('sis_clinica_id')->references('id')->on('sis_clinicas');
            $table->foreign('casa_id')->references('id')->on('casas');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_medicames', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->integer('sis_clinica_id');
            $table->integer('casa_id');
            $table->string('nombgene',100);
            $table->double('concentr', 20, 2);
            $table->string('unidconc',20)->nullable();
            $table->string('unidmedi',20);
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
        Schema::dropIfExists('h_medicames');
        Schema::dropIfExists('medicames');
    }
}
