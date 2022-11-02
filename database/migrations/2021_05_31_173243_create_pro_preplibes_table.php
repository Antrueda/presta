<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProPreplibesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_preplibes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userevis_id')->unsigned()->nullable()->comment('USUARIO QUE REVISA LA FORMULACION');
            $table->bigInteger('userprep_id')->unsigned()->nullable()->comment('USUARIO QUE PREPARA LA FORMULACION');
            $table->foreign('userevis_id')->references('id')->on('users');
            $table->foreign('userprep_id')->references('id')->on('users');
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
        Schema::dropIfExists('pro_preplibes');
    }
}
