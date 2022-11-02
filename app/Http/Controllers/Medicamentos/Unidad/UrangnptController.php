<?php

namespace App\Http\Controllers\Medicamentos\Unidad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medicamentos\Unidad\UrangnptCrearRequest;
use App\Http\Requests\Medicamentos\Unidad\UrangnptEditarRequest;
use App\Models\Medicamentos\Unidad\Urangnpt;
use App\Models\Sistema\SisEsta;
use App\Traits\Combos\Combos;
use App\Traits\Pestanias;

class UrangnptController extends Controller
{
    use Pestanias;
    use Combos;
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'cardhead' => '', // titulo para las pestañas
            'permisox' => 'urnpt',
            'parametr' => [],
            'rutacarp' => 'Medicame.Unidad.',
            'tituloxx' => 'Rango NPTS',
            'slotxxxy' => 'urnpt',
            'slotxxxx' => 'urnpt',
            'carpetax' => 'Urangnpt',
            'indecrea' => false,
            'esindexx' => false,
            'pestania' => []
        ];
        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-leer|' .
            $this->opciones['permisox'] . '-crear|' .
            $this->opciones['permisox'] . '-editar|' .
            $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'urnpt';
        $this->opciones['routnuev'] = 'urnpt';
        $this->opciones['routxxxx'] = 'urnpt';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }

    public function index($padrexxx)
    {
        $this->opciones['pestania'] = $this->getUnidades(['tablaxxx' => 'unidrangs', 'idxxxxxx' => $padrexxx]);
        $this->opciones['esindexx'] = true;
        $this->opciones['accionxx'] = 'index';
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'CREAR',
                'titulist' => 'LISTA DE RANGOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadosx'],
                    ['campoxxx' => 'puededit', 'dataxxxx' => auth()->user()->can('urango-editar') ? true : false],

                ],
                'vercrear' => true,
                'accitabl' => true,
                'urlxxxxx' => 'api/unidad/urnpts',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'RANGO DESDE'],
                    ['td' => 'RANGO HASTA'],
                    ['td' => 'UNIDAD'],
                    ['td' => 'NPT'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'rangonpts.id'],
                    ['data' => 'randesde', 'name' => 'rangonpts.randesde'],
                    ['data' => 'ranhasta', 'name' => 'rangonpts.ranhasta'],
                    ['data' => 's_unidad', 'name' => 'unidads.s_unidad'],
                    ['data' => 'nombre', 'name' => 'npts.nombre'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablageneral',
                'permisox' => 'urnpt',
                'routxxxx' => 'urnpt',
                'parametr' => [$padrexxx],
            ],

        ];
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    private function view($dataxxxx)
    {
        $this->opciones['rangonpt'] = $this->getUrnpts(['cabecera' => true, 'ajaxxxxx' => false]);
        $this->opciones['nptxxxxx'] = $this->getNpts(['cabecera' => true, 'ajaxxxxx' => false]);
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $dataxxxx['accionxx'];
        // indica si se esta actualizando o viendo
        if ($dataxxxx['objetoxx'] != '') {
            $this->opciones['modeloxx'] = $dataxxxx['objetoxx'];
        }

        // Se arma el titulo de acuerdo al array opciones
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }

    public function create($padrexxx)
    {
        $this->opciones['pestania'] = $this->getUnidades(['tablaxxx' => 'unidrangs', 'idxxxxxx' => $padrexxx]);
        $this->opciones['parametr'] = [$padrexxx];
        $this->opciones['botoform'][0]['routingx'][1] = $this->opciones['parametr'];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$padrexxx]],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(['objetoxx' => '', 'accionxx' => 'Crear']);
    }

    public function store(UrangnptCrearRequest $request)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    public function show($padrexxx, Urangnpt $objetoxx)
    {
        $this->opciones['botoform'][0]['routingx'][1] = [$padrexxx];
        $this->opciones['pestania'] = $this->getUnidades(['tablaxxx' => 'unidrangs', 'idxxxxxx' => $padrexxx]);
        $this->opciones['cardhead'] = 'CLINICA: ' . $objetoxx->clinica;
        $this->opciones['parametr'] = [$padrexxx,$objetoxx->id];
        if (auth()->user()->can('urnpt-crear')) {
            $this->opciones['botoform'][] = [
                'mostrars' => true, 'accionxx' => '', 'routingx' => ['urnpt.nuevo', [$padrexxx]],
                'formhref' => 2, 'tituloxx' => 'CREAR', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        }
        return $this->view(['objetoxx' => $objetoxx, 'accionxx' => 'Editar']);
    }

    public function edit($padrexxx, Urangnpt $objetoxx)
    {
        $this->opciones['botoform'][0]['routingx'][1] = [$padrexxx];
        $this->opciones['pestania'] = $this->getUnidades(['tablaxxx' => 'unidrangs', 'idxxxxxx' => $padrexxx]);
        $this->opciones['cardhead'] = 'CLINICA: ' . $objetoxx->clinica;
        $this->opciones['parametr'] = [$padrexxx, $objetoxx->id];
        if (auth()->user()->can('urnpt-editar')) {
            $this->opciones['botoform'][] =
                [
                    'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', $this->opciones['parametr']],
                    'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
                ];
        }
        if (auth()->user()->can('urnpt-crear')) {
            $this->opciones['botoform'][] = [
                'mostrars' => true, 'accionxx' => '', 'routingx' => ['urnpt.nuevo', [$padrexxx]],
                'formhref' => 2, 'tituloxx' => 'CREAR', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        }

        return $this->view(['objetoxx' => $objetoxx, 'accionxx' => 'Editar']);
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        $unidadxx = Urangnpt::transaccion($dataxxxx, $objectx);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$unidadxx->unidrang_id, $unidadxx->id])
            ->with('info', $infoxxxx);
    }

    public function update(UrangnptEditarRequest  $request, Urangnpt $objetoxx)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }

    public function destroy(Urangnpt $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
