<?php

namespace App\Http\Controllers\Clinicas;

use App\Helpers\Fechas;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pacientes\PacienteCrearRequest;
use App\Http\Requests\Pacientes\PacienteEditarRequest;
use App\Models\Administracion\Ep;
use App\Models\Administracion\Genero;
use App\Models\Administracion\Servicio;
use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Npt;
use App\Models\Pacientes\Paciente;
use App\Models\Sistema\Departamento;
use App\Models\Sistema\Municipio;
use App\Models\Sistema\SisEsta;
use App\Traits\ClinicaTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    private $opciones;
    use ClinicaTrait;
    public function __construct()
    {
        $this->opciones['pestpadr'] = 3;
        $this->opciones['parapest'] = [0,0,0,0];// paramentros para las pestañas
        $this->opciones['permisox'] = 'paciente';
        $this->opciones['routxxxx'] = 'paciente';
        $this->opciones['rutacarp'] = 'Clinicas.';
        $this->opciones['carpetax'] = 'Paciente';
        $this->opciones['slotxxxx'] =  $this->opciones['permisox'];
        $this->opciones['slotxxxy'] = 'paciente';
        $this->opciones['tabsxxxx'] = 'Clinicas.tabsxxxx.paciente.header';
        $this->opciones['tituloxx'] = 'PACIENTE';
        $this->opciones['fechcrea'] = '';
        $this->opciones['fechedit'] = '';
        $this->opciones['usercrea'] = '';
        $this->opciones['useredit'] = '';
        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar']);


        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A PACIENTES', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SisClinica $padrexxx)
    {

        $objetoxx=Auth::user();
        $padrexxx=$objetoxx->sis_clinica;
        $this->opciones['cardheap'] = 'SUCURSAL: ' . $padrexxx->sucursal;
        $this->opciones['cardhead'] = 'CLINICA: ' . $padrexxx->clinica->clinica;
        $this->opciones['botoform'][0]['routingx'][1] = $padrexxx->id;
        $this->opciones['parametr'] = [$padrexxx->id];
        $this->opciones['accionxx'] = 'index';
        $this->opciones['parapest'][0] = $padrexxx->id;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO PACIENTE',
                'titulist' => 'LISTA DE PACIENTES',
                'dataxxxx' => [],
                'vercrear' => true,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', [$padrexxx->id]),
                'cabecera' => [
                    [
                        ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'CEDULA', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'NOMBRES', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'APELLIDOS', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ESTADO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'pacientes.id'],
                    ['data' => 'cedula', 'name' => 'pacientes.cedula'],
                    ['data' => 'nombres', 'name' => 'pacientes.nombres'],
                    ['data' => 'apellidos', 'name' => 'pacientes.apellidos'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablapacientes',
                'permisox' => 'paciente',
                'routxxxx' => 'paciente',
                'parametr' => [$padrexxx->id],
            ],

        ];

        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function getListado(Request $request,SisClinica $padrexxx)
    {

        if ($request->ajax()) {
            $request->padrexxx=$padrexxx->id;
            $request->routexxx = [$this->opciones['routxxxx'],'formular'];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getPacientes($request);
        }
    }
    private function view($dataxxxx)
    {

        $this->opciones['parapest'][0]=$dataxxxx['padrexxx']->id;
        $this->opciones['clinicai'] = SisClinica::getclinica(false, false);
        $this->opciones['cardheap'] = 'SUCURSAL: ' . $dataxxxx['padrexxx']->sis_clinica;
        $this->opciones['cardhead'] = 'CLINICA: ' . $dataxxxx['padrexxx']->sis_clinica;
        $this->opciones['parametr'] =$this->opciones['padrexxx'] = $dataxxxx['padrexxx']->id;
        $this->opciones['generoxx'] = Genero::combo(['cabecera' => true, 'ajaxxxxx' => false]);
        $this->opciones['epsxxxxx'] = Ep::combo(['cabecera' => true, 'ajaxxxxx' => false]);
        $this->opciones['nptxxxxx'] = Npt::combo(['cabecera' => true, 'ajaxxxxx' => false]);
        $this->opciones['servicio'] = Servicio::combo(['cabecera' => true, 'ajaxxxxx' => false]);
        $this->opciones['departam'] = Departamento::combo(['cabecera' => true, 'ajaxxxxx' => false]);
        $departam = '';
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $dataxxxx['accionxx'];
        // indica si se esta actualizando o viendo
        if ($dataxxxx['modeloxx'] != '') {
            $this->opciones['modeloxx'] = $dataxxxx['modeloxx'];
            $dataxxxx['modeloxx']->departamento_id = $dataxxxx['modeloxx']->municipio->departamento_id;
            $departam = $dataxxxx['modeloxx']->departamento_id;
            $this->opciones['fechcrea'] = $dataxxxx['modeloxx']->created_at;
            $this->opciones['fechedit'] = $dataxxxx['modeloxx']->updated_at;
            $this->opciones['usercrea'] = $dataxxxx['modeloxx']->creador->name;
            $this->opciones['useredit'] = $dataxxxx['modeloxx']->editor->name;

            $this->opciones['parametr'] = [$dataxxxx['modeloxx']->id];
            $this->opciones['parapest'][1]=$dataxxxx['modeloxx']->id;
        }
        $this->opciones['botoform'][0]['routingx'][1] = $this->opciones['padrexxx'];

        $this->opciones['municipi'] = Municipio::combo(['cabecera' => true, 'ajaxxxxx' => false, 'departam' => $departam]);
        // Se arma el titulo de acuerdo al array opciones
        if (auth()->user()->can($this->opciones['permisox'] . '-crear')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'] . '.nuevo', [$dataxxxx['padrexxx']->id]],
                    'formhref' => 2, 'tituloxx' => 'IR A CREAR NUEVO REGISTRO', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }


        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SisClinica $padrexxx)
    {
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(['modeloxx' => '', 'accionxx' => 'Crear', 'padrexxx' => $padrexxx]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteCrearRequest $request)
    {

        return $this->grabar(
            [
                'requestx' => $request,
                'modeloxx' => '',
                'infoxxxx' => 'Registro creado con éxito'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $objetoxx)
    {
        $padrexxx=$objetoxx->sis_clinica;
        $this->opciones['botoform'][0]['routingx'][1] = $padrexxx->id;
        $this->opciones['parametr'] = [$padrexxx, $objetoxx->id];
        $this->opciones['tituloxx'] = 'Editar: Paciente';
        $this->opciones['paciente'] = $objetoxx;
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Ver', 'padrexxx' => $padrexxx]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $objetoxx)
    {
        $this->opciones['pestpadr'] = 4;
        $padrexxx=$objetoxx->sis_clinica;
        $this->opciones['botoform'][0]['routingx'][1] = $padrexxx->id;
        $this->opciones['parametr'] = [$padrexxx->id, $objetoxx->id];
        $this->opciones['tituloxx'] = 'Editar: Paciente';
        $this->opciones['paciente'] = $objetoxx;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$padrexxx, $objetoxx->id]],
                'formhref' => 1, 'tituloxx' => 'kkkk', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
            return $this->view(['modeloxx' => $objetoxx, 'accionxx' => 'Editar', 'padrexxx' => $padrexxx]);
    }

    private function grabar($dataxxxx)
    {
        $paciente = Paciente::transaccion($dataxxxx);

        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$paciente->id])
            ->with('info', $dataxxxx['infoxxxx']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( PacienteEditarRequest  $request, Paciente $objetoxx)
    {
        return $this->grabar(
            [
                'requestx' => $request,
                'modeloxx' => $objetoxx,
                'infoxxxx' => 'Registro actualizado con éxito'
            ]
        );
    }

    public function inactivate(Paciente $objetoxx)
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


    public function destroy(Request $request, Paciente $objetoxx)
    {
        $objetoxx->update(['sis_esta_id' => 2, 'user_edita_id' => Auth::user()->id]);
        return redirect()
            ->route($this->opciones['permisox'], [$objetoxx->sis_clinica_id])
            ->with('info', 'Rango inactivado correctamente');
    }



    public function getCalcularEdade(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(Fechas::getEdad($request));
        }
    }

    public function getMunicipio(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(Municipio::combo(['ajaxxxxx'=>true,'cabecera'=>true,'departam'=>$request->departam]));
        }
    }
}
