<?php

use App\Models\Itemordene;
use App\Models\Medicamentos\Unidad\Unidad;
use Illuminate\Database\Seeder;

class ItemOrdenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Itemordene::create(['id' => 1,'itemxxxx' => 'CRITERIOS A VERIFICAR', 'rowspanx' => 2, 'colspanx' => 0, 'campoxxx' => '', 'aplicaxx' =>0,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 2,'itemxxxx' => 'EN PROCESO', 'rowspanx' => 0, 'colspanx' => 39, 'campoxxx' => '', 'aplicaxx' =>0,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 3,'itemxxxx' => 'Coloración normal', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'coloraci', 'aplicaxx' =>1,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 4,'itemxxxx' => 'Ausencia de partículas', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'particul', 'aplicaxx' =>2,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 5,'itemxxxx' => 'Ausencia de fugas', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'ausefuga', 'aplicaxx' =>1,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 6,'itemxxxx' => 'Ausencia de Miscelas/Integridad emulsión', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'ausemise', 'aplicaxx' =>1,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 7,'itemxxxx' => 'EN PRODUCTO TERMINADO', 'rowspanx' => 0, 'colspanx' => 39, 'campoxxx' => '', 'aplicaxx' =>1,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 8,'itemxxxx' => 'Datos completos y correctos en la etiqueta', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'completo', 'aplicaxx' =>2,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 9,'itemxxxx' => 'Ausencia de partículas', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'particul', 'aplicaxx' =>2,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 10,'itemxxxx' => 'Integridad de la bolsa o empaque primario', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'integrid', 'aplicaxx' =>2,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 11,'itemxxxx' => 'Contenido/Volumen completo', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'contenid', 'aplicaxx' =>2,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 12,'itemxxxx' => 'Ausencia de fugas', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'fugasxxx', 'aplicaxx' =>2,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 13,'itemxxxx' => 'Ausencia de Miscelas/Integridad emulsión', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'miscelas', 'aplicaxx' =>2,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 14,'itemxxxx' => 'Ausencia de burbujas', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'burbujas', 'aplicaxx' =>2,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 15,'itemxxxx' => 'Documentación completa', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'document', 'aplicaxx' =>2,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 16,'itemxxxx' => 'PESO TEÓRICO', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'teorico_', 'aplicaxx' =>2,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 17,'itemxxxx' => 'PESO REAL', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'realxxx_', 'aplicaxx' =>2,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Itemordene::create(['id' => 18,'itemxxxx' => 'Concepto: (A) Aprobado (R) Rechazado', 'rowspanx' => 0, 'colspanx' => 0, 'campoxxx' => 'concepto', 'aplicaxx' =>2,'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);


    }
}
