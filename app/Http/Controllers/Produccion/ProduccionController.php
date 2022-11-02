<?php

namespace App\Http\Controllers\Produccion;

use App\Http\Controllers\Controller;
use App\Traits\Pestanias\ProduccionTrait;
use Illuminate\Support\Facades\Auth;

class ProduccionController extends Controller
{
    private $opciones;
    use ProduccionTrait;
    public function __construct()
    {
        $this->opciones = [
            'cardhead' => 'PRODUCTOS TERMINADOS',
            'permisox' => 'produccion',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'Crear: Producto Terminado',
            'slotxxxx' => 'produccion',
            'carpetax' => 'Terminado',
            'indecrea' => false,
            'esindexx' => false
        ];
        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-modulo']);

        $this->opciones['rutaxxxx'] = 'produccion';
        $this->opciones['routnuev'] = 'produccion';
        $this->opciones['routxxxx'] = 'produccion';

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
                'vercrear' => true,
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
                'permisox' => 'produccion',
                'routxxxx' => 'produccion',
                'parametr' => [],
            ],

        ];

        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

}
