<?php

namespace App\Http\Controllers\Produccion;


use App\Http\Controllers\Controller;
use App\Http\Requests\Produccion\ConciliacionEditarRequest;
use App\Models\Produccion\Calistam;
use App\Models\Produccion\Dalistam;
use App\Models\Sistema\SisEsta;
use App\Traits\Conciliacion\ConciliacionTrait;
use App\Traits\Pdfs\PdfTrait;
use App\Traits\Pestanias\ProduccionTrait;
use App\Traits\Produccion\AlisConciTrait;
use Illuminate\Http\Request;

class ConciliacionController extends Controller
{
    use AlisConciTrait;
    private $opciones;
    use ProduccionTrait;
    use ConciliacionTrait;
    use PdfTrait;
    public function __construct()
    {
        $this->opciones = [
            'cardhead' => 'CONCILIACIONES',
            'permisox' => 'concilia',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'CONCILIACIÓN',
            'slotxxxx' => 'concilia',
            'carpetax' => 'Conciliacion',
            'indecrea' => false,
            'esindexx' => false,
            'pestania' => []
        ];

        $this->middleware(['permission:'
            . $this->opciones['permisox'] . '-leer|'
            . $this->opciones['permisox'] . '-crear|'
            . $this->opciones['permisox'] . '-editar|'
            . $this->opciones['permisox'] . '-borrar|']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'concilia';
        $this->opciones['routnuev'] = 'concilia';
        $this->opciones['routxxxx'] = 'concilia';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A CONCILIACIONES', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($padrexxx)
    {

        $this->opciones['indecrea'] = false;
        $this->opciones['esindexx'] = true;
        $this->opciones['accionxx'] = 'index';
        // $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVA CONCILIACION',
                'titulist' => 'LISTA DE CONCILIACIONES',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadosx'],
                    ['campoxxx' => 'padrexxx', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => 'api/produccion/conciliaciones',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'PRODUCTO'],
                    ['td' => 'FECHA'],
                    ['td' => 'OP'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'calistams.id'],
                    ['data' => 'producto', 'name' => 'calistams.producto'],
                    ['data' => 'created_at', 'name' => 'calistams.created_at'],
                    ['data' => 'ordeprod', 'name' => 'ordens.ordeprod'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaordenes',
                'permisox' => 'concilia',
                'routxxxx' => 'concilia',
                'parametr' => [],
            ],

        ];

        $this->opciones['pestania'] = $this->getPestanias(['tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => Calistam::find($padrexxx)]);
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }



    private function view($dataxxxx)
    {

        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $dataxxxx['accionxx'];
        // indica si se esta actualizando o viendo
        if ($dataxxxx['objetoxx'] != '') {
            $this->opciones['modeloxx'] = $dataxxxx['objetoxx'];
            $this->opciones['ordenxxx'] = [$dataxxxx['objetoxx']->orden_id => $dataxxxx['objetoxx']->orden->ordeprod];
        }
        $this->opciones['botoform'][0]['routingx'][1] = [$dataxxxx['objetoxx']->id];
        $this->opciones['pestania'] = $this->getPestanias(['tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => $dataxxxx['objetoxx']]);
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Calistam $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Ver: Conciliación';
        $this->opciones['alistami'] = $this->getConsiliacion(['padrexxx' => $objetoxx]);
        $this->opciones['clinicax'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        return $this->view(['objetoxx' => $objetoxx, 'accionxx' => 'Ver']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Calistam $objetoxx)
    {
        $this->opciones['alistami'] = $this->getMlotesDlotesACT(['alisconc' => true, 'padrexxx' => $objetoxx]);
        $this->opciones['clinicax'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(['objetoxx' => $objetoxx, 'accionxx' => 'Editar']);
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $dataxxxx->request->add(['alisconc'=>true]);
        $cabecera =$this->setTransaccionACT($dataxxxx,  $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$cabecera->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConciliacionEditarRequest  $request, Calistam $objetoxx)
    {
        return $this->grabar($request, $objetoxx, 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calistam $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }

    public function esnumerico(Request $request)
    {
        if ($request->ajax()) {
            $cantmayo = false;
            if ($request->cantsobr > $request->cantalis) {
                $cantmayo = true;
            }
            $diferenc = $request->cantalis - $request->cantsobr;
            return response()->json([
                'numeroxx' => $request->cantsobr,
                'diferenc' => is_int($diferenc) ? $diferenc : number_format($diferenc, '2', '.', ''),
                'cantalis' => $request->cantalis,
                'idcancon' => str_replace('_dif', '', $request->idcancon) . '_con',
                'idiferen' => $request->idcancon,
                'cantmayo' => $cantmayo
            ]);
        }
    }
}
