<?php

use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Medicame;
use App\Models\Medicamentos\Mnpt;
use Illuminate\Database\Seeder;

class MedicamesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $magicosx =  ['sis_esta_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1];

    Medicame::create(['nombgene' => 'AMINOÁCIDOS ADULTOS 10% S/E', 'concentr' => '10', 'unidconc' => '% S/E', 'unidmedi' => 'g/kg/día', 'casa_id' => '1', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'AMINOÁCIDOS ADULTOS 15% S/E', 'concentr' => '15', 'unidconc' => '% S/E', 'unidmedi' => 'g/kg/día', 'casa_id' => '1', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'AMINOÁCIDOS PEDIÁTRICOS 10% ', 'concentr' => '10', 'unidconc' => '%', 'unidmedi' => 'g/kg/día', 'casa_id' => '1', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'ALANIL-GLUTAMINA ', 'concentr' => '20', 'unidconc' => '%.', 'unidmedi' => 'g/kg/día', 'casa_id' => '10', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'FOSFATO PARENTERAL DE SODIO ', 'concentr' => '1', 'unidconc' => 'mmol', 'unidmedi' => 'mmol/día', 'casa_id' => '2', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'FOSFATO PARENTERAL DE POTASIO 2,6 mmol', 'concentr' => '2', 'unidconc' => 'mmol', 'unidmedi' => 'mmol/día', 'casa_id' => '2', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'FOSFATO PARENTERAL DE POTASIO 1mmol', 'concentr' => '1', 'unidconc' => 'mmol', 'unidmedi' => 'mmol/día', 'casa_id' => '2', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'DEXTROSA 50%', 'concentr' => '50', 'unidconc' => '%', 'unidmedi' => 'mg / kg /min', 'casa_id' => '3', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'DEXTROSA 10%', 'concentr' => '10', 'unidconc' => '%', 'unidmedi' => 'mg / kg /min', 'casa_id' => '3', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'SODIO CLORURO ', 'concentr' => '2', 'unidconc' => 'meq', 'unidmedi' => 'mEq/kg/día', 'casa_id' => '4', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'POTASIO CLORURO', 'concentr' => '3', 'unidconc' => 'meq', 'unidmedi' => 'mEq/kg/día', 'casa_id' => '5', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'CALCIO GLUCONATO ', 'concentr' => '10', 'unidconc' => '%', 'unidmedi' => 'mg/día', 'casa_id' => '6', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'MAGNESIO SULFATO ', 'concentr' => '20', 'unidconc' => '%', 'unidmedi' => 'mg/día', 'casa_id' => '7', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'ELEMENTOS TRAZA 330 mcg', 'concentr' => '330', 'unidconc' => 'mcg', 'unidmedi' => 'mcgZn/día', 'casa_id' => '8', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'ELEMENTOS TRAZA 654 mcg', 'concentr' => '654', 'unidconc' => 'mcg', 'unidmedi' => 'mcgZn/día', 'casa_id' => '8', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'ELEMENTOS TRAZA 1000 mcg', 'concentr' => '1000', 'unidconc' => 'mcg', 'unidmedi' => 'mcgZn/día', 'casa_id' => '8', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'ELEMENTOS TRAZA PED', 'concentr' => '250', 'unidconc' => 'mcgZn', 'unidmedi' => 'mcg Zn++/kg/día', 'casa_id' => '8', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'VITAMINAS LIPOSOLUBLES', 'concentr' => '99', 'unidconc' => 'mcg ', 'unidmedi' => ' mg Vit A/dia', 'casa_id' => '17', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'VITAMINAS LIPOSOLUBLES INF', 'concentr' => '230', 'unidconc' => 'UI ', 'unidmedi' => ' UI Vit A/kg/dia', 'casa_id' => '17', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'VITAMINAS HIDROSOLUBLES', 'concentr' => '40', 'unidconc' => 'mcg ', 'unidmedi' => 'mg/dia', 'casa_id' => '9', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'VITAMINA C ', 'concentr' => '500', 'unidconc' => 'mg', 'unidmedi' => 'mg/día', 'casa_id' => '11', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'COMPLEJO B', 'concentr' => '1', 'unidconc' => 'ml', 'unidmedi' => 'mL/día', 'casa_id' => '12', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'TIAMINA ', 'concentr' => '100', 'unidconc' => 'mg', 'unidmedi' => 'mg/día', 'casa_id' => '13', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'ÁCIDO FÓLICO', 'concentr' => '1', 'unidconc' => 'mg', 'unidmedi' => 'mg/día', 'casa_id' => '14', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'VITAMINA K ', 'concentr' => '10', 'unidconc' => 'mg', 'unidmedi' => 'mg/día', 'casa_id' => '15', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'LIPIDOS ', 'concentr' => '20', 'unidconc' => '%', 'unidmedi' => 'g/kg/día', 'casa_id' => '16', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'LIPIDOS CON OMEGA', 'concentr' => '20', 'unidconc' => '%', 'unidmedi' => 'g/kg/día', 'casa_id' => '16', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'OMEGA 3 ', 'concentr' => '10', 'unidconc' => '%', 'unidmedi' => 'g/kg/día', 'casa_id' => '16', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'AGUA ESTERIL', 'concentr' => '1', 'unidconc' => 'ml', 'unidmedi' => 'mg', 'casa_id' => '18', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    Medicame::create(['nombgene' => 'MULTIVITAMINAS ', 'concentr' => '105', 'unidconc' => 'mcg ', 'unidmedi' => 'ml', 'casa_id' => '9', 'sis_clinica_id' => '1', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);

    $clinicax = SisClinica::find(1);
    $syncxxxx = [];
    foreach (Medicame::all() as $value) {
      $syncxxxx[$value->id] = $magicosx;
    }
    $clinicax->medicames()->sync($syncxxxx);
  }
}
