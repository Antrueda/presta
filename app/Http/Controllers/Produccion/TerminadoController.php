<?php

namespace App\Http\Controllers\Produccion;

use App\Helpers\Cformula\Dataformulario;
use App\Http\Controllers\Controller;
use App\Http\Requests\Produccion\TerminadoCrearRequest;
use App\Http\Requests\Produccion\TerminadoEditarRequest;
use App\Models\Formulaciones\Cformula;
use App\Models\Produccion\Terminado;
use App\Models\Sistema\SisEsta;
use App\Traits\Alertas\AlertasTrait;
use App\Traits\Pestanias\ProduccionTrait;
use App\Traits\Produccion\TerminadoTrait;
use Illuminate\Http\Request;

class TerminadoController extends Controller
{
    private $opciones;
    use ProduccionTrait;
    use TerminadoTrait;
    use AlertasTrait;
    public function __construct()
    {
        $this->opciones = [
            'cardhead' => 'PRODUCTOS TERMINADOS',
            'permisox' => 'controlt',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'Crear: Producto Terminado',
            'slotxxxx' => 'controlt',
            'carpetax' => 'Terminado',
            'indecrea' => false,
            'esindexx' => false
        ];
        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar|']);

        $this->opciones['rutaxxxx'] = 'controlt';
        $this->opciones['routnuev'] = 'controlt';
        $this->opciones['routxxxx'] = 'controlt';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A PRODUCTOS', 'clasexxx' => 'btn btn-sm btn-primary'
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
        $this->opciones['indecrea'] = false;
        $this->opciones['esindexx'] = true;
        $this->opciones['accionxx'] = 'index';
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO PRODUCTO TERMINADO',
                'titulist' => 'LISTA PRODUCTOS TERMINADOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'revisado', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.terminad'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadosx'],
                ],
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => 'api/produccion/terminados',
                'cabecera' => [

                    ['td' => 'LOTE INTERNO'],
                    ['td' => 'CEDULA'],
                    ['td' => 'NOMBRES'],
                    ['td' => 'APELLIDOS'],
                    ['td' => 'CLINICA'],
                    ['td' => 'TERMINADO'],
                    ['td' => 'ESTADO'],

                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'cformulas.id'],
                    ['data' => 'cedula', 'name' => 'pacientes.cedula'],
                    ['data' => 'nombres', 'name' => 'pacientes.nombres'],
                    ['data' => 'apellidos', 'name' => 'pacientes.apellidos'],
                    ['data' => 'clinica', 'name' => 'clinicas.clinica'],
                    ['data' => 'revisado', 'name' => 'revisado'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaordenes',
                'permisox' => 'controlt',
                'routxxxx' => 'controlt',
                'parametr' => [],
            ],

        ];

        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function indexreporte()
    {
        $this->opciones['indecrea'] = false;
        $this->opciones['esindexx'] = true;
        $this->opciones['accionxx'] = 'index';
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO PRODUCTO TERMINADO',
                'titulist' => 'LISTA PRODUCTOS TERMINADOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapiprint'],
                    ['campoxxx' => 'revisado', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.terminad'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadosx'],
                ],
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => 'api/produccion/terminados',
                'cabecera' => [

                    ['td' => 'LOTE INTERNO'],
                    ['td' => 'CEDULA'],
                    ['td' => 'NOMBRES'],
                    ['td' => 'APELLIDOS'],
                    ['td' => 'CLINICA'],
                    ['td' => 'TERMINADO'],
                    ['td' => 'ESTADO'],

                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'cformulas.id'],
                    ['data' => 'cedula', 'name' => 'pacientes.cedula'],
                    ['data' => 'nombres', 'name' => 'pacientes.nombres'],
                    ['data' => 'apellidos', 'name' => 'pacientes.apellidos'],
                    ['data' => 'clinica', 'name' => 'clinicas.clinica'],
                    ['data' => 'revisado', 'name' => 'revisado'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaordenes',
                'permisox' => 'controlt',
                'routxxxx' => 'controlt',
                'parametr' => [],
            ],

        ];

        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    private function view($dataxxxx)
    {
        $this->opciones['pedelies'] = [];
        $this->opciones['sinoxxxx'] = ['' => '..::Seleccione::..', 1 => 'NO', 2 => 'SI'];
        $this->opciones['concepto'] = [];
        $this->opciones['pesoteor'] = number_format($this->peso($dataxxxx['procesox']), 2, ".", "");
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $dataxxxx['accionxx'];
        // indica si se esta actualizando o viendo
        if ($dataxxxx['objetoxx'] != '') {
            $this->opciones['pedelies'] = [2 => 'SI'];
            if ($dataxxxx['objetoxx']->limitesx == 1) {
                $this->opciones['pedelies'] = [1 => 'NO'];
            }
            $this->opciones['modeloxx'] = $dataxxxx['objetoxx'];
        }

        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($padrexxx)
    {
        $this->opciones['procesox'] = [$padrexxx => 'Formulación: ' . $padrexxx];
        $this->opciones['indecrea'] = false;
        $this->opciones['clinicac'] = true;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'GRABAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => ['reporpdf.etiquetanpt', [$padrexxx]],
                'formhref' => 4, 'tituloxx' => 'VER ETIQUETA', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(['objetoxx' => '', 'accionxx' => 'Crear', 'procesox' => $padrexxx]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TerminadoCrearRequest $request)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, '', 'Producto teminado creado con éxito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Terminado $objetoxx)
    {
        $this->opciones['procesox'] = [$objetoxx->cformula->id => 'Formulación: ' . $objetoxx->cformula->id];
        $this->opciones['clinicax'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
        [
            'mostrars' => true, 'accionxx' => '', 'routingx' => ['reporpdf.etiquetanpt', [$objetoxx->cformula->id]],
            'formhref' => 4, 'tituloxx' => 'VER ETIQUETA', 'clasexxx' => 'btn btn-sm btn-primary'
        ];
        return $this->view(['objetoxx' => $objetoxx, 'accionxx' => 'Ver', 'procesox' => $objetoxx->cformula->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Terminado $objetoxx)
    {
        $this->opciones['procesox'] = [$objetoxx->cformula->id => 'Formulación: ' . $objetoxx->cformula->id];
        $this->opciones['clinicax'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => ['reporpdf.etiquetanpt', [$objetoxx->cformula->id]],
                'formhref' => 4, 'tituloxx' => 'VER ETIQUETA', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(['objetoxx' => $objetoxx, 'accionxx' => 'Editar', 'procesox' => $objetoxx->cformula->id]);
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $cabecera = Terminado::transaccion($dataxxxx, $objectx);
        if ($objectx == '') {
            $this->getAlerta(['objetoxx'=>$cabecera->cformula,'tipoacci'=>1]);
        }
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$cabecera->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TerminadoEditarRequest  $request, Terminado $objetoxx)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, $objetoxx, 'Producto terminado actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terminado $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
    private function peso($procesox)
    {

        $dataform = new Dataformulario();
        $formulac = Cformula::where('id', $procesox)->first();
        $calculos = $dataform->calculos($formulac);
        return $calculos['pesoteor'];
    }
    public function getPesoreal(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->validar($request->all()));
        }
    }

}
