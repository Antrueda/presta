<?php

namespace App\Helpers;

class DatatableHelper
{
    public static function getDatatable($queryxxx, $requestx)
    {
        return datatables()
            ->eloquent($queryxxx)
            ->addColumn('botonexx', $requestx->botonesx)
            ->addColumn('s_estado', $requestx->estadoxx)
            ->rawColumns(['botonexx', 's_estado'])
            ->toJson();
    }

    /**
     * construccion del datatable de manera dinamica
     */

    public static function getDt($queryxxx, $requestx)
    {
        return datatables()
            ->of($queryxxx)
            ->addColumn(
                'botonexx',
                function ($queryxxx) use ($requestx) {
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
    public static function getDtb($queryxxx, $requestx)
    {
        return datatables()
            ->of($queryxxx)
            ->addColumn(
                'botonexx',
                function ($queryxxx) use ($requestx) {
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
                'revisado',
                function ($queryxxx) use ($requestx) {
                    return  view($requestx->revisado, [
                        'queryxxx' => $queryxxx,
                        'requestx' => $requestx,
                    ]);
                }

            )
            ->addColumn(
                'peso',
                function ($queryxxx) use ($requestx) {
                    return  number_format($queryxxx->peso,2);
                }
            )
            ->rawColumns(['botonexx', 's_estado','revisado'])
            ->toJson();
    }

    public static function getDtFormulacion($queryxxx, $requestx)
    {
        return datatables()
            ->of($queryxxx)
            ->addColumn(
                'botonexx',
                function ($queryxxx) use ($requestx) {
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

}
