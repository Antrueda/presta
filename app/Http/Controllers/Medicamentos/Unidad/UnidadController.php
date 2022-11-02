<?php

namespace App\Http\Controllers\Medicamentos\Unidad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medicamentos\Unidad\UnidadCrearRequest;
use App\Http\Requests\Medicamentos\Unidad\UnidadEditarRequest;
use App\Models\Medicamentos\Unidad\Unidad;
use App\Models\Sistema\SisEsta;
use App\Traits\Pestanias;

class UnidadController extends Controller
{
    private $opciones;
    use Pestanias;
    public function __construct()
    {
        $this->opciones = [
            'cardhead' => '', // titulo para las pestañas
            'permisox' => 'unidad',
            'parametr' => [],
            'rutacarp' => 'Medicame.Unidad.',
            'tituloxx' => 'Unidad',
            'slotxxxy' => 'unidad',
            'slotxxxx' => 'unidad',
            'carpetax' => 'Unidad',
            'indecrea' => false,
            'esindexx' => false,
            'pestania' => [
                'unidadxx' => ['', true, route('unidad'), 'active'],
                'urangosx' => ['disabled', false, '', ''],
                'urnptxxx' => ['disabled', false, '', ''],
            ]
        ];
        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-leer|' .
            $this->opciones['permisox'] . '-crear|' .
            $this->opciones['permisox'] . '-editar|' .
            $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'unidad';
        $this->opciones['routnuev'] = 'unidad';
        $this->opciones['routxxxx'] = 'unidad';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }

    public function index()
    {
        $this->getUnidades(['tablaxxx' => '', 'idxxxxxx' => 1]);
        $this->opciones['esindexx'] = true;
        $this->opciones['accionxx'] = 'index';
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'CREAR',
                'titulist' => 'LISTA DE UNIDADES',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadosx'],
                    ['campoxxx' => 'puededit', 'dataxxxx' => auth()->user()->can('unidad-editar') ? true : false],
                    ['campoxxx' => 'puedasig', 'dataxxxx' => auth()->user()->can('urango-leer') ? true : false],
                ],
                'vercrear' => true,
                'accitabl' => true,
                'urlxxxxx' => 'api/unidad/unidades',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'UNIDAD'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'unidads.id'],
                    ['data' => 's_unidad', 'name' => 'unidads.s_unidad'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablageneral',
                'permisox' => 'unidad',
                'routxxxx' => 'unidad',
                'parametr' => [],
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

    public function create()
    {
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(true, '', 'Crear', $this->opciones['rutacarp'] . 'pestanias');
    }

    public function store(UnidadCrearRequest $request)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    public function show(Unidad $objetoxx)
    {
        $this->opciones['cardhead'] = 'CLINICA: ' . $objetoxx->clinica;
        $this->opciones['parametr'] = [$objetoxx->id];
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    public function edit(Unidad $objetoxx)
    {
        $this->opciones['cardhead'] = 'CLINICA: ' . $objetoxx->clinica;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        if (auth()->user()->can('urnpt-leer')) {
            $this->opciones['botoform'][] = [
                'mostrars' => true, 'accionxx' => '', 'routingx' => ['urango', $this->opciones['parametr']],
                'formhref' => 2, 'tituloxx' => 'ASIGNAR RANGOS', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        }
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [Unidad::transaccion($dataxxxx, $objectx)->id])
            ->with('info', $infoxxxx);
    }

    public function update(UnidadEditarRequest  $request, Unidad $objetoxx)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }

    public function destroy(Unidad $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
