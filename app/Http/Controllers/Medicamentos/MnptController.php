<?php

namespace App\Http\Controllers\Medicamentos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medicamentos\MnptCrearRequest;
use App\Http\Requests\Medicamentos\MnptEditarRequest;
use App\Models\Medicamentos\Mnpt;
use App\Models\Medicamentos\Npt;
use App\Models\Medicamentos\Unidad\Rangonpt;
use App\Models\Medicamentos\Unidad\Unidad;
use App\Models\Medicamentos\Unidad\Unidrang;
use App\Models\Medicamentos\Unidad\Urangnpt;
use App\Models\Sistema\SisEsta;


class MnptController extends Controller
{
    private $opciones;

    public function __construct() //alista las variables para ser usadas próximamente
    {
        $this->opciones = [ // un array
            'permisox' => 'mnpt',
            'parametr' => [],
            'rutacarp' => 'Medicame.Medicamento.',
            'tituloxx' => 'Crear: Npt',
            'carpetax' => 'Mnpt',
            'slotxxxx' => 'mnpt',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' .
        $this->opciones['permisox'] . '-leer|' .
        $this->opciones['permisox'] . '-crear|' .
        $this->opciones['permisox'] . '-editar|' .
        $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'mnpt';
        $this->opciones['routnuev'] = 'mnpt';
        $this->opciones['routxxxx'] = 'mnpt';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'Volver a npts', 'clasexxx' => 'btn btn-sm btn-primary'
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
                'titunuev' => 'Nuevo npt',
                'titulist' => 'Lista de npts',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'medicame', 'dataxxxx' => $medicame],
                ],
                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => 'api/medicame/mnpt',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'NPT'],
                    ['td' => 'RANGO DESDE'],
                    ['td' => 'RANGO HASTA'],
                    ['td' => 'RANGO UNIDAD'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'mnpts.id'],
                    ['data' => 'nombre', 'name' => 'npts.nombre'],
                    ['data' => 'randesde', 'name' => 'rangonpts.randesde'],
                    ['data' => 'ranhasta', 'name' => 'rangonpts.ranhasta'],
                    ['data' => 's_unidad', 'name' => 'unidads.s_unidad'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablamnpt',
                'permisox' => 'mnpt',
                'routxxxx' => 'mnpt',
                'parametr' => [$medicame],
            ],

        ];
        $this->opciones['accionxx'] = 'index';
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }


    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {
        $padrexxx = 0;
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $accionxx;
        // indica si se esta actualizando o viendo
        if ($nombobje != '') {
            $this->opciones[$nombobje] = $objetoxx;
            $padrexxx = $objetoxx->urangnpt_id;
        }
        $this->opciones['mnptxxxx'] = Mnpt::combo([
            'cabecera' => true, 'esajaxxx' => false,
            "medicame" => $this->opciones['padrexxx'], "selectxx" => $padrexxx
        ]);
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
    public function store($medicame, MnptCrearRequest $request)
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
    public function show($medicame, Mnpt $objetoxx)
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
    public function edit($medicame, Mnpt $objetoxx)
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
        $medicame = Mnpt::transaccion($dataxxxx, $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$medicame->medicame_id, $medicame->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($medicame, MnptEditarRequest $request, Mnpt $objetoxx)
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
    public function destroy(Mnpt $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
