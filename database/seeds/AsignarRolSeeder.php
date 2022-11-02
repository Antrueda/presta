<?php

use App\User;
use Illuminate\Database\Seeder;

class AsignarRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::find(1);
        $user->assignRole('super-administrador');
        $user->assignRole('profesional-salud');
        $super=User::find(2);
        $super->assignRole('super-administrador');
        $super=User::find(3);
        $super->assignRole('Revisiones');
        $super=User::find(4);
        $super->assignRole('Preparaciones');
        $super=User::find(5);
        $super->assignRole('Control-Proceso');
        $super=User::find(6);
        $super->assignRole('Control-Terminado');
        $super=User::find(10);
        $user->assignRole('super-administrador');
     }
}
