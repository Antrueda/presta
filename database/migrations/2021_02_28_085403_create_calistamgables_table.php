<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalistamgablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calistamgables', function (Blueprint $table) {
            $table->id();
            $table=CamposMagicos::getForeign($table,'calistam');
            $table->double('unidad',6,2);
            $table->double('cantcons',6,2)->nullable();
            $table->double('diferenc',6,2)->nullable();
            $table->integer('calistamgable_id')->unsigned();
            $table->string('calistamgable_type');
            $table=CamposMagicos::magicos($table);
        });

        Schema::create('h_calistamgables', function (Blueprint $table) {
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->integer('calistam_id')->unsigned();
            $table->double('unidad',6,2);
            $table->double('cantcons',6,2)->nullable();
            $table->double('diferenc',6,2)->nullable();
            $table->integer('calistamgable_id')->unsigned();
            $table->string('calistamgable_type');
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
        Schema::dropIfExists('calistamgables');
    }
}
