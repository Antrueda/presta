<?php

namespace App\Helpers;

use App\Models\Administracion\Condicio;
use App\Models\Administracion\Ep;
use App\Models\Administracion\Rango;
use App\Models\Administracion\Rango\Rcodigo;
use App\Models\Administracion\Rango\Rcondici;
use App\Models\Administracion\Rango\Rnpt;

class Administracion
{


    public static function getRangos($request){
        $rangosxx=Rango::select(['rangos.id','rangos.ranginic','rangos.rangfina', 'rangos.sis_esta_id','sis_estas.s_estado'])
        ->join('sis_estas','rangos.sis_esta_id','=','sis_estas.id');
        return DatatableHelper::getDatatable($rangosxx,$request);
    }

    public static function getNpts($request){
        $rangosxx=Rnpt::select(['rnpts.id','npts.nombre', 'rnpts.sis_esta_id','sis_estas.s_estado','rnpts.rango_id'])
        ->join('npts','rnpts.npt_id','=','npts.id')
        ->join('sis_estas','npts.sis_esta_id','=','sis_estas.id')
        ->where('rnpts.rango_id',$request->padrexxx);
        return DatatableHelper::getDatatable($rangosxx,$request);
    }

    public static function getCondiciones($request){
        $rangosxx=Rcondici::select(['condicios.id','npts.nombre', 'rnpts.sis_esta_id','sis_estas.s_estado','rnpts.rango_id',
        'condicios.condicio'])
        ->join('condicios','rcondicis.condicio_id','=','condicios.id')
        ->join('rnpts','rcondicis.rnpt_id','=','rnpts.id')
        ->join('npts','rnpts.npt_id','=','npts.id')
        ->join('sis_estas','condicios.sis_esta_id','=','sis_estas.id')
        ->where('rnpts.rango_id',$request->padrexxx);
        return DatatableHelper::getDatatable($rangosxx,$request);
    }
    public static function getCodigos($request){
        $rangosxx=Rcodigo::select(['rcodigos.id','npts.nombre', 'rnpts.sis_esta_id','sis_estas.s_estado','rnpts.rango_id',
        'condicios.condicio','rcodigos.codiprod'])
        ->join('rcondicis','rcodigos.rcondici_id','=','rcondicis.id')
        ->join('condicios','rcondicis.condicio_id','=','condicios.id')
        ->join('rnpts','rcondicis.rnpt_id','=','rnpts.id')
        ->join('npts','rnpts.npt_id','=','npts.id')
        ->join('sis_estas','condicios.sis_esta_id','=','sis_estas.id')
        ->where('rnpts.rango_id',$request->padrexxx);
        return DatatableHelper::getDatatable($rangosxx,$request);
    }
    public static function getEps($request){
        $rangosxx=Ep::select(['eps.id','eps.nombre', 'eps.sis_esta_id','sis_estas.s_estado'])
        ->join('sis_estas','eps.sis_esta_id','=','sis_estas.id');
        return DatatableHelper::getDatatable($rangosxx,$request);
    }
}
