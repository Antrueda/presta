<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracion\RangoCrearRequest;
use App\Http\Requests\Administracion\RangoEditarRequest;
use App\Models\Administracion\Rango;
use App\Models\Sistema\SisEsta;

class RangoController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'rango',
            'parametr' => [],
            'rutacarp' => 'Administracion.Rango.',
            'tituloxx' => 'Crear Rango',
            'slotxxxx' => 'rango',
            'carpetax' => 'Rango',
            'indecrea' => false, // true muestra index o crear sin pestañas, false muestra las pestañas
            'esindexx' => false, // true indica si es index o crear que debe mostrar
        ];

        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-leer|' .
            $this->opciones['permisox'] . '-crear|' .
            $this->opciones['permisox'] . '-editar|' .
            $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'rango';
        $this->opciones['routnuev'] = 'rango';
        $this->opciones['routxxxx'] = 'rango';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A RANGOS', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->opciones['indecrea']=true;
        $this->opciones['esindexx']=true;
        $this->opciones['tablasxx'][] =
            [

                'titunuev' => 'NUEVO RANGO',
                'titulist' => 'LISTA DE RANGOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'].$this->opciones['carpetax'].'.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                ],
                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => 'api/administracion/rango',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'RANGO INICIA'],
                    ['td' => 'RANGO FINALIZA'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'rangos.id'],
                    ['data' => 'ranginic', 'name' => 'rangos.ranginic'],
                    ['data' => 'rangfina', 'name' => 'rangos.rangfina'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablarango',
                'permisox' => $this->opciones['permisox'],
                'parametr' => [],
                'routxxxx' => $this->opciones['routxxxx'],
            ];


        $this->opciones['padrexxx'] ='';

        $this->opciones['accionxx'] = 'index';
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $accionxx;
        // indica si se esta actualizando o viendo
        if ($nombobje != '') {
            $this->opciones[$nombobje] = $objetoxx;
        }
        // Se arma el titulo de acuerdo al array opciones
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->opciones['padrexxx'] = '';
        $this->opciones['indecrea'] = true;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(true, '', 'Crear', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RangoCrearRequest $request)
    {
        $dataxxxx = $request->all();

        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rango $objetoxx)
    {
        $this->opciones['cardhead']=Rango::getRango(['padrexxx'=>$objetoxx->id]);
        $this->opciones['parametr'] =  [$objetoxx->id];
        $this->opciones['tituloxx']='Ver: Rango';
        $this->opciones['indecrea'] = false;
        $this->opciones['padrexxx'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['readonly'] = 'readonly';
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rango $objetoxx)
    {
        $this->opciones['cardhead']=Rango::getRango(['padrexxx'=>$objetoxx->id]);
        $this->opciones['parametr'] =  [$objetoxx->id];

        $this->opciones['tituloxx']='Editar: Rango';
        $this->opciones['indecrea'] = false;
        $this->opciones['padrexxx'] = $objetoxx->id;

        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', $this->opciones['parametr']],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $rangoxxx=Rango::transaccion($dataxxxx, $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$rangoxxx->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RangoEditarRequest  $request, Rango $objetoxx)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rango $objetoxx)
    {
        $this->opciones['cardhead']=Rango::getRango(['padrexxx'=>$objetoxx->id]);
        $this->opciones['parametr'] = [$objetoxx->id];
        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';
        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
