<?php

namespace App\CamposMagicos;

class CamposMagicos
{
    private static function armarCampo($tablaxxx,$campoxxx){
        if (!$tablaxxx) {
            $tablaxxx = $campoxxx . 's';
            $campoxxx = $campoxxx . '_id';
        }
        return [$tablaxxx,$campoxxx];
    }
    public static function getForeign($table, $campoxxx, $tablaxxx = false)
    {
        $c=CamposMagicos::armarCampo($tablaxxx,$campoxxx);
        $table->bigInteger($c[1])->unsigned();
        $table->foreign($c[1])->references('id')->on($c[0]);
        return $table;
    }
    public static function getForeignDefault($defaultx,$table, $campoxxx, $tablaxxx = false)
    {
        $c=CamposMagicos::armarCampo($tablaxxx,$campoxxx);
        $table->bigInteger($c[1])->unsigned()->default($defaultx);
        $table->foreign($c[1])->references('id')->on($c[0]);
        return $table;
    }
    public static function getForeignN($table, $campoxxx, $tablaxxx = false)
    {
        $c=CamposMagicos::armarCampo($tablaxxx,$campoxxx);
        $table->bigInteger($c[1])->unsigned()->nullable();
        $table->foreign($c[1])->references('id')->on($c[0]);
        return $table;
    }
    public static function magicos($table)
    {
        $table=CamposMagicos::getForeign($table, 'user_crea_id', 'users');
        $table=CamposMagicos::getForeign($table, 'user_edita_id', 'users');
        $table=CamposMagicos::getForeign($table, 'sis_esta');
        $table->timestamps();
        return $table;
    }
    

    public static function h_magicos($table)
    {
        $table->integer('user_crea_id');
        $table->integer('user_edita_id');
        $table->integer('sis_esta_id');
        $table->timestamps();
        return $table;
    }

    public static function getMagicosNulleble($defaultx,$table)
    {
        $table=CamposMagicos::getForeignN($table, 'user_crea_id', 'users');
        $table=CamposMagicos::getForeignN($table, 'user_edita_id', 'users');
        $table=CamposMagicos::getForeignDefault($defaultx,$table, 'sis_esta');
        $table->timestamps();
        return $table;
    }

    public static function getMagicosDefault($table)
    {
        $table=CamposMagicos::getForeignDefault(1,$table, 'user_crea_id', 'users');
        $table=CamposMagicos::getForeignDefault(1,$table, 'user_edita_id', 'users');
        $table=CamposMagicos::getForeignDefault(1,$table, 'sis_esta');
        $table->timestamps();
        return $table;
    }
}
