<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracion\Usuario\UsuarioCrearRequest;
use App\Http\Requests\Administracion\Usuario\UsuarioEditarRequest;
use App\Models\Clinica\SisClinica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sistema\SisEsta;
use App\Traits\Usuarios\UsuarioTrait;
use App\User;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    use UsuarioTrait;
    private $bitacora;
    private $opciones;

    public function __construct()
    {
        $this->opciones['permisox'] = 'usuarios';
        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-polidato|'
            . $this->opciones['permisox'] . '-borrar']);

        $this->opciones['vocalesx'] = ['Á', 'É', 'Í', 'Ó', 'Ú'];
        $this->opciones['pestpadr'] = 1; // darle prioridad a las pestañas
        $this->opciones['tituhead'] = 'USUARIOS';
        $this->opciones['routxxxx'] = 'usuarios';
        $this->opciones['slotxxxx'] = 'usuarios';
        $this->opciones['perfilxx'] = 'sinperfi';
        $this->opciones['rutacarp'] = 'Sistema.Usuario.';
        $this->opciones['parametr'] = [];
        $this->opciones['carpetax'] = 'Usuario';
        /** botones que se presentan en los formularios */
        $this->opciones['botonesx'] = $this->opciones['rutacarp'] . 'Acomponentes.Botones.botonesx';
        /** informacion que se va a mostrar en la vista */
        $this->opciones['formular'] = $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.Formulario.formulario';
        /** ruta que arma el formulario */

        $this->opciones['estrateg'] = ['' => 'Seleccione'];

        $this->opciones['tituloxx'] = "POL".$this->opciones['vocalesx'][2]."TICA DE DATOS";
        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A USUARIOS', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }

    public function index()
    {

        $this->opciones['rutarchi'] = $this->opciones['rutacarp'] . 'Acomponentes.Acrud.index';
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO USUARIO',
                'titulist' => 'LISTA DE USUARIOS',
                'archdttb' => $this->opciones['rutacarp'] . 'Acomponentes.Adatatable.index',
                'vercrear' => true,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', []),
                'cabecera' => [
                    [
                        ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'NOMBRES', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'E-MAIL', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'SUCURSAL', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],

                        ['td' => 'ESTADO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'users.id'],
                    ['data' => 'name', 'name' => 'users.name'],
                    ['data' => 'email', 'name' => 'users.email'],
                    ['data' => 'sucursal', 'name' => 'sis_clinicas.sucursal'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'datatable',
                'permisox' => $this->opciones['permisox'],
                'routxxxx' => $this->opciones['routxxxx'],
                'parametr' => [],
            ]
        ];
        $this->opciones['ruarchjs'] = [
            ['jsxxxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.Js.tabla']
        ];

        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function getListado(Request $request)
    {
        if ($request->ajax()) {

            $request->routexxx = [$this->opciones['routxxxx']];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.Botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getUsuarios($request); //Por UPI

        }
    }
    private function grabar($dataxxxx, $objetoxx, $infoxxxx,$redirect)
    {
        return redirect()
            ->route($this->opciones['routxxxx'] . '.'.$redirect, [User::transaccion($dataxxxx, $objetoxx)->id])
            ->with('info', $infoxxxx);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function view($dataxxxx)
    {
        $this->opciones['rutarchi'] = $this->opciones['rutacarp'] . 'Acomponentes.Acrud.'.$dataxxxx['accionxx'][0];
        $this->opciones['formular'] = $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.Formulario.'.$dataxxxx['accionxx'][1];
        $this->opciones['ruarchjs'] = [
            ['jsxxxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.Js.js'],
        ];
        $this->opciones['rolesxxx'] = Role::get();
        $this->opciones['clinicid'] = SisClinica::combo( true, false);
        $this->opciones['quimfarm'] = [2=>'NO',1=>'SI'];
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
       // $this->opciones['accionxx'] = $dataxxxx['accionxx'];
        // indica si se esta actualizando o viendo
        $this->opciones['pestpadr'] = 2; // darle prioridad a las pestañas

        if ($dataxxxx['modeloxx'] != '') {
            $this->opciones['parametr'] = [$dataxxxx['modeloxx']->id];
            $this->opciones['pestpadr'] = 3; // darle prioridad a las pestañas
            $this->opciones['modeloxx'] = $dataxxxx['modeloxx'];

        }        // Se arma el titulo de acuerdo al array opciones
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function create()
    {
        $this->opciones['tituloxx'] = "USUARIO";
        $this->opciones['slotxxxx'] = 'usuarioc';
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];

        return $this->view(['modeloxx' => '', 'accionxx' => ['crear', 'formulario']]);
    }
    public function store(UsuarioCrearRequest $request)
    {
        return $this->grabar($request->all(), '', 'Usuario creado con exito','editar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FiDatosBasico $objetoxx
     * @return \Illuminate\Http\Response
     */
    public function show(User $objetoxx)
    {
        $this->opciones['slotxxxx'] = 'usuarioe';
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => ['ver', 'formulario']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FiDatosBasico $objetoxx
     * @return \Illuminate\Http\Response
     */
    public function edit(User $objetoxx)
    {
        $this->opciones['tituloxx'] = "USUARIO";
        $this->opciones['slotxxxx'] = 'usuarioe';
        if (auth()->user()->can($this->opciones['permisox'] . '-editar')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'MODIFICAR REGISTRO', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => ['editar', 'formulario']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FiDatosBasico $objetoxx
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioEditarRequest $request,  User $objetoxx)
    {

        return $this->grabar($request->all(), $objetoxx, 'Usuario actualizado con exito','editar');
    }/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FiDatosBasico $objetoxx
     * @return \Illuminate\Http\Response
     */
    public function polidatoe(User $objetoxx)
    {
        $this->opciones['slotxxxx'] = 'polidato';
        $this->opciones['botoform']=[];
        if (auth()->user()->can($this->opciones['permisox'] . '-polidato')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'ACEPTAR', 'routingx' => [$this->opciones['routxxxx'] . '.polidato', []],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => ['editar', 'polidatos']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FiDatosBasico $objetoxx
     * @return \Illuminate\Http\Response
     */
    public function polidatou(Request $request,  User $objetoxx)
    {
       $dataxxxx= $request->all();
       $dataxxxx['polidato_at']=date('Y-m-d H:m:s',time());
        return $this->grabar($dataxxxx, $objetoxx, 'Políticas aceptadas con exito','polidato');
    }

    public function inactivate(User $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];
        if (auth()->user()->can($this->opciones['permisox'] . '-borrar')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'INACTIVAR', 'routingx' => [$this->opciones['routxxxx'] . '.borrar', []],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }
        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => ['destroy', 'destroy']]);
    }
    public function destroy(Request $request, User $objetoxx)
    {

        $objetoxx->update(['sis_esta_id' => 2, 'user_edita_id' => Auth::user()->id]);
        return redirect()
            ->route($this->opciones['permisox'], [])
            ->with('info', 'Sucursal inactivada correctamente');
    }
}
