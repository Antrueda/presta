<?php

use App\Models\Medicamentos\Mmarca;
use Illuminate\Database\Seeder;

class MmarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mmarca::create(['id' => 1, 'nombcome' => 'AMINOVEN 10% ', 'osmorali' => 990, 'pesoespe' => 1.03, 'formfarm' => 'SOLUCION', 'medicame_id' => 1, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 2, 'nombcome' => 'ANIMOPLASMAL 10%', 'osmorali' => 821, 'pesoespe' => 1.04, 'formfarm' => 'SOLUCION', 'medicame_id' => 1, 'marcaxxx' => 'BBRAUN', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 3, 'nombcome' => 'TRAVASOL 10% S.E.', 'osmorali' => 996, 'pesoespe' => 1.03, 'formfarm' => 'SOLUCION', 'medicame_id' => 1, 'marcaxxx' => 'BAXTER', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 4, 'nombcome' => 'AMINOVEN 15%', 'osmorali' => 1505, 'pesoespe' => 1.05, 'formfarm' => 'SOLUCION', 'medicame_id' => 2, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 5, 'nombcome' => 'TRAVASOL PLUS 15%', 'osmorali' => 1357, 'pesoespe' => 1.04, 'formfarm' => 'SOLUCION', 'medicame_id' => 2, 'marcaxxx' => 'BAXTER', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 6, 'nombcome' => 'DIPEPTIVEN 100 ML x 10', 'osmorali' => 921, 'pesoespe' => 1.07, 'formfarm' => 'SOLUCION', 'medicame_id' => 4, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 7, 'nombcome' => 'GLYCOPHOS 20 ML', 'osmorali' => 2760, 'pesoespe' => 99.99, 'formfarm' => 'SOLUCION', 'medicame_id' => 5, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 8, 'nombcome' => 'FOSFATO DE POTASIO 10 ML', 'osmorali' => 6380, 'pesoespe' => 99.99, 'formfarm' => 'INYECTABLE', 'medicame_id' => 6, 'marcaxxx' => 'CORPAUL', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 9, 'nombcome' => 'FP-20', 'osmorali' => 4890, 'pesoespe' => 1.1, 'formfarm' => 'SOLUCION INYECTABLE', 'medicame_id' => 7, 'marcaxxx' => 'PISA', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 10, 'nombcome' => 'GLUCOSE', 'osmorali' => 2523, 'pesoespe' => 1.19, 'formfarm' => 'SOLUCION', 'medicame_id' => 8, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 11, 'nombcome' => 'DEXTROXA', 'osmorali' => 2775.39, 'pesoespe' => 1.19, 'formfarm' => 'SOLUCION', 'medicame_id' => 8, 'marcaxxx' => 'CORPAUL', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 12, 'nombcome' => 'GLUCOSE', 'osmorali' => 505, 'pesoespe' => 1.02, 'formfarm' => 'SOLUCION', 'medicame_id' => 9, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 13, 'nombcome' => 'SODIO CLORURO', 'osmorali' => 4000, 'pesoespe' => 1.08, 'formfarm' => 'INYECTABLE', 'medicame_id' => 10, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 14, 'nombcome' => 'SODIO CLORURO', 'osmorali' => 4000, 'pesoespe' => 1.08, 'formfarm' => 'INYECTABLE', 'medicame_id' => 10, 'marcaxxx' => 'ROPHSON', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 15, 'nombcome' => 'POTASIO CLORURO', 'osmorali' => 4000, 'pesoespe' => 1.08, 'formfarm' => 'INYECTABLE', 'medicame_id' => 11, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 16, 'nombcome' => 'POTASIO CLORURO', 'osmorali' => 4000, 'pesoespe' => 1.08, 'formfarm' => 'INYECTABLE', 'medicame_id' => 11, 'marcaxxx' => 'CORPAUL', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 17, 'nombcome' => 'CALCIO GLUCONATO', 'osmorali' => 680, 'pesoespe' => 1.05, 'formfarm' => 'INYECTABLE', 'medicame_id' => 12, 'marcaxxx' => 'BBRAUN', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 18, 'nombcome' => 'MAGNESIO SULFATO', 'osmorali' => 1623, 'pesoespe' => 1.09, 'formfarm' => 'INYECTABLE', 'medicame_id' => 13, 'marcaxxx' => 'ROPHSON', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 19, 'nombcome' => 'MAGNESIO SULFATO', 'osmorali' => 1623, 'pesoespe' => 1.09, 'formfarm' => 'INYECTABLE', 'medicame_id' => 13, 'marcaxxx' => 'RYAN', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 20, 'nombcome' => 'TRACUTIL', 'osmorali' => 38, 'pesoespe' => 0.99, 'formfarm' => 'INYECTABLE', 'medicame_id' => 14, 'marcaxxx' => 'BBRAUN', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 21, 'nombcome' => 'ADAMEL', 'osmorali' => 3100, 'pesoespe' => 1.1, 'formfarm' => 'SOLUCION INYECTABLE', 'medicame_id' => 15, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 22, 'nombcome' => 'ELEMENTOS TRAZA', 'osmorali' => 70.32, 'pesoespe' => 1, 'formfarm' => 'INYECTABLE', 'medicame_id' => 16, 'marcaxxx' => 'CORPAUL', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 23, 'nombcome' => 'CERNEVIT', 'osmorali' => 4.5, 'pesoespe' => 1.01, 'formfarm' => 'INYECTABLE', 'medicame_id' => 30, 'marcaxxx' => 'BBRAUN', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 24, 'nombcome' => 'VITALIPID AD', 'osmorali' => 300, 'pesoespe' => 0.99, 'formfarm' => 'INYECTABLE', 'medicame_id' => 18, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 25, 'nombcome' => 'SOLUVIT', 'osmorali' => 490, 'pesoespe' => 1, 'formfarm' => 'POLVO LIOFILIZADO', 'medicame_id' => 20, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 26, 'nombcome' => 'VITAMINA C', 'osmorali' => 1, 'pesoespe' => 1, 'formfarm' => 'INYECTABLE', 'medicame_id' => 21, 'marcaxxx' => 'RYAN', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 27, 'nombcome' => 'COMPLEJO B', 'osmorali' => 1, 'pesoespe' => 1, 'formfarm' => 'INYECTABLE', 'medicame_id' => 22, 'marcaxxx' => 'ECAR', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 28, 'nombcome' => 'TIAMINA', 'osmorali' => 1, 'pesoespe' => 1, 'formfarm' => 'INYECTABLE', 'medicame_id' => 23, 'marcaxxx' => 'ECAR', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 29, 'nombcome' => 'ACIDO FOLICO', 'osmorali' => 1, 'pesoespe' => 1, 'formfarm' => 'INYECTABLE', 'medicame_id' => 24, 'marcaxxx' => 'ECAR', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 30, 'nombcome' => 'VITAMINA K', 'osmorali' => 1, 'pesoespe' => 1, 'formfarm' => 'INYECTABLE', 'medicame_id' => 25, 'marcaxxx' => 'ECAR', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 31, 'nombcome' => 'LIPOFUNDIN 20%', 'osmorali' => 380, 'pesoespe' => 0.97, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 26, 'marcaxxx' => 'BBRAUN', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 32, 'nombcome' => 'LIPOVENOES 20%', 'osmorali' => 273, 'pesoespe' => 0.99, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 26, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 33, 'nombcome' => 'LIPOVENOES 20%', 'osmorali' => 273, 'pesoespe' => 0.99, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 26, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 34, 'nombcome' => 'CLINOLEIL 20%', 'osmorali' => 270, 'pesoespe' => 0.99, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 26, 'marcaxxx' => 'BAXTER', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 35, 'nombcome' => 'LIPOPLUS 20%', 'osmorali' => 410, 'pesoespe' => 0.98, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 27, 'marcaxxx' => 'BBRAUN', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 36, 'nombcome' => 'SMOFLIPID', 'osmorali' => 380, 'pesoespe' => 0.99, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 27, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 37, 'nombcome' => 'AMINOVEN PEDIATRICO', 'osmorali' => 885, 'pesoespe' => 1.03, 'formfarm' => 'SOLUCION', 'medicame_id' => 3, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 38, 'nombcome' => 'PEDITRACE', 'osmorali' => 38, 'pesoespe' => 1, 'formfarm' => 'INYECTABLE', 'medicame_id' => 17, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 39, 'nombcome' => 'VITALIPID INFANT', 'osmorali' => 330, 'pesoespe' => 1, 'formfarm' => 'INYECTABLE', 'medicame_id' => 19, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 40, 'nombcome' => 'MULTI12 K1 (vial 1)', 'osmorali' => 296, 'pesoespe' => 1.02, 'formfarm' => 'INYECTABLE', 'medicame_id' => 30, 'marcaxxx' => 'BAXTER', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 41, 'nombcome' => 'MULTI12 K1(vial 2)', 'osmorali' => 301, 'pesoespe' => 1.03, 'formfarm' => 'INYECTABLE', 'medicame_id' => 30, 'marcaxxx' => 'BAXTER', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 42, 'nombcome' => 'OMEGAVEN 10%', 'osmorali' => 308, 'pesoespe' => 0.99, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 28, 'marcaxxx' => 'FRESENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 43, 'nombcome' => 'AGUA ESTERIL', 'osmorali' => 1, 'pesoespe' => 1, 'formfarm' => 'SOLUCION', 'medicame_id' => 29, 'marcaxxx' => 'BAXTER', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 44, 'nombcome' => 'AGUA ESTERIL', 'osmorali' => 1, 'pesoespe' => 1, 'formfarm' => 'SOLUCION', 'medicame_id' => 29, 'marcaxxx' => 'QUIBU', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 45, 'nombcome' => 'AGUA ESTERIL', 'osmorali' => 1, 'pesoespe' => 1, 'formfarm' => 'SOLUCION ', 'medicame_id' => 29, 'marcaxxx' => 'CORPAUL', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);    
    
    }
}
