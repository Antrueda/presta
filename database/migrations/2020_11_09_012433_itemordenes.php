<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemOrdenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemordenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('itemxxxx');
            $table->bigInteger('rowspanx')->default(0);
            $table->bigInteger('colspanx')->default(0);
            $table->string('campoxxx')->default(0);
            $table->string('aplicaxx')->default(0);
            $table=CamposMagicos::magicos($table);

            });

            Schema::create('h_itemordenes', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->Integer('id_old');
                $table->string('rutaxxxx', 50);
                $table->string('ipxxxxxx', 50);
                $table->string('metodoxx', 50);
                $table->string('itemxxxx');
                $table->bigInteger('rowspanx')->default(0);
                $table->bigInteger('colspanx')->default(0);
                $table->string('campoxxx')->default(0);
                $table->string('aplicaxx')->default(0);
                $table=CamposMagicos::h_magicos($table);
                $table->softDeletes();
    
                });
    }


    /**
    * 
     * 
     * 
     * 
     * 
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemordenes');
    }
}
