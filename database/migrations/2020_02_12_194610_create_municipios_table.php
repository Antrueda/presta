<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('departamento_id')->unsigned();
            $table->string('nombre',50);

            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->bigInteger('user_crea_id')->default(1);
            $table->bigInteger('user_edita_id')->default(1);
            $table->bigInteger('sis_esta_id')->unsigned();
            $table->foreign('sis_esta_id')->references('id')->on('sis_estas');
            $table->timestamps();
        });

        Schema::create('h_municipios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->bigInteger('departamento_id')->unsigned();
            $table->string('nombre',50);
            $table->bigInteger('user_crea_id')->default(1);
            $table->bigInteger('user_edita_id')->default(1);
            $table->bigInteger('sis_esta_id')->unsigned();
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
        Schema::dropIfExists('municipios');
    }
}
