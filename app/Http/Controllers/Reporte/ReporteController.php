<?php

namespace App\Http\Controllers\Reporte;

use App\Http\Controllers\Controller;


class ReporteController extends Controller
{
    public function __construct()
    {
        $this->opciones['permisox'] = 'reportes';
        $this->middleware(['permission:'
                . $this->opciones['permisox'] . '-modulo']);

        $this->opciones['vocalesx'] = ['Á', 'É', 'Í', 'Ó', 'Ú'];
        $this->opciones['pestpadr'] = 1; // darle prioridad a las pestañas
        $this->opciones['tituhead'] = 'REPORTES';
        $this->opciones['routxxxx'] = 'reporte';
        $this->opciones['slotxxxx'] = 'reporte';
        $this->opciones['perfilxx'] = 'sinperfi';
        $this->opciones['rutacarp'] = 'Reporte.';
        $this->opciones['parametr'] = [];
        $this->opciones['carpetax'] = 'Reporte';
        /** botones que se presentan en los formularios */
        $this->opciones['botonesx'] = $this->opciones['rutacarp'] . 'Acomponentes.Botones.botonesx';
        /** informacion que se va a mostrar en la vista */
        $this->opciones['formular'] = $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.formulario.formulario';
        /** ruta que arma el formulario */
        $this->opciones['rutarchi'] = $this->opciones['rutacarp'] . 'Acomponentes.Acrud.reporte';

        $this->opciones['tituloxx'] = "REPORTES";
        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A S', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }

    public function index()
    {


        $this->opciones['ruarchjs'] = [

        ];
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

}
