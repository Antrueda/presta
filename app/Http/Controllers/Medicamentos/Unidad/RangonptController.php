<?php

namespace App\Http\Controllers\Medicamentos\Unidad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medicamentos\Unidad\RangonptCrearRequest;
use App\Http\Requests\Medicamentos\Unidad\RangonptEditarRequest;
use App\Models\Medicamentos\Unidad\Rangonpt;
use App\Models\Sistema\SisEsta;
use Illuminate\Support\Facades\Auth;

class RangonptController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'cardhead' => '', // titulo para las pestañas
            'permisox' => 'rangonpt',
            'parametr' => [],
            'rutacarp' => 'Medicame.Rangonpt.',
            'tituloxx' => 'Rango NPT',
            'slotxxxy' => 'rangonpt',
            'slotxxxx' => 'rangonpt',
            'carpetax' => 'Rangonpt',
            'indecrea' => false,
            'esindexx' => false
        ];


        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-leer|' .
            $this->opciones['permisox'] . '-crear|' .
            $this->opciones['permisox'] . '-editar|' .
            $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'rangonpt';
        $this->opciones['routnuev'] = 'rangonpt';
        $this->opciones['routxxxx'] = 'rangonpt';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER', 'clasexxx' => 'btn btn-sm btn-primary'
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
        $padrexxx = Auth::user()->sis_clinica_id;
        $this->opciones['indecrea'] = false;
        $this->opciones['esindexx'] = true;
        $this->opciones['accionxx'] = 'index';
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'CREAR',
                'titulist' => 'LISTA DE RANGOS PARA LOS MEDICAMENTOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadosx'],
                    ['campoxxx' => 'padrexxx', 'dataxxxx' => $padrexxx],
                    ['campoxxx' => 'puededit', 'dataxxxx' => auth()->user()->can($this->opciones['permisox'].'-editar') ? true : false],
                ],
                'vercrear' => true,
                'accitabl' => true,
                'urlxxxxx' => 'api/unidad/rangonpts',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'RANGO INICIA'],
                    ['td' => 'RANGO FINALIZA'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'rangonpts.id'],
                    ['data' => 'randesde', 'name' => 'rangonpts.randesde'],
                    ['data' => 'ranhasta', 'name' => 'rangonpts.ranhasta'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablageneral',
                'permisox' => 'rangonpt',
                'routxxxx' => 'rangonpt',
                'parametr' => [$padrexxx],
            ],
        ];
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
        $this->opciones['tituloxx'] = $this->opciones['accionxx'] . ': ' . $this->opciones['tituloxx'];
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->opciones['indecrea'] = false;
        $this->opciones['clinicax'] = '';
        $this->opciones['clinicac'] = true;
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
    public function store(RangonptCrearRequest $request)
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
    public function show(Rangonpt $objetoxx)
    {
        $this->opciones['cardhead'] = 'CLINICA: ' . $objetoxx->clinica;
        $this->opciones['clinicax'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rangonpt $objetoxx)
    {
        $this->opciones['cardhead'] = 'CLINICA: ' . $objetoxx->clinica;
        $this->opciones['clinicax'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'MODIFICAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];

            $this->opciones['botoform'][] = [
                    'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'].'.nuevo', []],
                    'formhref' => 2, 'tituloxx' => 'CREAR', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [Rangonpt::transaccion($dataxxxx, $objectx)->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RangonptEditarRequest  $request, Rangonpt $objetoxx)
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
    public function destroy(Rangonpt $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }




}
