<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUnidadsTable extends Migration
{
    private $tablaxxx = 'unidads';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create($this->tablaxxx, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('s_unidad', 50)->unique();
            $table = CamposMagicos::magicos($table);
            $table->softDeletes();
        });

        Schema::create('h_' . $this->tablaxxx, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_old');
            $table->string('s_unidad', 50);
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table = CamposMagicos::h_magicos($table);
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE " . $this->tablaxxx . " comment 'TABLA QUE ALMACENARA LAS UNIDADADES DE LOS RANGOS NPT'");
        DB::statement("ALTER TABLE h_" . $this->tablaxxx . " comment 'TABLA QUE ALMACENARA LOS LOGS DE LA TABLA {$this->tablaxxx}'");
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('h_'.$this->tablaxxx);
        Schema::dropIfExists($this->tablaxxx);
    }
}
