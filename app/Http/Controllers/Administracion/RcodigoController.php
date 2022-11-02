<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracion\Rango\RcodigoCrearRequest;
use App\Http\Requests\Administracion\Rango\RcodigoEditarRequest;
use App\Models\Administracion\Rango;
use App\Models\Administracion\Rango\Rcodigo;
use App\Models\Administracion\Rango\Rcondici;
use App\Models\Sistema\SisEsta;

class RcodigoController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'rcodigo',
            'parametr' => [],
            'rutacarp' => 'Administracion.Rango.',
             'tituloxx' => 'Crear Código Condición',
            'slotxxxx' => 'rcodigo',
            'carpetax' => 'Rcodigo',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-leer|' .
            $this->opciones['permisox'] . '-crear|' .
            $this->opciones['permisox'] . '-editar|' .
            $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'rcodigo';
        $this->opciones['routnuev'] = 'rcodigo';
        $this->opciones['routxxxx'] = 'rcodigo';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A CODIGOS', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($padrexxx)
    {
        $this->opciones['cardhead'] = Rango::getRango(['padrexxx' => $padrexxx]);
        $this->opciones['tablasxx'][] =
            [

                'titunuev' => 'NUEVO CODIGO',
                'titulist' => 'LISTA DE CODIGOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'].$this->opciones['carpetax'].'.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'padrexxx', 'dataxxxx' => $padrexxx],
                ],
                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => 'api/administracion/codigos',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'CODIGO'],
                    ['td' => 'CONDICON'],
                    ['td' => 'NPT'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'rcodigo.id'],
                    ['data' => 'codiprod', 'name' => 'condicios.codiprod'],
                    ['data' => 'condicio', 'name' => 'condicios.condicio'],
                    ['data' => 'nombre', 'name' => 'npts.nombre'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablarango',
                'permisox' => $this->opciones['permisox'],
                'parametr' => [$padrexxx],
                'routxxxx' => $this->opciones['routxxxx'],
            ];


        $this->opciones['padrexxx'] = $padrexxx;

        $this->opciones['accionxx'] = 'index';
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['condicio'] = Rcondici::combo(['cabecera' => false, 'ajaxxxxx' => false,'padrexxx'=>$this->opciones['padrexxx']]);
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
    public function create($padrexxx)
    {
        $this->opciones['cardhead'] = Rango::getRango(['padrexxx' => $padrexxx]);
        $this->opciones['botoform'][0]['routingx'][1]=$padrexxx;
        $this->opciones['parametr'] =  [$padrexxx];
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['indecrea'] = false;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$padrexxx]],
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
    public function store($padrexxx,RcodigoCrearRequest $request)
    {
        $dataxxxx = $request->all();
        $dataxxxx['npt_id']=$padrexxx;
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($padrexxx,Rcodigo $objetoxx)
    {
        $this->opciones['cardhead'] = Rango::getRango(['padrexxx' => $padrexxx]);
        $this->opciones['botoform'][0]['routingx'][1]=$padrexxx;
        $this->opciones['parametr'] =  [$padrexxx,$objetoxx->id];
        $this->opciones['tituloxx']='Ver: Rango';
        $this->opciones['indecrea'] = false;
        $this->opciones['padrexxx'] = $padrexxx;
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
    public function edit($padrexxx,Rcodigo $objetoxx)
    {
        $this->opciones['cardhead'] = Rango::getRango(['padrexxx' => $padrexxx]);
        $this->opciones['botoform'][0]['routingx'][1]=$padrexxx;
        $this->opciones['parametr'] =  [$padrexxx,$objetoxx->id];

        $this->opciones['tituloxx']='Editar: Rango';
        $this->opciones['indecrea'] = false;
        $this->opciones['padrexxx'] = $padrexxx;

        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', $this->opciones['parametr']],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $rangoxxx=Rcodigo::transaccion($dataxxxx, $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$rangoxxx->rcondici->rnpt->rango_id,$rangoxxx->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($padrexxx,RcodigoEditarRequest  $request, Rcodigo $objetoxx)
    {
        $dataxxxx = $request->all();
        $dataxxxx['npt_id']=$padrexxx;
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($padrexxx,Rcodigo $objetoxx)
    {
        $this->opciones['cardhead'] = Rango::getRango(['padrexxx' => $padrexxx]);
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
