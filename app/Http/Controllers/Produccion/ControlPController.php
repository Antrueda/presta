<?php

namespace App\Http\Controllers\Produccion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Produccion\ControlpCrearRequest;
use App\Http\Requests\Produccion\ControlpEditarRequest;
use App\Models\Formulaciones\Cformula;
use App\Models\Formulaciones\Orden;
use App\Models\Produccion\Proceso;
use App\Models\Sistema\SisEsta;
use App\Traits\Alertas\AlertasTrait;
use App\Traits\Pestanias\ProduccionTrait;

class ControlPController extends Controller
{
    private $opciones;
    use ProduccionTrait;
    use AlertasTrait;
    public function __construct()
    {
        $this->opciones = [
            'cardhead'=>'CONTROL EN PROCESOS',
            'permisox' => 'controlp',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'Control en proceso',
            'slotxxxx'=>'controlp',
            'carpetax'=>'Controlp',
            'indecrea'=>false,
            'esindexx'=>false
        ];

        $this->middleware(['permission:'
        . $this->opciones['permisox'] . '-leer|'
        . $this->opciones['permisox'] . '-crear|'
        . $this->opciones['permisox'] . '-editar|'
        . $this->opciones['permisox'] . '-borrar|']);
        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'controlp';
        $this->opciones['routnuev'] = 'controlp';
        $this->opciones['routxxxx'] = 'controlp';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A CONTROLES EN PROCESOS', 'clasexxx' => 'btn btn-sm btn-primary'
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
        $padrexxx='';
        $this->opciones['indecrea']=false;
        $this->opciones['esindexx']=true;
        $this->opciones['accionxx']='index';
        $this->opciones['padrexxx'] = $padrexxx;

        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO CONTROL DE PROCESO',
                'titulist' => 'LISTA CONTROL DE PROCESOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'revisado', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.controlp'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadosx'],
                    ['campoxxx' => 'medicame', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => 'api/produccion/procesos',
                'cabecera' =>[

                    ['td' => 'LOTE INTERNO'],
                    ['td' => 'CÉDULA'],
                    ['td' => 'NOMBRES'],
                    ['td' => 'APELLIDOS'],
                    ['td' => 'CLÍNICA'],
                    ['td' => 'CONTROL'],
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
                'permisox' => 'controlp',
                'routxxxx' => 'controlp',
                'parametr' => [1],
            ],

        ];
        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => $padrexxx
        ]);

       return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }


    public function indexreporte()
    {
        $padrexxx='';
        $this->opciones['indecrea']=false;
        $this->opciones['esindexx']=false;
        $this->opciones['accionxx']='index';
        $this->opciones['padrexxx'] = $padrexxx;

        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO CONTROL DE PROCESO',
                'titulist' => 'LISTA CONTROL DE PROCESOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapiprint'],
                    ['campoxxx' => 'revisado', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.controlp'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadosx'],
                    ['campoxxx' => 'medicame', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => 'api/produccion/procesos',
                'cabecera' =>[

                    ['td' => 'LOTE INTERNO'],
                    ['td' => 'CEDULA'],
                    ['td' => 'NOMBRES'],
                    ['td' => 'APELLIDOS'],
                    ['td' => 'CLINICA'],
                    ['td' => 'CONTROL'],
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
                'permisox' => 'controlp',
                'routxxxx' => 'controlp',
                'parametr' => [1],
            ],

        ];
        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => $padrexxx
        ]);

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
        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);


         return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($padrexxx)
    {
        $padrexxx= Cformula::find($padrexxx);
        if($padrexxx->proceso_id!=null){
            return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$padrexxx->proceso_id]);
        }

        $this->opciones['cformula'] = [$padrexxx->id=>'Formulación: '.$padrexxx->id];
        $this->opciones['indecrea']=false;
        $this->opciones['clinicac']=true;
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
    public function store(ControlpCrearRequest $request)
    {
        $dataxxxx = $request->all();
        $dataxxxx['ordepres']=Orden::ordendia();
        return $this->grabar($dataxxxx, '', 'Control en proceso creado con éxito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proceso $objetoxx)
    {
        $this->opciones['cformula'] = [$objetoxx->cformula_id=>'Formulación: '.$objetoxx->cformula_id];
        $this->opciones['clinicax'] =$objetoxx->id;
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
    public function edit(Proceso $objetoxx)
    {
        $this->opciones['cformula'] = [$objetoxx->cformula->id=>'Formulación: '.$objetoxx->cformula->id];
        $this->opciones['clinicax'] =$objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $cabecera=Proceso::transaccion($dataxxxx, $objectx);
        if ($objectx == '') {
            $this->getAlerta(['objetoxx'=>$cabecera->cformula,'tipoacci'=>5]);
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
    public function update(ControlpEditarRequest  $request, Proceso $objetoxx)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, $objetoxx, 'Control en proceso actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proceso $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];
        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';
        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }


}
