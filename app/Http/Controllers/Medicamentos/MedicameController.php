<?php

namespace App\Http\Controllers\Medicamentos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medicamentos\MedicameCrearRequest;
use App\Http\Requests\Medicamentos\MedicameEditarRequest;
use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Casa;
use App\Models\Medicamentos\Medicame;
use App\Models\Medicamentos\Npt;
use App\Models\Sistema\SisEsta;


class MedicameController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'medicamento',
            'parametr' => [],
            'rutacarp' => 'Medicame.Medicamento.',
            'tituloxx' => 'Medicamento',
            'carpetax' => 'Medicame',
            'slotxxxx' => 'medicame',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' .
        $this->opciones['permisox'] . '-leer|' .
        $this->opciones['permisox'] . '-crear|' .
        $this->opciones['permisox'] . '-editar|' .
        $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'medicamento';
        $this->opciones['routnuev'] = 'medicamento';
        $this->opciones['routxxxx'] = 'medicamento';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'Volver a medicamentos', 'clasexxx' => 'btn btn-sm btn-primary'
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
        $this->opciones['indecrea'] = true;
        $this->opciones['esindexx'] = true;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'Nuevo medicamento',
                'titulist' => 'Lista de medicamentos',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => 'Medicame.Medicamento.Medicame.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                ],

                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => 'api/medicame/medicame',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'MEDICAMENTO'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'medicames.id'],
                    ['data' => 'nombgene', 'name' => 'medicames.nombgene'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'medicamento',
                'permisox' => 'medicamento',
                'routxxxx' => 'medicamento',
                'parametr' => [],
            ]

        ];

        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {
        $this->opciones['casasxx'] = Casa::combo(['cabecera' => true, 'ajaxxxxx' => false]);
        $this->opciones['nptsxxxx'] = Npt::all();
        $this->opciones['clinicax'] = SisClinica::combo(true, false);

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
        $this->opciones['indecrea'] = true;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'Crear', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(true, '', 'Crear', $this->opciones['rutacarp']. '.pestanias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicameCrearRequest $request)
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
    public function show(Medicame $objetoxx)
    {
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
    public function edit(Medicame $objetoxx)
    {
        $this->opciones['padrexxx'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'Editar', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [Medicame::transaccion($dataxxxx, $objectx)->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicameEditarRequest $request, Medicame $objetoxx)
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
    public function destroy(Medicame $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
