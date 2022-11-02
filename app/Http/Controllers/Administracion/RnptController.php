<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracion\Rango\RnptCrearRequest;
use App\Http\Requests\Administracion\Rango\RnptEditarRequest;

use App\Models\Administracion\Rango;
use App\Models\Administracion\Rango\Rnpt;
use App\Models\Medicamentos\Npt;
use App\Models\Sistema\SisEsta;

class RnptController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'rnpt',
            'parametr' => [],
            'rutacarp' => 'Administracion.Rango.',
            'tituloxx' => 'Crear npt a rango',
            'slotxxxx' => 'rnpt',
            'carpetax' => 'Rnpt',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-leer|' .
            $this->opciones['permisox'] . '-crear|' .
            $this->opciones['permisox'] . '-editar|' .
            $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'rnpt';
        $this->opciones['routnuev'] = 'rnpt';
        $this->opciones['routxxxx'] = 'rnpt';

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
    public function index($padrexxx)
    {
        $this->opciones['cardhead']=Rango::getRango(['padrexxx'=>$padrexxx]);
        $this->opciones['tablasxx'][] =
            [

                'titunuev' => 'NUEVO NPT',
                'titulist' => 'LISTA DE NPTS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'].$this->opciones['carpetax'].'.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'padrexxx', 'dataxxxx' => $padrexxx],
                ],
                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => 'api/administracion/rnpts',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'NPT'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'rnpts.id'],
                    ['data' => 'nombre', 'name' => 'npts.nombre'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablarnpt',
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
        $this->opciones['nptidxxx'] = Npt::combo(['cabecera' => false, 'ajaxxxxx' => false]);
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
        $this->opciones['cardhead']=Rango::getRango(['padrexxx'=>$padrexxx]);
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
    public function store($padrexxx,RnptCrearRequest $request)
    {
        $dataxxxx = $request->all();
        $dataxxxx['rango_id']=$padrexxx;
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($padrexxx,Rango $objetoxx)
    {
        $this->opciones['cardhead']=Rango::getRango(['padrexxx'=>$padrexxx]);
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
    public function edit($padrexxx,Rnpt $objetoxx)
    {
        $this->opciones['cardhead']=Rango::getRango(['padrexxx'=>$padrexxx]);
        $this->opciones['botoform'][0]['routingx'][1]=$padrexxx;
        $this->opciones['parametr'] =  [$padrexxx,$objetoxx->id];

        $this->opciones['tituloxx']='Editar: Npt al Rango';
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
        $rangoxxx=Rnpt::transaccion($dataxxxx, $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$rangoxxx->rango_id,$rangoxxx->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($padrexxx,RnptEditarRequest  $request, Rnpt $objetoxx)
    {
        $dataxxxx = $request->all();
        $dataxxxx['rango_id']=$padrexxx;
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($padrexxx,Rnpt $objetoxx)
    {
        $this->opciones['cardhead']=Rango::getRango(['padrexxx'=>$padrexxx]);
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
