<?php

use App\Models\Tipoaccion;
use Illuminate\Database\Seeder;

class TipoaccionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipoaccion::create(['id'=>1,'tituloxx'=>'CLIENTE',
        'user_crea_id'=>1,'user_edita_id'=>1,'sis_esta_id'=>1,
        'permisox'=>'alerta-cliente','pestania'=>'CLIENTE','iconoxxx'=>'fa-users',
        'routexxx'=>'formular.ver',
        'titulink'=>'FORMULACIÓN CREADA',
        'cuerpoxx'=>'Señores: xxxxxxxx su formulació: yyyyyyyy ha sido preparada.',



        ]);
        Tipoaccion::create(['id'=>2,'tituloxx'=>'REVISAR',
        'user_crea_id'=>1,'user_edita_id'=>1,'sis_esta_id'=>1,
        'permisox'=>'alerta-revisar','pestania'=>'REVISIONES','iconoxxx'=>'fa-spell-check',
        'routexxx'=>'revision.editar',
        'titulink'=>'REVISAR FORMULACIÓN',
        'cuerpoxx'=>'Señores numixx la siguente formulacion: yyyyyyyy ha sido creada.',



        ]);
        Tipoaccion::create(['id'=>3,'tituloxx'=>'PREPARAR',
        'user_crea_id'=>1,'user_edita_id'=>1,'sis_esta_id'=>1,
        'permisox'=>'alerta-preparar','pestania'=>'PREPARACIONES','iconoxxx'=>'fa-bong',
        'routexxx'=>'preparac.editar',
        'titulink'=>'PREPARAR FORMULACIÓN',
        'cuerpoxx'=>'Señores numixx la siguente formulacion: yyyyyyyy ha sido revisada.',



        ]);
        Tipoaccion::create(['id'=>4,'tituloxx'=>'PROCESAR',
        'user_crea_id'=>1,'user_edita_id'=>1,'sis_esta_id'=>1,
        'permisox'=>'alerta-procesar','pestania'=>'CONTROL EN PROCESO','iconoxxx'=>'fa-cog',
        'routexxx'=>'controlp.nuevo',
        'titulink'=>'CONTROLAR FORMULACIÓN',
        'cuerpoxx'=>'Señores numixx la siguente formulacion: yyyyyyyy se ha preparado.',



        ]);
        Tipoaccion::create(['id'=>5,'tituloxx'=>'TERMINAR',
        'user_crea_id'=>1,'user_edita_id'=>1,'sis_esta_id'=>1,
        'permisox'=>'alerta-terminar',
        'pestania'=>'REALIZAR CONTROL PRODUCTO TERMINADO','iconoxxx'=>'fa-user-check',
        'routexxx'=>'controlt.nuevo',
        'titulink'=>'TERMINAR FORMULACIÓN',
        'cuerpoxx'=>'Señores: xxxxxxxx la siguente formulacion: yyyyyyyy se le ha realizado control en proceso.',



        ]);


    }
}
