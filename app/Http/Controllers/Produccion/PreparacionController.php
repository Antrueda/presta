<?php

namespace App\Http\Controllers\Produccion;

use App\Http\Controllers\Controller;

use App\Http\Requests\Produccion\PreparacionEditarRequest;
use App\Models\Formulaciones\Cformula;
use App\Models\Formulaciones\Dformula;
use App\Models\Produccion\Calistam;
use App\Models\Sistema\SisEsta;
use App\Traits\Alertas\AlertasTrait;
use App\Traits\Pestanias\ProduccionTrait;

class PreparacionController extends Controller
{
    private $opciones;
    use ProduccionTrait;
    use AlertasTrait;
    public function __construct()
    {
        $this->opciones = [
            'cardhead'=>'PREPARACIONES',
            'permisox' => 'preparac',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'Crear: Preparación',
            'slotxxxx'=>'preparac',
            'carpetax'=>'Preparacion',
            'indecrea'=>false,
            'esindexx'=>false
        ];

        $this->middleware(['permission:'
        . $this->opciones['permisox'] . '-leer|'
        . $this->opciones['permisox'] . '-crear|'
        . $this->opciones['permisox'] . '-editar|'
        . $this->opciones['permisox'] . '-borrar|']);
        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'preparac';
        $this->opciones['routnuev'] = 'preparac';
        $this->opciones['routxxxx'] = 'preparac';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A PREPARACIONES', 'clasexxx' => 'btn btn-sm btn-primary'
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
        $padrexxx='';
        $this->opciones['indecrea']=false;
        $this->opciones['esindexx']=true;
        $this->opciones['accionxx']='index';
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVA PREPARACION',
                'titulist' => 'LISTA DE PREPARACIONES',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'revisado', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.preparad'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadosx'],
                    ['campoxxx' => 'medicame', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => 'api/produccion/preparacion',
                'cabecera' =>[

                    ['td' => 'LOTE INTERNO'],
                    ['td' => 'CÉDULA'],
                    ['td' => 'NOMBRES'],
                    ['td' => 'APELLIDOS'],
                    ['td' => 'CLÍNICA'],
                    ['td' => 'PREPARACIÓN'],
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
                'permisox' => 'preparac',
                'routxxxx' => 'preparac',
                'parametr' => [],
            ],
        ];
        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);
       return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $accionxx;
        // indica si se esta actualizando o viendo
        if ($nombobje != '') {
            $this->opciones[$nombobje] = $objetoxx;
        }
        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }

    public function show(Cformula $objetoxx)
    {
        $this->opciones['cardhead']='PREPARACION PACIENTE: '.$objetoxx->paciente->nombres.' '.$objetoxx->paciente->apellidos;
        $this->opciones['clinicax'] =$objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['readonly'] = 'readonly';
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cformula $objetoxx)
    {
        $this->opciones['cardhead']='PREPARACION PACIENTE: '.$objetoxx->paciente->nombres.' '.$objetoxx->paciente->apellidos;
        $this->opciones['clinicax'] =$objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'PREPARADO', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        Dformula::getTransaccionPreparacion($dataxxxx,  $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$objectx->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreparacionEditarRequest  $request, Cformula $objetoxx)
    {
        $this->getAlerta(['objetoxx'=>$objetoxx,'tipoacci'=>4]);
        $dataxxxx = $request->all();

        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');

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


}
