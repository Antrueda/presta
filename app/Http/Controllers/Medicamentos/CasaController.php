<?php

namespace App\Http\Controllers\Medicamentos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medicamentos\CasaCrearRequest;
use App\Http\Requests\Medicamentos\CasaEditarRequest;
use App\Models\Medicamentos\Casa;
use App\Models\Sistema\SisEsta;
use App\Traits\Casas\CasasTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasaController extends Controller
{
    use CasasTrait;
    private $opciones;

    public function __construct()
    {
        $this->opciones['pestpadr'] = 1;
        $this->opciones['cardhead'] = '';
        $this->opciones['parapest'] = [0, 0, 0, 0]; // paramentros para las pestañas
        $this->opciones['accionxx'] = 'index';
        $this->opciones['permisox'] = 'casa';
        $this->opciones['routxxxx'] = 'casa';
        $this->opciones['rutacarp'] = 'Medicame.Casa.';
        $this->opciones['carpetax'] = 'Casa';
        $this->opciones['slotxxxx'] =  $this->opciones['permisox'];
        $this->opciones['tituloxx'] = 'CASA';
        $this->opciones['fechcrea'] = '';
        $this->opciones['fechedit'] = '';
        $this->opciones['usercrea'] = '';
        $this->opciones['useredit'] = '';
        $this->opciones['parametr'] = [];
        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar']);
        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A CASAS', 'clasexxx' => 'btn btn-sm btn-primary'
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
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'Nueva casa',
                'titulist' => 'Lista de casas',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => 'Medicame.Casa.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                ],
                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx'),
                'cabecera' => [
                    [
                        ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'CASA', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ORDEN', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ESTADO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'casas.id'],
                    ['data' => 'casa', 'name' => 'casas.casa'],
                    ['data' => 'ordecasa', 'name' => 'casas.ordecasa'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'datatable',
                'permisox' => $this->opciones['permisox'],
                'routxxxx' => $this->opciones['routxxxx'],
                'parametr' => [],
            ],

        ];
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    public function getListado(Request $request)
    {
        if ($request->ajax()) {
            $request->routexxx = [$this->opciones['routxxxx']];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getListados($request);
        }
    }

    private function view($dataxxxx)
    {
        $ordenxxx = true;
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $dataxxxx['accionxx'];
        // indica si se esta actualizando o viendo
        if ($dataxxxx['modeloxx'] != '') {
            $this->opciones['modeloxx'] = $dataxxxx['modeloxx'];
            $ordenxxx = false;
            $this->opciones['parapest']  = $dataxxxx['modeloxx']->id;
            $this->opciones['parametr'] = [$dataxxxx['modeloxx']->id];
            if (auth()->user()->can($this->opciones['permisox'] . '-crear')) {
                $this->opciones['botoform'][] =
                    [
                        'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'] . '.nuevo', []],
                        'formhref' => 2, 'tituloxx' => 'IR A CREAR NUEVO REGISTRO', 'clasexxx' => 'btn btn-sm btn-primary'
                    ];
            }

            $this->opciones['fechcrea'] = $dataxxxx['modeloxx']->created_at;
            $this->opciones['fechedit'] = $dataxxxx['modeloxx']->updated_at;
            $this->opciones['usercrea'] = $dataxxxx['modeloxx']->creador->name;
            $this->opciones['useredit'] = $dataxxxx['modeloxx']->editor->name;
        }
        $this->opciones['ordenxxx'] = Casa::orden($ordenxxx);
        // Se arma el titulo de acuerdo al array opciones
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(['accionxx'=>'Crear','modeloxx'=>'']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CasaCrearRequest $request)
    {
        return $this->grabar(['modeloxx'=>'','requestx'=>$request,'infoxxxx'=>'Registro creado con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Casa $objetoxx)
    {
        return $this->view(['accionxx'=>'Ver','modeloxx'=>$objetoxx]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Casa $objetoxx)
    {
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
            return $this->view(['accionxx'=>'Editar','modeloxx'=>$objetoxx]);
    }

    private function grabar($dataxxxx)
    {
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [Casa::transaccion($dataxxxx)->id])
            ->with('info', $dataxxxx['infoxxxx']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CasaEditarRequest $request, Casa $objetoxx)
    {

        return $this->grabar(['modeloxx'=>$objetoxx,'requestx'=>$request,'infoxxxx'=>'Registro actualizado con éxito']);
    }

    public function inactivate(Casa $objetoxx)
    {
        if (auth()->user()->can($this->opciones['permisox'] . '-borrar')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'INACTIVAR', 'routingx' => [$this->opciones['routxxxx'] . '.borrar', []],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Destroy','padrexxx'=>$objetoxx->sis_clinica]);
    }


    public function destroy(Request $request, Casa $objetoxx)
    {
        $objetoxx->update(['sis_esta_id' => 2, 'user_edita_id' => Auth::user()->id]);
        return redirect()
            ->route($this->opciones['permisox'], [$objetoxx->sis_clinica_id])
            ->with('info', 'Casa inactivado correctamente');
    }
}
