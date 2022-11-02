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

class UrolController extends Controller
{
    use UsuarioTrait;
    private $bitacora;
    private $opciones;

    public function __construct()
    {
        $this->opciones['permisox'] = 'uroles';
        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar']);

        $this->opciones['vocalesx'] = ['Á', 'É', 'Í', 'Ó', 'Ú'];
        $this->opciones['pestpadr'] = 3; // darle prioridad a las pestañas
        $this->opciones['tituhead'] = 'ROLES';
        $this->opciones['routxxxx'] = 'uroles';
        $this->opciones['slotxxxx'] = 'uroles';
        $this->opciones['perfilxx'] = 'sinperfi';
        $this->opciones['rutacarp'] = 'Sistema.Usuario.';
        $this->opciones['parametr'] = [];
        $this->opciones['carpetax'] = 'Urol';
        /** botones que se presentan en los formularios */
        $this->opciones['botonesx'] = $this->opciones['rutacarp'] . 'Acomponentes.Botones.botonesx';
        /** informacion que se va a mostrar en la vista */
        $this->opciones['formular'] = $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.formulario.formulario';
        /** ruta que arma el formulario */

        $this->opciones['estrateg'] = ['' => 'Seleccione'];

        $this->opciones['tituloxx'] = "ROL";
        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A ROLES', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }

    public function index(User $padrexxx)
    {
        $this->opciones['parametr'] = [$padrexxx->id];
        $this->opciones['padrexxx'] = $padrexxx->id;
        $this->opciones['rutarchi'] = $this->opciones['rutacarp'] . 'Acomponentes.Acrud.index';
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO USUARIO',
                'titulist' => 'LISTA DE ROLES ASIGNADOS',
                'archdttb' => $this->opciones['rutacarp'] . 'Acomponentes.Adatatable.index',
                'vercrear' => false,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listarol', [$padrexxx->id]),
                'cabecera' => [
                    [
                        ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ROL', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ESTADO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'roles.id'],
                    ['data' => 'name', 'name' => 'roles.name'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablauroles',
                'permisox' => $this->opciones['permisox'],
                'routxxxx' => $this->opciones['routxxxx'],
                'parametr' => [$padrexxx->id],
            ],
            [
                'titunuev' => 'NUEVO USUARIO',
                'titulist' => 'SELECCIONE EL PERMISO QUE DESEA ASIGNAR',
                'archdttb' => $this->opciones['rutacarp'] . 'Acomponentes.Adatatable.index',
                'vercrear' => false,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', []),
                'cabecera' => [
                    [
                        ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ROL', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                ],
                'columnsx' => [
                    ['data' => 'id', 'name' => 'roles.id'],
                    ['data' => 'name', 'name' => 'roles.name'],
                ],
                'tablaxxx' => 'tablaroles',
                'permisox' => $this->opciones['permisox'],
                'routxxxx' => $this->opciones['routxxxx'],
                'parametr' => [$padrexxx->id],
            ],

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
            return $this->getRoles($request); //Por UPI

        }
    }

    public function getListadoRoles(Request $request)
    {
        if ($request->ajax()) {

            $request->routexxx = [$this->opciones['routxxxx']];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.Botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getUroles($request); //Por UPI

        }
    }
}
