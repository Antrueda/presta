<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clinica\SisClinicaCrearRequest;
use App\Http\Requests\Clinica\SisClinicaEditarRequest;
use App\Models\Clinica\SisClinica;
use App\Models\Sistema\SisEsta;
use App\User;
use Illuminate\Support\Facades\Auth;

class ControladorModeloController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'crango',
            'parametr' => [],
            'rutacarp' => 'Clinicas.',
            'tituloxx' => 'clinica',
            'slotxxxx' => 'crango',
            'carpetax' => 'Rango',
            'indecrea' => false,
            'esindexx' => false
        ];
        $this->middleware(['permission:' .
        $this->opciones['permisox'] . '-leer|' .
        $this->opciones['permisox'] . '-crear|' .
        $this->opciones['permisox'] . '-editar|' .
        $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'crango';
        $this->opciones['routnuev'] = 'crango';
        $this->opciones['routxxxx'] = 'crango';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A CLINICAS', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($clinica)
    {
        $clinicax = SisClinica::where('id', $clinica)->first();
        $this->opciones['tablasxx'][] =
            [

                'titunuev' => 'NUEVA CLINICA',
                'titulist' => 'LISTA DE RANGOS PARA LA CLINICA: ' . $clinicax->clinica,
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => 'Clinicas.Clinica.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'clinicax', 'dataxxxx' => $clinica],
                ],
                'accitabl' => true,
                'vercrear' => false,
                'urlxxxxx' => 'api/clinica/crango',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'RANGO'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'rangos.id'],
                    ['data' => 'nombres', 'name' => 'rangos.nombres'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablacrango',
                'permisox' => $this->opciones['permisox'],
            ];
        //
        if (User::find(Auth::user()->id)->can($this->opciones['permisox'] . '-asiganar')) {
            $this->opciones['tablasxx'][] = [
                'titunuev' => 'NUEVA CLINICA',
                'titulist' => 'SELECCIONE EL/LOS RANGO/S QUE DESEE ADICIONAR A LA CLÍNICA: ' . $clinicax->clinica,
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => 'Clinicas.Clinica.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'clinicax', 'dataxxxx' => $clinica],
                ],
                'vercrear' => false,
                'accitabl' => false,
                'urlxxxxx' => 'api/clinica/rango',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'RANGO'],
                    ['td' => 'ESTADO'],
                ], 'columnsx' => [
                    // ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'rangos.id'],
                    ['data' => 'nombres', 'name' => 'rangos.nombres'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablapaciente',
                'permisox' => $this->opciones['permisox'],
            ];
        }

        $this->opciones['clinicax'] = $clinica;

        $this->opciones['accionxx'] = 'index';
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

        // Se arma el titulo de acuerdo al array opciones
        $this->opciones['tituloxx'] = $this->opciones['accionxx'] . ': ' . $this->opciones['tituloxx'];
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->opciones['indecrea'] = true;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(true, '', 'Crear', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SisClinicaCrearRequest $request)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SisClinica $objetoxx)
    {
        $this->opciones['indecrea'] = false;
        $this->opciones['clinicax'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => $objetoxx->sis_esta_id == 1 ? 'INACTIVAR' : 'ACTIVAR', 'routingx' => [$this->opciones['routxxxx'], []], 'formhref' => 1,
                'tituloxx' => '', 'clasexxx' => $objetoxx->sis_esta_id == 1 ? 'btn btn-sm btn-danger' : 'btn btn-sm btn-success'
            ];
        $this->opciones['readonly'] = 'readonly';
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SisClinica $objetoxx)
    {
        $this->opciones['indecrea'] = true;
        $this->opciones['clinicax'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [SisClinica::transaccion($dataxxxx, $objectx)->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SisClinicaEditarRequest  $request, SisClinica $objetoxx)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SisClinica $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
