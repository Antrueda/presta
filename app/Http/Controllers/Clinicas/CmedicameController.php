<?php

namespace App\Http\Controllers\Clinicas;

use App\Helpers\Clinicas;
use App\Http\Controllers\Controller;

use App\Models\Clinica\SisClinica;
use App\Traits\ClinicaTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CmedicameController extends Controller
{
    use ClinicaTrait;
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'parapest' => [0,0,0,0],// paramentros para las pestañas
            'pestpadr' => 3,
            'cardhead' => '', // titulo para las pestañas
            'cardheap' => '',
            'permisox' => 'cmedicame',
            'parametr' => [],
            'rutacarp' => 'Clinicas.',
            'tituloxx' => 'clinica',
            'tabsxxxx' => 'Clinicas.tabsxxxx.clinica.header',
            'slotxxxy' => 'clinicax',
            'slotxxxx' => 'cmedicame',
            'carpetax' => 'Medicamento',
            'indecrea' => false,
            'esindexx' => false,
            'rowscols' => 'rowspancolspan',
        ];

       $this->middleware (['permission:' . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar']);
        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'cmedicame';
        $this->opciones['routnuev'] = 'cmedicame';
        $this->opciones['routxxxx'] = 'cmedicame';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A CLINICAS', 'clasexxx' => 'btn btn-sm btn-primary'
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
        $this->opciones['sucursal'] = $padrexxx->id;
        $this->opciones['parapest'][0] = $padrexxx->id;
        $this->opciones['parametr'] = $padrexxx->id;
        $this->opciones['cardhead'] = 'CLÍNICA: '.$padrexxx->clinica->clinica;
        $this->opciones['cardheap'] = 'SUCURSAL: '.$padrexxx->sucursal;
        $this->opciones['tablasxx'][] =
            [

                'titunuev' => 'NUEVA CLINICA',
                'titulist' => 'LISTA DE MEDICAMENTOS',
                'dataxxxx' => [

                ],
                'accitabl' => true,
                'vercrear' => false,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.asignado', $this->opciones['parametr']),
                'cabecera' => [
                    [
                    ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'MEDICAMENTO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => '¿COBRAR SEPARADO?', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ESTADO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'medicames.id'],
                    ['data' => 'nombgene', 'name' => 'medicames.nombgene'],
                    ['data' => 'cobrsepa', 'name' => 'cobrsepa'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'cmedicamentos',
                'permisox' => $this->opciones['permisox'],
            ];
        //
        if (User::find(Auth::user()->id)->can($this->opciones['permisox'] . '-asiganar')) {
            $this->opciones['tablasxx'][] = [
                'titunuev' => 'NUEVA CLINICA',
                'titulist' => 'SELECCIONE EL MEDICAMENTO QUE DESEE ADICIONAR A LA SUCURSAL: ' . $padrexxx->sucursal,
                'dataxxxx' => [
                ],
                'vercrear' => false,
                'accitabl' => false,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.asignar', $this->opciones['parametr']),
                'cabecera' => [
                    [
                    ['td' => 'ID' , 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'MEDICAMENTO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ['td' => 'ESTADO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                ], 'columnsx' => [
                    // ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'medicames.id'],
                    ['data' => 'nombgene', 'name' => 'medicames.nombgene'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'medicamentos',
                'permisox' => $this->opciones['permisox'],
            ];
        }

        $this->opciones['clinicax'] = $padrexxx->id;

        $this->opciones['accionxx'] = 'index';
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function getAsignado(Request $request,$padrexxx)
    {
        if ($request->ajax()) {
            $request->padrexxx=$padrexxx;
            $request->routexxx = [$this->opciones['routxxxx']];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.botones.botonesapi';

                $request->cobrsepa = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.botones.cobrsepa';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getAsignados($request);
        }
    }
    public function getAsignar(Request $request,$padrexxx)
    {
        if ($request->ajax()) {
            $request->padrexxx=$padrexxx;
            $request->routexxx = [$this->opciones['routxxxx']];
            $request->botonesx = $this->opciones['rutacarp'] .
                $this->opciones['carpetax'] . '.botones.botonesapi';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getMedicametos($request);
        }
    }
    public function getInactivarMedicam( Request $request)
    {
        if ($request->ajax()) {
            return response()->json(Clinicas::getInactivarMedicam($request));
        }
    }

    public function getAsignarMedicame( Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->getAsignarMedicam($request));
        }
    }

}
