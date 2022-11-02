<?php

namespace App\Traits\Reportes\Excelxxx\Consmedi;

use App\Exports\ConsumoMedicamentoExport;
use App\Http\Requests\Reportes\Excelxxx\ReporteExcelCreateRequest;
use App\Models\Formulaciones\Dfmlote;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Este trait permite armar las consultas para ubicacion que arman las datatable
 */
trait ControllerTrait
{
    public function create()
    {
        $this->getBotones(['leerxxxx', [], 1, "{$this->opciones['titucont']}", 'btn btn-sm btn-primary']);
        return $this->view(['modeloxx' => '', 'accionxx' => ['crear', 'formulario'],]);
    }

    public function store(ReporteExcelCreateRequest $request)
    {
        if (ob_get_contents()) ob_end_clean();
        ob_start();

        $this->opciones['modeloxx']=Dfmlote::whereBetween('created_at', ["{$request->fechdesd} 00:00:00", "{$request->fechasta} 23:59:59"])->get();
        if (count($this->opciones['modeloxx'])==0) {
            return redirect()
            ->route('consmedi', [])
            ->with('info', 'El rango seleccionado no tiene información para exportar');
        }

        return Excel::download(new ConsumoMedicamentoExport($this->opciones), 'consumo_medicamento de '.$request->fechdesd.' hasta '.$request->fechasta.'.xlsx');
        // $this->opciones['modeloxx']= Dfmlote::whereBetween('created_at', ["$request->fechdesd 00:00:00", "$request->fechasta 23:59:59"])->get();
        // $this->getBotones(['imprimir', [], 1, "GUARDAR {$this->opciones['titucont']}", 'btn btn-sm btn-primary']);
        // return $this->view(['accionxx' => ['imprimir', 'exportar'],]);
    }
}
