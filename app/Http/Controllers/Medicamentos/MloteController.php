<?php
namespace App\Http\Controllers\Medicamentos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medicamentos\MloteCrearRequest;
use App\Http\Requests\Medicamentos\MloteEditarRequest;

use App\Models\Medicamentos\Minvima;
use App\Models\Medicamentos\Mlote;
use App\Models\Medicamentos\Mmarca;
use App\Models\Sistema\SisEsta;


class MloteController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'mlote',
            'parametr' => [],
            'rutacarp' => 'Medicame.Medicamento.',
            'tituloxx' => 'Crear: Lote',
            'carpetax' => 'Mlote',
            'slotxxxx' => 'mlote',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' .
        $this->opciones['permisox'] . '-leer|' .
        $this->opciones['permisox'] . '-crear|' .
        $this->opciones['permisox'] . '-editar|' .
        $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'mlote';
        $this->opciones['routnuev'] = 'mlote';
        $this->opciones['routxxxx'] = 'mlote';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'Volver a lotes', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => ['minvima', []],
                'formhref' => 2, 'tituloxx' => 'Volver a Registros Invima', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => ['mmarca', []],
                'formhref' => 2, 'tituloxx' => 'Volver a marcas', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => ['medicamento', []],
                'formhref' => 2, 'tituloxx' => 'Volver a Medicamentos', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index($medicame)
    {
        $this->opciones['padrexxx'] = $medicame;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'Nuevo lote',
                'titulist' => 'Lista de lotes',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'medicame', 'dataxxxx' => $medicame],
                ],
                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => 'api/medicame/mlote',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'LOTE'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'mlotes.id'],
                    ['data' => 'lotexxxx', 'name' => 'mlotes.lotexxxx'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablamlote',
                'permisox' => 'mlote',
                'routxxxx' => 'mlote',
                'parametr' => [$medicame],
            ],

        ];
        $this->opciones['accionxx'] = 'index';
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }


    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {
        $padrexxx='';
        $this->opciones['marcaxxx'] = Mmarca::combo(['medicame' => $this->opciones['padrexxx'], 'cabecera' => true, 'esajaxxx' => false]);
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $accionxx;
        // indica si se esta actualizando o viendo
        if ($nombobje != '') {
            $objetoxx->mmarca_id=$objetoxx->minvima->mmarca_id;
            $this->opciones[$nombobje] = $objetoxx;
            $padrexxx=$objetoxx->mmarca_id;
        }
        $this->opciones['invimaxx'] = Minvima::combo(['cabecera' => true, 'esajaxxx' => false,'padrexxx'=>$padrexxx]);
        // Se arma el titulo de acuerdo al array opciones
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($medicame)
    {
        $this->opciones['padrexxx'] = $medicame;
        $this->opciones['botoform'][0]['routingx'][1] = [$medicame];
        $this->opciones['botoform'][1]['routingx'][1] = [$medicame];
        $this->opciones['botoform'][2]['routingx'][1] = [$medicame];
        $this->opciones['parametr'] = [$medicame];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'Crear', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$medicame]],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view('', '', 'Crear', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($medicame, MloteCrearRequest $request)
    {
        $dataxxxx = $request->all();
        $dataxxxx['medicame_id'] = $medicame;
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($medicame, Mlote $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Ver: Lote';
        $this->opciones['botoform'][0]['routingx'][1] = [$medicame];
        $this->opciones['botoform'][1]['routingx'][1] = [$medicame];
        $this->opciones['botoform'][2]['routingx'][1] = [$medicame];
        $this->opciones['padrexxx'] = $medicame;
        $this->opciones['parametr'] = [$medicame, $objetoxx->id];
        $this->opciones['readonly'] = 'readonly';
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($medicame, Mlote $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Editar: Lote';
        $this->opciones['botoform'][0]['routingx'][1] = [$medicame];
        $this->opciones['botoform'][1]['routingx'][1] = [$medicame];
        $this->opciones['botoform'][2]['routingx'][1] = [$medicame];
        $this->opciones['padrexxx'] = $medicame;
        $this->opciones['parametr'] = [$medicame, $objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'Editar', 'routingx' => [$this->opciones['routxxxx'] . '.editar', $this->opciones['parametr']],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $medicame = Mlote::transaccion($dataxxxx, $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$medicame->minvima->mmarca->medicame_id, $medicame->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($medicame, MloteEditarRequest $request, Mlote $objetoxx)
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
    public function destroy(Mlote $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
