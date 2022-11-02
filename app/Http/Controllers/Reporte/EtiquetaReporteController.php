<?php

namespace App\Http\Controllers\Reporte;

use App\Http\Controllers\Controller;
use App\Models\Reportes\Orden;
use App\Traits\Alertas\AlertasTrait;
use App\Traits\Pestanias\ProduccionTrait;
use App\Traits\Reporte\EtiquetasTrait;
use Illuminate\Http\Request;
use App\Traits\Pdfs\PdfTrait;


class EtiquetaReporteController extends Controller
{
    use ProduccionTrait;
    use EtiquetasTrait;
    use AlertasTrait;
    use PdfTrait;
    private $opciones;
    private $bitacora;

    public function __construct()
    {
        $this->opciones['permisox'] = 'etiqueta';
        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar']);

        $this->opciones['vocalesx'] = ['Á', 'É', 'Í', 'Ó', 'Ú'];
        $this->opciones['pestpadr'] = 1; // darle prioridad a las pestañas
        $this->opciones['tituhead'] = 'Etiquetas';
        $this->opciones['routxxxx'] = 'etiqueta';
        $this->opciones['slotxxxx'] = 'etiqueta';
        $this->opciones['rutacarp'] = 'Reporte.';
        $this->opciones['perfilxx'] = 'sinperfi';
        $this->opciones['parametr'] = [];
        $this->opciones['carpetax'] = 'Etiquetas';
        /** botones que se presentan en los formularios */
        $this->opciones['botonesx'] = $this->opciones['rutacarp'] . 'Acomponentes.Botones.botonesx';
        /** informacion que se va a mostrar en la vista */
        $this->opciones['formular'] = $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.formulario.formulario';
        /** ruta que arma el formulario */
        $this->opciones['rutarchi'] = $this->opciones['rutacarp'] . 'Acomponentes.Acrud.index';



        $this->opciones['tituloxx'] = "INFORMACI{$this->opciones['vocalesx'][3]}N";
        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A ALISTAMIENTO', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }

    public function indexreporte()
    {
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO ',
                'titulist' => 'Listado de Etiquetas',
                'archdttb' => $this->opciones['rutacarp'] . 'Acomponentes.Adatatable.index',
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', []),
                'cabecera' => [
                    [
                        ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'CEDULA', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'NOMBRES', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'APELLIDOS', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'CLINICA', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],

                        ['td' => 'ORDEN DE SERVICIO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],

                    ]
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'cformulas.id'],
                    ['data' => 'cedula', 'name' => 'pacientes.cedula'],
                    ['data' => 'nombres', 'name' => 'pacientes.nombres'],
                    ['data' => 'apellidos', 'name' => 'pacientes.apellidos'],
                    ['data' => 'clinica', 'name' => 'clinicas.clinica'],
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
            $request->botonesx = $this->opciones['rutacarp'] .  $this->opciones['carpetax'] . '.Botones.acciones';
            $request->estadoxx = 'layouts.components.botones.estadosx';
            return $this->getTerminados($request);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function view($dataxxxx)
    {
        $this->opciones['rutarchi'] = $this->opciones['rutacarp'] . 'Acomponentes.Acrud.' . $dataxxxx['accionxx'][0];
        $this->opciones['formular'] = $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.Formulario.' . $dataxxxx['accionxx'][1];
        $this->opciones['ruarchjs'] = [
            ['jsxxxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.Js.js']
        ];
        if ($dataxxxx['modeloxx'] != '') {
            $this->opciones['modeloxx'] = $dataxxxx['modeloxx'];
            $this->opciones['parametr'] = [$dataxxxx['modeloxx']->id];
        }
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FiDatosBasico $objetoxx
     * @return \Illuminate\Http\Response
     */
    public function show(Orden $objetoxx)
    {


        return $this->view(['modeloxx' => $objetoxx, 'accionxx' => ['ver', 'formulario']]);
    }
}
