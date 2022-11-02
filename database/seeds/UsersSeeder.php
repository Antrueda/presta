<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuariox = [
            ['name' => 'Jose Dumar Jimenez Ruiz','telefono'=>'3173809970','documento'=>'17496705', 'email' => 'nowen21@gmail.com', 'password' => 'N0w3n2104$', 'sis_clinica_id' => 1],
            ['name' => 'ADMINISTRADOR NUMIXX','telefono'=>'00000000','documento'=>'1234567', 'email' => 'numixx@numixx.com', 'password' => 'Num1xx123$', 'sis_clinica_id' => 1],
            ['name' => 'USUARIO DE REVISIONES','telefono'=>'00000000','documento'=>'2345678', 'email' => 'revisiones@numixx.com', 'password' => 'N0w3n2104', 'sis_clinica_id' => 1],
            ['name' => 'USUARIO DE PREPARACIONES','telefono'=>'00000000','documento'=>'3456789', 'email' => 'preparaciones@numixx.com', 'password' => 'N0w3n2104', 'sis_clinica_id' => 1],
            ['name' => 'USUARIO DE CONTROL PROCESOS','telefono'=>'00000000','documento'=>'4567890', 'email' => 'procesos@numixx.com', 'password' => 'N0w3n2104', 'sis_clinica_id' => 1],
            ['name' => 'USUARIO DE CONTROL PRODUCTOS TERMINADOS','telefono'=>'00000000','documento'=>'5678901', 'email' => 'terminados@numixx.com', 'password' => 'N0w3n2104', 'sis_clinica_id' => 1],
            ['name' => 'ANA CAROLINA SERRANO','telefono'=>'00000000','documento'=>'6789012', 'email' => 'cserrano@numixx.com', 'password' => 'N0w3n2104', 'sis_clinica_id' => 40],
            ['name' => 'JULIO DE LA ROCHE VALENCIA','telefono'=>'00000000','documento'=>'7890123', 'email' => 'informacion@delaroche.cc', 'password' => 'N0w3n2104', 'sis_clinica_id' => 41],
            ['name' => 'ANDERSON CARRILLO','telefono'=>'00000000','documento'=>'8901234', 'email' => 'acarrillo@numixx.com', 'password' => 'ander123', 'sis_clinica_id' => 42],
            ['name' => 'LUIS FELIPE RODRIGUEZ','telefono'=>'00000000','documento'=>'9012345', 'email' => 'cmezclas@numixx.com', 'password' => '9012345', 'sis_clinica_id' => 1],
            ['name' => 'JORGE RUEDA','telefono'=>'00000000','documento'=>'1090412429', 'email' => 'antrueda14@gmail.com', 'password' => '12345678', 'sis_clinica_id' => 1],
        ];
        foreach ($usuariox as $key => $value) {
            $super = User::create($value);
        }
    }
}
