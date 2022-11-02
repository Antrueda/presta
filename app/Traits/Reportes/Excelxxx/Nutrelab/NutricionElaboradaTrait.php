<?php

namespace App\Traits\Reportes\Excelxxx\Nutrelab;

use App\Exports\NutricionesElaboradasExport;
use App\Http\Requests\Reportes\Excelxxx\ReporteExcelCreateRequest;
use App\Models\Pacientes\Paciente;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Este trait permite armar las consultas para ubicacion que arman las datatable
 */
trait NutricionElaboradaTrait
{
    use DataTrait;
    public function create()
    {
        ddd(4);
        $this->getBotones(['leerxxxx', [], 1, "{$this->opciones['titucont']}", 'btn btn-sm btn-primary']);
        return $this->view(['modeloxx' => '', 'accionxx' => ['crear', 'formulario'],]);
    }

    public function store(ReporteExcelCreateRequest $request)
    {
        if (ob_get_contents()) ob_end_clean();
        ob_start();
        $this->opciones['modeloxx'] = $this->getExcel(['requestx'=>$request]);
        if (count($this->opciones['modeloxx'])==0) {
            return redirect()
            ->route('nutrelab', [])
            ->with('info', 'El rango seleccionado no tiene información para exportar');
        }
        return Excel::download(new NutricionesElaboradasExport($this->opciones), 'informe_nutriciones_elaboradas de '.$request->fechdesd.' hasta '.$request->fechasta.'.xlsx');
        // return $this->view(['accionxx' => ['imprimir', 'imprimir'],]);
    }
}
