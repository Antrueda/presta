<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUrangnptsTable extends Migration
{
    private $tablaxxx = 'urangnpts';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablaxxx, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table = CamposMagicos::getForeign($table, 'unidrang');
            $table = CamposMagicos::getForeign($table, 'npt');
            $table = CamposMagicos::magicos($table);
            $table->softDeletes();
        });
        Schema::create('h_' . $this->tablaxxx, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_old');
            $table->integer('unidrang_id');
            $table->integer('npt_id');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table = CamposMagicos::h_magicos($table);
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE " . $this->tablaxxx . " comment 'TABLA QUE ALMACENARA LOS NPTS ASIGNADOS AL RANGO'");
        DB::statement("ALTER TABLE h_" . $this->tablaxxx . " comment 'TABLA QUE ALMACENARA LOS LOGS DE LA TABLA {$this->tablaxxx}'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_' . $this->tablaxxx);
        Schema::dropIfExists($this->tablaxxx);
    }
}
