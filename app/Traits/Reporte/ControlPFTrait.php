<?php

namespace App\Traits\Reporte;

use App\Helpers\DatatableHelper;
use App\Models\Formulaciones\Cformula;
use App\Models\Itemordene;

use App\Models\Reportes\Orden;
use App\User;

trait ControlPFTrait
{

    private $registro = [
        'medidisp' => '', // medicamento
        'lotexxxx' => '', // lote medicamento
        'consumid' => '', // cantidad consumida del medicamento
        'alistada' => '', // cantidad alistada del medicamento
        'sobrante' => '', // cantidad sobrante del medicamento
        'identifi' => '', // indentificador del medicamento
    ];
    private $concilia = [];
    private $dispocan;
    private $mediccan;

    public static function getOrdenControlPf($request)
    {
        $ordenxxx = Orden::select([
            'ordens.id', 'ordens.ordeprod', 'ordens.observac',
            'sis_estas.s_estado', 'ordens.created_at'
        ])
            ->join('sis_estas', 'ordens.sis_esta_id', '=', 'sis_estas.id')->orderBy('ordens.ordeprod', 'desc');
        return DatatableHelper::getDt($ordenxxx, $request);
    }


    public function getControlespf(Orden $objetoxx)
    {
        $liberado = [];
        $preparad = [];
        $pintarxy = [];


        $liberadx = '';
        $preparax = '';
        $todosxxx = Itemordene::select(["id", "itemxxxx",    "rowspanx", "colspanx",    "campoxxx",    "aplicaxx"])->get();
        // encotrar las formulaciones de la orden de produccion
        $formulac = Cformula::where('orden_id', $objetoxx->id)->where('terminado_id', '!=', null)->get()->toArray();
        $valorxxy = count($formulac);
        // hay formulaciones
        foreach ($formulac as $key => $value) {
            if (!in_array($value['userevis_id'], $liberado)) {
                $liberado[] = $value['userevis_id'];
                $liberadx .= User::where('id', $value['userevis_id'])->first()->name;
            }
            if (!in_array($value['userprep_id'], $preparad)) {
                $preparad[] = $value['userprep_id'];
                $preparax .= User::where('id', $value['userprep_id'])->first()->name;
            }
            $formular[$key] = $value['id'];
            if ($valorxxy <= 37) {
                if ($valorxxy == $key + 1) {
                    $pintarxy[] = ['pintarxx' => '', 'formular' => $formular, 'otrapagi' => 0, 'userprep' => $preparax, 'userlibe' => $liberadx];
                }
            } else {
                if (37 == $key + 1) {
                    $pintarxy[] = ['pintarxx' => '', 'formular' => $formular, 'otrapagi' => 1, 'userprep' => $preparax, 'userlibe' => $liberadx];
                    $formular = [];
                    $preparax = '';
                    $liberadx = '';
                }
            }
        }
        foreach ($pintarxy as $key => $pintarxx) {
            $pintarxy[$key]['pintarxx'] = $todosxxx;
            foreach (Itemordene::all() as $keypintar => $value) {
                $valorxxx = [];
                if ($value->colspanx == 0) {
                    for ($i = 0; $i < 37; $i++) {
                        $valorxxx[$i] =$this->getValidaRellenoPT($i,$pintarxx,$keypintar,$formular,$value);
                    }

                    $todosxxx[$keypintar]['validado'] = $valorxxx;
                }
            }
        }
        if ($valorxxy > 0) {
            $dataxxxx = [
                'vistaurl' => 'Reporte.Control.pdf.alistami',
                'dataxxxx' => [
                    'ordenxxx' => $objetoxx,
                    'formular' => $pintarxy
                ],
                'orientac' => 0,
                'tipoxxxx' => 1,
                'margenes' => array(0, 0, 9.5 * 72, 14.9 * 72)
            ];
            return $this->imprimir($dataxxxx);
        } else {
            return redirect()->route('controlpf')
                ->with('info', 'No hay formualaciones terminadas para la orden: ' . $objetoxx->ordeprod);
        }
    }
    public function imprimir($dataxxxx)
    {
        $orientac = ['landscape', 'portrait']; // orientaciones del pdf
        $datosxxx = $dataxxxx['dataxxxx'];
        $view = \View::make($dataxxxx['vistaurl'], compact('datosxxx'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setPaper($dataxxxx['margenes'], $orientac[$dataxxxx['orientac']]);

        if ($dataxxxx['tipoxxxx'] == 1) {
            return $pdf->stream('reporte');
        }
        if ($dataxxxx['tipoxxxx'] == 2) {
            return $pdf->download('reporte.pdf');
        }
        if ($dataxxxx['tipoxxxx'] == 3) {
            return view($dataxxxx['vistaurl'], compact('datosxxx'));
        }
    }
    /**
     * validar los valores para saber si pinta SI o NO
     *
     * @param array $formular
     * @param object $value
     * @param array $pintarxx
     * @param int $i
     * @return void
     */
    public function getControlPT($formular, $value, $pintarxx, $i)
    {
        $respuest='';
        switch ($value->aplicaxx) {
            case 1:
                $respuest= ['valorxxx' => $this->procesos($formular, $value->campoxxx), 'clasexxx' => '','altoxxxx'=>15];
                break;
            case 2:
                $respuest= ['valorxxx' => $this->terminados($pintarxx['formular'][$i], $value->campoxxx), 'clasexxx' => '','altoxxxx'=>15];
                if($value->campoxxx=='teorico_' || $value->campoxxx=='realxxx_'){
                    $respuest['altoxxxx']=50;
                    $respuest['clasexxx']='verticalText';
                }
                break;
        }
        return $respuest;
    }
    /**
     * validar los datos que se van a pintar
     *
     * @param int $i
     * @param array $pintarxx
     * @param int $keypintar
     * @param array $formular
     * @param object $value
     * @return void
     */
    public function getValidaRellenoPT($i,$pintarxx,$keypintar,$formular,$value)
    {
        $respuest='';
        if ($i < count($pintarxx['formular'])) {
            if ($keypintar == 0) { // lotes
                $respuest= ['valorxxx' => $pintarxx['formular'][$i], 'clasexxx' => 'verticalText','altoxxxx'=>0];
            } else { // las otras opciones (procesos y treminados)
                $respuest=$this->getControlPT($formular, $value, $pintarxx, $i);
            }

        //     echo '<pre>';
        // print_r($respuest);
        } else {
            $respuest= ['valorxxx' => '-', 'clasexxx' => '','altoxxxx'=>20];
        }

        return $respuest;
    }
    private function procesos($formular, $campoxxx)
    {


        $procesos = Cformula::find($formular[0])->proceso[$campoxxx];


        //select($campoxxx)->where('formulacione_id', $formular)->first()[$campoxxx];
        //$procesos = Proceso::select($campoxxx)->where('formulacione_id', $formular)->first()[$campoxxx];
        switch ($campoxxx) {
            case 'ausepart':
            case 'particul':
            case 'ausemise':
            case 'coloraci':
            case 'ausefuga':

                if ($procesos == 1) {
                    $procesos = 'SI';
                } else {
                    $procesos = 'NO';
                }
                break;
        }
        return $procesos;
    }

    private function terminados($formular, $campoxxx)
    {

        // $valorxxx = Terminado::where('proceso_id', Proceso::select('id')->where('formulacione_id', $formular)->first()['id'])->first()[$campoxxx];
        $valorxxx = Cformula::find($formular)->terminado[$campoxxx];
// echo $campoxxx.'<br>';
        switch ($campoxxx) {
            case 'completo':
            case 'particul':
            case 'integrid':
            case 'contenid':
            case 'fugasxxx':
            case 'miscelas':
            case 'burbujas':
            case 'document':
            case 'concepto':


                if ($valorxxx == 2) {
                    $valorxxx = 'SI';
                    if($campoxxx=='concepto'){
                        $valorxxx = 'A';
                    }
                } else {
                    $valorxxx = 'NO';
                    if($campoxxx=='concepto'){
                        $valorxxx = 'R';
                    }
                }


                break;
        }
        return $valorxxx;
    }
}
