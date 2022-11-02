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


class MnptController_borrar extends Controller
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
        foreach (Mnpt::get() as $registro) {
            // buscar las unidades
            $s_unidad = Unidad::where('s_unidad', $registro->rangunid)->first();
            // if(!isset($s_unidad->s_unidad)){
            //     echo "'{$registro->rangunid}'".'<br>';
            // }

            // bucar los rangos

            $rango = Rangonpt::where('randesde', $registro->randesde)->where('ranhasta', $registro->ranhasta)->first();
            // if (!isset($s_unidad->id)) {
            //     Rangonpt::create([
            //         'randesde' => $registro->randesde, 'ranhasta' => $registro->ranhasta,
            //         'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1
            //     ]);
            // }

            // unir rango con unidad

           // $Unidrang = Unidrang::where('rangonpt_id', $rango->id)->where('unidad_id', $s_unidad->id)->first();
            // if(!isset($Unidrang->id)){
            //     Unidrang::create([
            //             'rangonpt_id' => $rango->id, 'unidad_id' => $s_unidad->id,
            //             'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1
            //         ]);
            // }

            // unir el rango unidad con el npt
            $error='';
            if($registro->id==37){
                $error=''; //17 37 38 57 58
            }
            $Urangnpt = Urangnpt::select(['urangnpts.id'])
            ->join('unidrangs','urangnpts.unidrang_id'.$error,'=','unidrangs.id')
            ->join('unidads','unidrangs.unidad_id','=','unidads.id')
            ->join('rangonpts','unidrangs.rangonpt_id','=','rangonpts.id')
            ->where('rangonpts.randesde', $registro->randesde)
            ->where('rangonpts.ranhasta', $registro->ranhasta)
            ->where('unidads.s_unidad', $registro->rangunid)
            ->where('npt_id', $registro->npt_id)->first();
           echo "Mnpt::create(['id'=>{$registro->id},
                    'medicame_id' => {$registro->medicame_id}, 'urangnpt_id' => {$Urangnpt->id},
                    'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1
                ]);<br>";
                //echo $registro->npt_id.'<br>';
            if (!isset($Urangnpt->id)) {
                // Urangnpt::create([
                //     'unidrang_id' => $Unidrang->id, 'npt_id' => $registro->npt_id,
                //     'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1
                // ]);
            }
        }

        // foreach (Rangonpt::get() as $registro) {
        //     echo "Rangonpt::create([
        //         'randesde' => {$registro->randesde}, 'ranhasta' => {$registro->ranhasta},
        //         'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1
        //     ]);<br>";
        // }

        // foreach (Unidrang::get() as $registro) {
        //     echo "Unidrang::create([
        //         'unidad_id' => {$registro->unidad_id}, 'rangonpt_id' => {$registro->rangonpt_id},
        //         'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1
        //     ]);<br>";
        // }

        // foreach (Urangnpt::get() as $registro) {
        //     echo "Urangnpt::create([
        //         'npt_id' => {$registro->npt_id}, 'unidrang_id' => {$registro->unidrang_id},
        //         'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1
        //     ]);<br>";
        // }


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
                    ['data' => 'nombre', 'name' => 'mnpts.nombre'],
                    ['data' => 'randesde', 'name' => 'mnpts.randesde'],
                    ['data' => 'ranhasta', 'name' => 'mnpts.ranhasta'],
                    ['data' => 'rangunid', 'name' => 'mnpts.rangunid'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablamnpt',
                'permisox' => 'mnpt',
                'routxxxx' => 'mnpt',
                'parametr' => [$medicame],
            ],

        ];
        $this->opciones['accionxx'] = 'index';
        //return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }


    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {
        $padrexxx = 0;
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $accionxx;
        // indica si se esta actualizando o viendo
        if ($nombobje != '') {
            $this->opciones[$nombobje] = $objetoxx;
            $padrexxx = $objetoxx->npt_id;
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
