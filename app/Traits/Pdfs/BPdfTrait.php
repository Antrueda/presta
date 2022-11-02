<?php

namespace App\Traits\Pdfs;

use App\Helpers\Cformula\Dataformulario;
use App\Helpers\Pdfs\Pdfs;
use App\Models\Formulaciones\Cformula;
use App\Models\Formulaciones\Orden;
use App\Models\Produccion\Calistam;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Traits\Cformula\CalculosTrait;
use App\Traits\Cformula\CalcularEdadTrait;
use App\Traits\Cformula\CalculosPediaTrait;

trait PdfTrait
{
    use CalculosTrait;
    use CalculosPediaTrait;
    use CalcularEdadTrait;
    public function getImprimirPdf($dataxxxx)
    {
        $view = View::make($dataxxxx['vistaurl'], $dataxxxx['dataxxxx'])->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setPaper(
            $dataxxxx['dimensio'] //array(0, 0, 9.5 * 72, 14.9 * 72)
            ,
            "portrait"
        );

        if ($dataxxxx['tipoxxxx'] == 1) {
            return $pdf->stream($dataxxxx['nombarch']);
        }
        if ($dataxxxx['tipoxxxx'] == 2) {
            return $pdf->download($dataxxxx['nombarch'] . '.pdf');
        }
        if ($dataxxxx['tipoxxxx'] == 3) {
            return view($dataxxxx['vistaurl'], $dataxxxx['dataxxxx']);
        }
    }

    public function imprimirEtiquetaNpt($padrexxx)
    {

        $dataxxxx['cformula'] = Cformula::find($padrexxx);
        $dataxxxx['formular']  = Dataformulario::getPintarFormulario(
            [
                'paciente' => $dataxxxx['cformula']->paciente,
                'furmulac' => $dataxxxx['cformula'],
            ]
        );

        $dataxxxx['calculos'] = $this->getCalculosCT($dataxxxx['cformula']);
        $dataxxxx['dnpxxxxx'] = $this->getCalcularDnp($dataxxxx['cformula']);

        $dataxxxx['preparad'] = isset($dataxxxx['cformula']->userprep);
        $dataxxxx['liberado'] = 'w';
        $dataxxxx = [
            'vistaurl' => 'Reporte.Etiquetas.etiquetanpt',
            // 'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'dimensio' => [0, 0, 4.4 * 72, 6.4 * 72],
            'tipoxxxx' => 2,
            'nombarch' => 'etiqueta',
            'dataxxxx' => $dataxxxx
        ];
        //   QrCode::backgroundColor(255, 255, 0)->generate('Make me into a QrCode!', '../public/qrcodes/qrcode.svg');
        return $this->getImprimirPdf($dataxxxx);
    }
    public function imprimirLote($padrexxx)
    {
        $dataxxxx['cformula'] = Cformula::where('orden_id', $padrexxx)->get();
        $dataxxxx['vencimiento'] = '';
        $mayor = 0;
        $menor = 0;
        foreach ($dataxxxx['cformula'] as $key => $value) {
            $dataxxxx['vencimiento'] = date("Y-m-d", strtotime(explode(' ', $value->create_at)[0] . "+ 2 days"));
            if ($key == 0) {
                $menor = $value->id;
            }
            if ($key == count($dataxxxx['cformula']) - 1) {
                $mayor = $value->id;
            }
        }
        $dataxxxx['menor'] = $menor . '-' . $mayor;
        $dataxxxx['hoyxx'] = Carbon::today()->isoFormat('YYYY-MM-DD');
        $dataxxxx['userx'] = Auth::user()->name;
        $dataxxxx = [
            'vistaurl' => 'Reporte.Reporte.pdf.lote',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 1,
            'nombarch' => 'Lote', $dataxxxx['hoyxx'],
            'dataxxxx' => $dataxxxx
        ];

        return $this->getImprimirPdf($dataxxxx);
    }


    public function getPdfConciliacion(Calistam $objetoxx)
    {
        $concilia = $this->getMlotesDlotesACT(['alisconc' => true, 'padrexxx' => $objetoxx]);
        // $concilia = $this->getConsiliacion(['padrexxx' => $objetoxx]);





        $dataxxxx = [
            'vistaurl' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.formulario.pdf.cabecera',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 1,
            'nombarch' => 'conciliacion',
            'dataxxxx' => [
                'cabecera' => $objetoxx, 'todoxxxx' => ['alistami'=>$concilia]
            ]
        ];
        return Pdfs::getImprimirPdf($dataxxxx);
    }

