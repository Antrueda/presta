<?php

namespace App\Traits\Reportes\Excelxxx\Infoclin;

use App\Exports\InformeClinicaExport;
use App\Http\Requests\Reportes\Excelxxx\InformeClinicaCreateRequest;
use App\Models\Clinica\Clinica;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Este trait permite armar las consultas para ubicacion que arman las datatable
 */
trait InformeClinicaTrait
{
    use MedicamentosCobrarTrait;
    use DataTrait;
    public function create()
    {
        $this->getBotones(['leerxxxx', [], 1, "{$this->opciones['titucont']}", 'btn btn-sm btn-primary']);
        return $this->view(['modeloxx' => '', 'accionxx' => ['crear', 'formulario'],]);
    }

    public function store(InformeClinicaCreateRequest $request)
    {

        if (ob_get_contents()) ob_end_clean();
        ob_start();
        $this->opciones['clinicay'] = Clinica::find($request->clinica_id);
        $this->opciones['periodox'] = 'DEL ' . $request->fechdesd . ' AL ' . $request->fechasta;
        $this->opciones['resumenx'] = [];
        $this->opciones['modeloxx'] = $this->getExcel(['requestx' => $request]);
        if (count($this->opciones['modeloxx']) == 0) {
            return redirect()
                ->route('infoclin', [])
                ->with('info', 'El rango seleccionado no tiene información para exportar');
        }
        return Excel::download(new InformeClinicaExport($this->opciones), 'informe_clinica de '.$request->fechdesd.' hasta '.$request->fechasta.'.xlsx');
    }
}
