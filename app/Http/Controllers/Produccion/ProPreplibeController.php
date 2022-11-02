<?php

namespace App\Http\Controllers\Produccion;

use App\Helpers\Cformula\Dataformulario;
use App\Http\Controllers\Controller;
use App\Http\Requests\Produccion\ProPreplibeCrearRequest;
use App\Models\Produccion\ProPreplibe;
use App\Traits\Pestanias\ProduccionTrait;
use App\Traits\Produccion\ProListadoTrait;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProPreplibeController extends Controller
{
    private $opciones;
    use ProduccionTrait;
    use ProListadoTrait;

    public function __construct()
    {
        $this->opciones = [
            'cardhead' => 'Asignación de revisor y preparador',
            'permisox' => 'preplibe',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'Revisor y Preparador',
            'slotxxxx' => 'preplibe',
            'carpetax' => 'Preplibe',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-leer|' .
            $this->opciones['permisox'] . '-crear|' .
            $this->opciones['permisox'] . '-editar|' .
            $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'preplibe';
        $this->opciones['routnuev'] = 'preplibe';
        $this->opciones['routxxxx'] = 'preplibe';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A ASIGNACIONES', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
        $this->opciones['botonesx']=[false,'layouts.components.botones.botones',true];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->opciones['paciente'] = '';
        // $this->opciones['botoform'][0]['routingx'][1] = $padrexxx;
        $this->opciones['indecrea'] = false;
        $this->opciones['esindexx'] = false;
        $this->opciones['accionxx'] = 'index';
        // $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['parametr'] = [];
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVA ASIGNACION',
                'titulist' => 'LISTA DE ASIGNACIONES',
                'vercrear' => true,
                'accitabl' => true,
                'urlxxxxx' => route($this->opciones['routxxxx'].'.listaxxx'),
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'PREPARADOR'],
                    ['td' => 'REVISOR'],
                    ['td' => 'FECHA'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'pro_preplibes.id'],
                    ['data' => 'userprep', 'name' => 'userprep.name as userprep'],
                    ['data' => 'userevis', 'name' => 'userevis.name as userevis'],
                    ['data' => 'created_at', 'name' => 'pro_preplibes.created_at'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaformulaciones',
                'permisox' => 'preplibe',
                'routxxxx' => 'preplibe',
                'parametr' => [],
            ],
        ];
        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    private function view($objetoxx, $accionxx)
    {
        $this->opciones['quimfarm'] = User::getCombo(['cabecera' => true, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $accionxx;
        // indica si se esta actualizando o viendo
        if ($objetoxx != '') {
            $this->opciones['parametr'] = [$objetoxx->id];
            $this->opciones['modeloxx'] = $objetoxx;
        }
        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);
        // Se arma el titulo de acuerdo al array opciones
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    public function create()
    {
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'GRABAR',
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
            $this->opciones['generalx']='formulario';
        $this->opciones['routform']=route($this->opciones['routxxxx'].'.crearxxx',[]);
        return $this->view('',  'genecrea');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProPreplibeCrearRequest $request)
    {
        $request->request->add(['sis_esta_id' => 1]);
        return ProPreplibe::transaccion([
            'objetoxx' => '',
            'requestx' => $request,
            'routxxxx' => $this->opciones['routxxxx'],
            'infoxxxx' => 'Revisor y preparador asignados con éxito!!'
        ]);
    }


    public function edit(ProPreplibe $objetoxx)
    {
        $this->opciones['generalx']='formulario';
        $this->opciones['routform']=route($this->opciones['routxxxx'].'.editarxx',[$objetoxx->id]);
        return $this->view($objetoxx, 'genedita');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProPreplibeCrearRequest  $request, ProPreplibe $objetoxx) ///
    {
        return ProPreplibe::transaccion([
            'objetoxx' => $objetoxx,
            'requestx' => $request,
            'routxxxx' => $this->opciones['routxxxx'],
            'infoxxxx' => 'Revisor y preparador actualizados con éxito!!'
        ]);
    }


    public function inactivate(ProPreplibe $objetoxx)
    {
        $this->opciones['botoform'][] =
        [
            'mostrars' => true, 'accionxx' => 'INACTIVAR ASIGNACIÓN',
            'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
        ];
        $this->opciones['generalx']='destroy';
        $this->opciones['routform']=route($this->opciones['routxxxx'].'.borrarxx',[$objetoxx->id]);

        return $this->view($objetoxx, 'genedita');
    }

    public function destroy(ProPreplibe $objetoxx)
    {
        $objetoxx->update(
            ['sis_esta_id' => 2, 'user_edita_id' => Auth::user()->id]
        );
        return redirect()
            ->route($this->opciones['routxxxx'], [])
            ->with('info', 'Asignación inactivada correctamente');
    }

    public function activate(ProPreplibe $objetoxx)
    {
        $this->opciones['botoform'][] =
        [
            'mostrars' => true, 'accionxx' => 'ACTIVAR ASIGNACIÓN',
            'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
        ];
        $this->opciones['generalx']='activarx';
        $this->opciones['routform']=route($this->opciones['routxxxx'].'.'.$this->opciones['generalx'],[$objetoxx->id]);

        return $this->view($objetoxx, 'genedita');
    }
    public function activar(ProPreplibe $objetoxx)
    {
        $objetoxx->update(
            ['sis_esta_id' => 1, 'user_edita_id' => Auth::user()->id]
        );
        return redirect()
            ->route($this->opciones['routxxxx'], [])
            ->with('info', 'Asignación activada correctamente');
    }
}
