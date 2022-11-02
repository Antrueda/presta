<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracion\Rango\RcondiciCrearRequest;
use App\Http\Requests\Administracion\Rango\RcondiciEditarRequest;
use App\Models\Administracion\Condicio;
use App\Models\Administracion\Rango;
use App\Models\Administracion\Rango\Rcondici;
use App\Models\Administracion\Rango\Rnpt;
use App\Models\Sistema\SisEsta;

class RcondiciController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'rcondici',
            'parametr' => [],
            'rutacarp' => 'Administracion.Rango.',
            'tituloxx' => 'Crear Condicion Rango',
            'slotxxxx' => 'rcondici',
            'carpetax' => 'Rcondici',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-leer|' .
            $this->opciones['permisox'] . '-crear|' .
            $this->opciones['permisox'] . '-editar|' .
            $this->opciones['permisox'] . '-borrar']);


        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'rcondici';
        $this->opciones['routnuev'] = 'rcondici';
        $this->opciones['routxxxx'] = 'rcondici';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A CONDICIONES', 'clasexxx' => 'btn btn-sm btn-primary'
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
                'titunuev' => 'NUEVA CONDICION',
                'titulist' => 'LISTA DE CONDICIONES',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'padrexxx', 'dataxxxx' => $padrexxx],
                ],
                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => 'api/administracion/condiciones',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'CONDICON'],
                    ['td' => 'NPT'],
                    ['td' => 'ESTADO'],

                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'rangos.id'],
                    ['data' => 'condicio', 'name' => 'condicios.condicio'],
                    ['data' => 'nombre', 'name' => 'npt.nombre'],
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
        $this->opciones['condicio'] = Condicio::getCombo(['cabecera' => false, 'ajaxxxxx' => false]);
        $this->opciones['nptidxxx'] = Rnpt::combo(['cabecera' => false, 'ajaxxxxx' => false,'padrexxx'=>$this->opciones['padrexxx']]);
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
        $this->opciones['botoform'][0]['routingx'][1] = $padrexxx;
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
    public function store($padrexxx, RcondiciCrearRequest $request)
    {
        $dataxxxx = $request->all();
        $dataxxxx['npt_id'] = $padrexxx;
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($padrexxx, Rcondici $objetoxx)
    {
        $this->opciones['cardhead'] = Rango::getRango(['padrexxx' => $padrexxx]);
        $this->opciones['botoform'][0]['routingx'][1] = $padrexxx;
        $this->opciones['parametr'] =  [$padrexxx, $objetoxx->id];
        $this->opciones['tituloxx'] = 'Ver: Rango';
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
    public function edit($padrexxx, Rcondici $objetoxx)
    {
        $this->opciones['cardhead'] = Rango::getRango(['padrexxx' => $padrexxx]);
        $this->opciones['botoform'][0]['routingx'][1] = $padrexxx;
        $this->opciones['parametr'] =  [$padrexxx, $objetoxx->id];

        $this->opciones['tituloxx'] = 'Editar: Condición';
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
        $rangoxxx = Rcondici::transaccion($dataxxxx, $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$rangoxxx->rnpt->npt_id, $rangoxxx->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($padrexxx, RcondiciEditarRequest  $request, Rcondici $objetoxx)
    {
        $dataxxxx = $request->all();
        $dataxxxx['npt_id'] = $padrexxx;
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($padrexxx, Rcondici $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
