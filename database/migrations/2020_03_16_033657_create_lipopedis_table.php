<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLipopedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lipopedis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('inicioxx',4,2);
            $table->double('finalxxx',4,2);
            $table->double('requerim',4,2);
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_lipopedis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->double('inicioxx',4,2);
            $table->double('finalxxx',4,2);
            $table->double('requerim',4,2);
            $table=CamposMagicos::magicos($table);
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
        Schema::dropIfExists('h_lipopedis');
        Schema::dropIfExists('lipopedis');
    }
}
