<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('casa',30)->unique();
            $table->string('nameidxx',9);
            $table->string('unidmedi',15);
            $table->integer('ordecasa');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_casas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->string('casa',30)->unique();
            $table->string('nameidxx',9);
            $table->string('unidmedi',15);
            $table->integer('ordecasa');
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
        Schema::dropIfExists('h_casas');
        Schema::dropIfExists('casas');
    }
}
