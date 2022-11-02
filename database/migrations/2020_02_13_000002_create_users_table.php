
<?php

use App\CamposMagicos\CamposMagicos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->string('documento')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table=CamposMagicos::getForeign($table,'sis_clinica');
            $table=CamposMagicos::getForeign($table,'sis_esta');
            $table=CamposMagicos::getForeignN($table, 'user_crea_id', 'users');
            $table=CamposMagicos::getForeignN($table, 'user_edita_id', 'users');
            $table->timestamp('polidato_at')->nullable();
        });
        Schema::create('h_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('id_old');
            $table->string('rutaxxxx', 50);
            $table->string('ipxxxxxx', 50);
            $table->string('metodoxx', 50);
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at');
            $table->string('password');
            $table->rememberToken();
            $table->integer('sis_clinica_id');
            $table->string('documento');
            $table->string('telefono');
            $table->timestamp('polidato_at')->nullable();
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
        Schema::dropIfExists('h_users');
        Schema::dropIfExists('users');
    }
}
