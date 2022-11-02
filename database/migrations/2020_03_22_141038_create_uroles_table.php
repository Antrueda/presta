<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uroles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table=CamposMagicos::getForeign($table,'role');
            $table=CamposMagicos::getForeign($table,'user');
            $table=CamposMagicos::magicos($table);
        });
        Schema::create('h_uroles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table=CamposMagicos::getForeign($table,'role');
            $table=CamposMagicos::getForeign($table,'user');
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
        Schema::dropIfExists('h_uroles');
        Schema::dropIfExists('uroles');
    }
}
