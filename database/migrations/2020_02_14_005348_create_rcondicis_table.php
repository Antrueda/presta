<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRcondicisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rcondicis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table=CamposMagicos::getForeign($table, 'condicio');
            $table=CamposMagicos::getForeign($table, 'rnpt');
            $table=CamposMagicos::magicos($table);
            $table->unique(['condicio_id','rnpt_id']);
        });
        Schema::create('h_rcondicis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->integer('condicio_id');
            $table->integer('rnpt_id');
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
        Schema::dropIfExists('h_rcondicis');
        Schema::dropIfExists('rcondicis');
    }
}