    public function getImprimirOrden(Orden $ordenxxx)
    {

        $formulac = Cformula::select(['cformulas.id', 'cformulas.created_at'])
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->where('cformulas.orden_id', $ordenxxx->id)
            ->where('cformulas.terminado_id', '<>', null)
            // ->where('sis_clinicas.clinica_ide', $ordenxxx->clinica_id)
            ->get();
        if (isset($formulac[0])) {
            $dataxxxx = [
                'vistaurl' => 'Reporte.Orden.Formulario.ordenes',
                'dataxxxx' => [
                    'formulac' => $formulac,
                    'ordenxxx' => $ordenxxx->ordeprod,
                    'despejsi' => 'X',
                    'despejno' => '__',
                    'desponsi' => 'X',
                    'desponno' => '__'
                ],
                'dimensio' => 1,
                'tipoxxxx' => 1,
                'margenes' => array(0, 0, 9.5 * 72, 14.9 * 72),
                'nombarch' => 'ordenproduccion',
            ];
            return $this->getImprimirPdf($dataxxxx);
        } else {
            return redirect()->route('ordprodu')
                ->with('info', 'No hay formualaciones terminadas para la orden: ' . $ordenxxx->ordeprod);
        }
    }

    public function getRearmarArray($alistami)
    {
        $disposix = [];
        $medicamx = [];
        foreach ($alistami as $key => $value) {
            if ($value['value_di'] > 0) {
                $disposix[] =  [
                    "medicamd" => $value['medicamd'],
                    "value_di" => $value['value_di'],
                    "lotexxxd" => $value['lotexxxd'],
                    "reginvid" => $value['reginvid'],
                    "fechvend" => $value['fechvend'],
                    "dispo_id" => $value['dispo_id'],
                ];
            }
            if ($value['value_me'] > 0) {
                $medicamx[] = [
                    "medicamm" => $value['medicamm'],
                    "value_me" => $value['value_me'],
                    "lotexxxm" => $value['lotexxxm'],
                    "reginvim" => $value['reginvim'],
                    "fechvenm" => $value['fechvenm'],
                    "medic_id" => $value['medic_id'],
                ];
            }
        }
        $medicoun = count($medicamx);
        $dispcoun = count($disposix);
        $mayorxxx = [];
        if ($medicoun >= $dispcoun) {
            $mayorxxx = $medicamx;
        } else {
            $mayorxxx = $disposix;
        }
        $alistami = [];
        foreach ($mayorxxx as $key => $value) {
            $alistami[] = [
                "medicamd" => isset($disposix[$key]['medicamd']) ? $disposix[$key]['medicamd'] : '',
                "value_di" => isset($disposix[$key]['value_di']) ? $disposix[$key]['value_di'] : '',
                "lotexxxd" => isset($disposix[$key]['lotexxxd']) ? $disposix[$key]['lotexxxd'] : '',
                "reginvid" => isset($disposix[$key]['reginvid']) ? $disposix[$key]['reginvid'] : '',
                "fechvend" => isset($disposix[$key]['fechvend']) ? $disposix[$key]['fechvend'] : '',
                "dispo_id" => isset($disposix[$key]['dispo_id']) ? $disposix[$key]['dispo_id'] : '',
                "medicamm" => isset($medicamx[$key]['medicamm']) ? $medicamx[$key]['medicamm'] : '',
                "value_me" => isset($medicamx[$key]['value_me']) ? $medicamx[$key]['value_me'] : '',
                "lotexxxm" => isset($medicamx[$key]['lotexxxm']) ? $medicamx[$key]['lotexxxm'] : '',
                "reginvim" => isset($medicamx[$key]['reginvim']) ? $medicamx[$key]['reginvim'] : '',
                "fechvenm" => isset($medicamx[$key]['fechvenm']) ? $medicamx[$key]['fechvenm'] : '',
                "medic_id" => isset($medicamx[$key]['medic_id']) ? $medicamx[$key]['medic_id'] : '',
            ];
        }
        return $alistami;
    }
    public function getPdfCalistam(Calistam $objetoxx)
    {
        $dataxxxx = [
            'vistaurl' => 'Produccion.Alistamiento.pdf.alistami',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 2,
            'nombarch' => 'alistamiento',
            'dataxxxx' => ['cabecera' => $objetoxx, 'detallex' =>  $this->opciones['alistami'] = $this->getMlotesDlotesACT(['alisconc' => true, 'padrexxx' => $objetoxx])]
        ];

        return Pdfs::getImprimirPdf($dataxxxx);
    }
}
