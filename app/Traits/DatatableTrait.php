<?php
namespace App\Traits;
trait DatatableTrait{

    public function getDatatableFecha($queryxxx, $requestx)
    {
        return datatables()
            ->of($queryxxx)
            ->addColumn(
                'botonexx',
                function ($queryxxx) use ($requestx) {
                    $requestx->puedever = auth()->user()->can($requestx->routexxx[0] . '-leer');
                    $requestx->pueditar = auth()->user()->can($requestx->routexxx[0] . '-editar');
                    $requestx->puedinac = auth()->user()->can($requestx->routexxx[0] . '-borrar');
                    return  view($requestx->botonesx, [
                        'queryxxx' => $queryxxx,
                        'requestx' => $requestx,
                    ]);
                }
            )
            ->addColumn(
                's_estado',
                function ($queryxxx) use ($requestx) {
                    return  view($requestx->estadoxx, [
                        'queryxxx' => $queryxxx,
                        'requestx' => $requestx,
                    ]);
                }

            )
            ->addColumn(
                'created_at',
                function ($queryxxx) use ($requestx) {
                    return  explode(' ',$queryxxx->created_at)[0];
                }

            )
            ->rawColumns(['botonexx', 's_estado','created_at'])
            ->toJson();
    }
    public function getDatatable($queryxxx, $requestx)
    {
        return datatables()
            ->of($queryxxx)
            ->addColumn(
                'botonexx',
                function ($queryxxx) use ($requestx) {
                    $requestx->puedever = auth()->user()->can($requestx->routexxx[0] . '-leer');
                    $requestx->pueditar = auth()->user()->can($requestx->routexxx[0] . '-editar');
                    $requestx->puedinac = auth()->user()->can($requestx->routexxx[0] . '-borrar');
                    return  view($requestx->botonesx, [
                        'queryxxx' => $queryxxx,
                        'requestx' => $requestx,
                    ]);
                }
            )
            ->addColumn(
                's_estado',
                function ($queryxxx) use ($requestx) {
                    return  view($requestx->estadoxx, [
                        'queryxxx' => $queryxxx,
                        'requestx' => $requestx,
                    ]);
                }

            )
            ->rawColumns(['botonexx', 's_estado'])
            ->toJson();
    }

    public function getCobrsepas($queryxxx, $requestx)
    {
        return datatables()
            ->of($queryxxx)
            ->addColumn(
                'botonexx',
                function ($queryxxx) use ($requestx) {
                    // $requestx->puedever = auth()->user()->can($requestx->routexxx[0] . '-leer');
                    // $requestx->pueditar = auth()->user()->can($requestx->routexxx[0] . '-editar');
                    // $requestx->puedinac = auth()->user()->can($requestx->routexxx[0] . '-borrar');
                    return  view($requestx->botonesx, [
                        'queryxxx' => $queryxxx,
                        'requestx' => $requestx,
                    ]);
                }
            )
            ->addColumn(
                's_estado',
                function ($queryxxx) use ($requestx) {
                    return  view($requestx->estadoxx, [
                        'queryxxx' => $queryxxx,
                        'requestx' => $requestx,
                    ]);
                }

            )
            ->addColumn(
                'cobrsepa',
                function ($queryxxx) use ($requestx) {
                    return  view($requestx->cobrsepa, [
                        'queryxxx' => $queryxxx,
                        'requestx' => $requestx,
                    ]);
                }

            )
            ->rawColumns(['botonexx', 's_estado','cobrsepa'])
            ->toJson();
    }


    public function getDttb($queryxxx, $requestx)
    {
        $datatabl=datatables()
        ->of($queryxxx)->addColumn(
            'botonexx',
            function ($queryxxx) use ($requestx) {
                return  view($requestx->botonesx, [
                    'queryxxx' => $queryxxx,
                    'requestx' => $requestx,
                ]);
            }
        )->addColumn(
            's_estado',
            function ($queryxxx) use ($requestx) {
                return  view($requestx->estadoxx, [
                    'queryxxx' => $queryxxx,
                    'requestx' => $requestx,
                ]);
            }

        )->rawColumns(['botonexx', 's_estado'])
        ->toJson();
        return $datatabl;
    }
}
