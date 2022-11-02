<?php

use App\Camposmagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('completo'); //datos completos y correctos en la etiqueta
            $table->boolean('particul'); //ausencia de partículas
            $table->boolean('integrid'); //integridad de la bolsa o empaque primario
            $table->boolean('contenid'); //contenido/volumen completo
            $table->boolean('fugasxxx'); //ausencia de fugas
            $table->boolean('miscelas'); //ausencia de miscelas/integridad emulsion
            $table->boolean('burbujas'); //ausencia de burbujas
            $table->boolean('document'); //documentacion completa
            $table->double('teorico_', 8, 2); //peso teorico
            $table->double('realxxx_', 8, 2); //peso real
            $table->double('pesobols', 8, 2); //peso de la bolsa
            $table->boolean('limitesx'); //peso dentro de los limites establecidos
            $table->boolean('concepto'); //Concepto (A) Aprobado (R) Rechazado
            $table->boolean('estaterm')->nullable(); //estado del terminado
            $table->boolean('nopasaxx'); //indica si el control producto terminado es exitoso o no
            $table = CamposMagicos::magicos($table);
        });
        Schema::create('h_terminados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->boolean('completo'); //datos completos y correctos en la etiqueta
            $table->boolean('particul'); //ausencia de partículas
            $table->boolean('integrid'); //integridad de la bolsa o empaque primario
            $table->boolean('contenid'); //contenido/volumen completo
            $table->boolean('fugasxxx'); //ausencia de fugas
            $table->boolean('miscelas'); //ausencia de miscelas/integridad emulsion
            $table->boolean('burbujas'); //ausencia de burbujas
            $table->boolean('document'); //documentacion completa
            $table->double('teorico_', 8, 2); //peso teorico
            $table->double('realxxx_', 8, 2); //peso real
            $table->double('pesobols', 8, 2); //peso de la bolsa
            $table->boolean('limitesx'); //peso dentro de los limites establecidos
            $table->boolean('concepto'); //Concepto (A) Aprobado (R) Rechazado
            $table->boolean('estaterm')->nullable(); //estado del terminado
            $table->boolean('nopasaxx'); //indica si el control producto terminado es exitoso o no
            $table = CamposMagicos::h_magicos($table);
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
        Schema::dropIfExists('h_terminados');
        Schema::dropIfExists('terminados');
    }
}
