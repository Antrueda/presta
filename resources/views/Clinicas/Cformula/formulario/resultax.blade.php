
<style>
.responsi{
   font-size:1vw
}
</style>
<div id="formulaciontable" style="padding-top: 15px;">
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control  responsi ">VOLUMEN TOTAL (ml)</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('volutota',
            isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->volumen,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right;',
        'id'=>'volutota','readonly'
        ]) }}
        </div>
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control  responsi "> VOLUMEN CON PURGA (ml)</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">

            {{ Form::text('velopurg',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->volumen+$todoxxxx['modeloxx']->purga,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right',
        'id'=>'velopurg','readonly'
        ]) }}
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control  responsi ">VELOCIDAD DE INFUSIÓN (ml/hora)</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx " style="text-align: right;">
            {{ Form::text('veloinfu',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->velocidad,2,",", "."):null,
        ['class'=>'textinpu veloinfu','style'=>'text-align: right;',
        'id'=>'veloinfu','readonly'
        ]) }}
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control  responsi ">CONCENTRACIÓN DE CARBOHIDRATOS (%)</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx">
            {{ Form::text('carbvali',
            $todoxxxx['calculos']['carbvali'],
        ['class'=>'textinpu','style'=>'text-align: right;',
        'id'=>'carbvali','readonly'
        ]) }}

        </div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('concarbo',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->concarbo,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right;',
        'id'=>'concarbo','readonly'
        ]) }}
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control  responsi ">CONCENTRACIÓN DE PROTEÍNA (%) (>1%)</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx">
            {{ Form::text('concprov',
            $todoxxxx['calculos']['concprov'],
        ['class'=>'textinpu','style'=>'text-align: right;',
        'id'=>'concprov','readonly'
        ]) }}
        </div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('concprot',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->concprot,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right;',
        'id'=>'concprot','readonly'
        ]) }}
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control  responsi align-bottom "> VÍA DE ADMINISTRACIÓN</div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control  responsi ">CONCENTRACIÓN DE LÍPIDOS (%) (>1%)</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx">
            {{ Form::text('conclipv',
            $todoxxxx['calculos']['conclipv'],
        ['class'=>'textinpu','style'=>'text-align: right;',
        'id'=>'conclipv','readonly'
        ]) }}
        </div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('conclipi',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->conclipi,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right;',
        'id'=>'conclipi','readonly'
        ]) }}
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control  responsi ">OSMOLARIDAD (mOsm/L)</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('osmolari',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->osmolari,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right;',
        'id'=>'osmolari','readonly'
        ]) }}
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control  altoxxxx" style="text-align: left;">
            {{ Form::text('osmolarv',
            $todoxxxx['calculos']['osmolarv'],
        ['class'=>'textinpu','style'=>'text-align: left;',
        'id'=>'osmolarv','readonly'
        ]) }}
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control  responsi ">GRAMOS TOTALES DE NITRÓGENO</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('gramtota',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->gramtota,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right; ',
        'id'=>'gramtota','readonly'
        ]) }}
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5  "></div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control  responsi ">RELACIÓN: Caloría No proteícas/g Nitrógeno</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('protnitr',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->protnitr,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right; ',
        'id'=>'protnitr','readonly'
        ]) }}
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control  responsi ">RELACIÓN: Caloría No proteícas/g A.A</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('proteica',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->proteica,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right; ',
        'id'=>'proteica','readonly'
        ]) }}
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control  responsi ">CALORÍAS PROTEICAS</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            <div class="" style="float: right;">%</div>
            <div style="float: right;">
                {{ Form::text('caloprov',
                    isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->caloprov,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right; width: 50%;',
        'id'=>'caloprov','readonly'
        ]) }}
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('caloprot',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->caloprot,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right; ',
        'id'=>'caloprot','readonly'
        ]) }}

        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control  responsi ">CALORÍAS LÍPIDOS</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            <div class="" style="float: right;">%</div>
            <div style="float: right;">
                {{ Form::text('calolipv',
                    isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->calolipv,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right; ',
        'id'=>'calolipv','readonly'
        ]) }}

            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('calolipi',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->calolipi,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right; ',
        'id'=>'calolipi','readonly'
        ]) }}
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control  responsi ">CALORÍAS CARBOHIDRATOS</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            <div class="" style="float: right;">%</div>
            <div style="float: right;">
                {{ Form::text('calocarv',
                    isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->calocarv,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right; ',
        'id'=>'calocarv','readonly'
        ]) }}
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('calocarb',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->calocarb,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right; ',
        'id'=>'calocarb','readonly'
        ]) }}

        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control  responsi ">CALORÍAS TOTALES</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            <div class="" style="float: right;">%</div>
            <div style="float: right;">
                {{ Form::text('calototv',
                    isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->calototv,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right; ',
        'id'=>'calototv','readonly'
        ]) }}
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('calotota',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->calotota,2,",", "."):null,
        ['class'=>'textinpu','style'=>'text-align: right; ',
        'id'=>'calotota','readonly'
        ]) }}
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control  responsi ">CALORÍAS TOTALES/Kg//Día</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('caltotkg',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->caltotkg,2,",", "."):null,
            ['class'=>'textinpu','style'=>'text-align: right; ',
            'id'=>'caltotkg','readonly'
            ]) }}
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control  responsi ">RELACIÓN CALCIO/FÓSFORO (< 2)</div>
                <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
                    {{ Form::text('calcfosf',
                        isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->calcfosf,2,",", "."):null,
                    ['class'=>'textinpu','style'=>'text-align: right; ',
                    'id'=>'calcfosf','readonly'
                    ]) }}

                </div>
                <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control  altoxxxx">
                    {{ Form::text('calcfosv',
                        $todoxxxx['calculos']['calcfosv'],
                    ['class'=>'textinpu','style'=>'text-align: right; text-align: left; ',
                    'id'=>'calcfosv','readonly'
                    ]) }}

                </div>

        </div>
    </div>

    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control  responsi ">PESO TEÓRICO</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control  altoxxxx" style="text-align: right;">
            {{ Form::text('pesoteor',
                isset($todoxxxx['modeloxx'])?number_format($todoxxxx['modeloxx']->pesoteor,2,",", "."):null,
                    ['class'=>'textinpu','style'=>'text-align: right; ',
                    'id'=>'pesoteor','readonly'
                    ]) }}
        </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
