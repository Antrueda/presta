<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRangonptsTable extends Migration
{
    private $tablaxxx = 'rangonpts';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create($this->tablaxxx, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('randesde', 2);
            $table->double('ranhasta', 2);
            $table = CamposMagicos::magicos($table);
            $table->unique(['randesde', 'ranhasta']);
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE {$this->tablaxxx} comment 'TABLA QUE ALMACENARA LOS RANGOS QUE SE VAN ASIGNAR A LA UNIDAD'");
        Schema::create('h_' . $this->tablaxxx, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_old');
            $table->double('randesde', 2);
            $table->double('ranhasta', 2);
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table = CamposMagicos::h_magicos($table);
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `h_{$this->tablaxxx}` comment 'TABLA QUE ALMACENARA LOS LOGS DE LA TABLA {$this->tablaxxx}'");
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
