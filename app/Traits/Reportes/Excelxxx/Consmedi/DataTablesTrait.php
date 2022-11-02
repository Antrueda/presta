<?php

namespace App\Traits\Reportes\Excelxxx\Consmedi;



/**
 * Este trait permite armar las consultas para ubicacion que arman las datatable
 */
trait DataTablesTrait
{
    /**
     * grabar o actualizar registros para paises
     *
     * @param array $dataxxxx
     * @return $usuariox
     */
    public function getTablas()
    {

       $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO INOFRME',
                'titulist' => 'LISTA DE INFORME',
                'archdttb' =>$this->opciones['rutacarp'] . 'Acomponentes.Adatatable.index',
                'vercrear' => true,
                'urlxxxxx' => route($this->opciones['routxxxx'] . '.listaxxx', []),
                'permtabl' => [
                   $this->opciones['permisox'] . '-leer',
                   $this->opciones['permisox'] . '-crear',
                   $this->opciones['permisox'] . '-editar',
                   $this->opciones['permisox'] . '-borrar',
                   $this->opciones['permisox'] . '-activar',
                ],
                'cabecera' => [
                    [
                        ['td' => 'ACCIONES', 'widthxxx' => 200, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ID', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'DEPARTAMENTO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                        ['td' => 'ESTADO', 'widthxxx' => 0, 'rowspanx' => 1, 'colspanx' => 1],
                    ]
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'sis_departams.id'],
                    ['data' => 's_departamento', 'name' => 'sis_departams.s_departamento'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'datatable',
                'permisox' =>$this->opciones['permisox'],
                'routxxxx' =>$this->opciones['routxxxx'],
                'parametr' => [],
            ]
        ];
       $this->opciones['ruarchjs'] = [
            ['jsxxxxxx' =>$this->opciones['rutacarp'] .$this->opciones['carpetax'] . '.Js.tabla']
        ];
    }
}
