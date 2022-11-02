<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers\Cformula;
use App\Models\Medicamentos\Casa;
use App\Models\Medicamentos\Medicame;

/**
 * Realiza los calculos por cada una de las casas para requerimiento total, purga, requerimiento diario y volumen
 *
 * @author Ing. José Dúmar Jiménez Ruíz (nowen21@gmail.com)
 */
class CasasFormulacion {

  private $estructu;
  private $pesoxxxx;
  private $npt_idxx;
  private $purgaxxx;
  private $volutota;
  private $aminoaci;
  private $fosfatos;
  private $carbohid;
  private $sodiosxx;
  private $potasios;
  private $calcioxx;
  private $magnesio;
  private $elemento;
  private $hidrosol;
  private $liposolu;
  private $glutamin;
  private $vitaminc;
  private $complejb;
  private $tiaminax;
  private $acidosxx;
  private $vitamink;
  private $lipidosx;
  private $aguasxxx;


  /**
   * Constructor para la clase.
   * @param  $dataxxxx array con toda la data que se genera al guardar o editar una formulacion

   */
  public function __construct($dataxxxx) {

    $casasxxx = Casa::all();
    $this->pesoxxxx = $dataxxxx['peso'];
    $this->npt_idxx = $dataxxxx['npt_id'];

    $this->volutota = $dataxxxx['tiempo'] * $dataxxxx['velocidad'];

    $this->purgaxxx = ($this->volutota + $dataxxxx['purga']) / $this->volutota ;

    foreach ($casasxxx as $key => $casa) {
      $medicame = [];
      foreach ($casa->medicames as $key => $medicamx) {
        $medicame[$medicamx->id] = $this->estructura();
      }
      $this->estructu[$casa->id] = $medicame;
    }

    $this->aminoaci = new Aminoacidos($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->fosfatos = new Fosfatos($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->carbohid = new Carbohidratos($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->sodiosxx = new Sodios($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->potasios = new Potasios($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->calcioxx = new Calcios($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->magnesio = new Magnesios($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->elemento = new ElementosTrazas($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->hidrosol = new MultivitaminasHidrosolubles($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->liposolu = new MultivitaminasLiposolubles($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->glutamin = new Glutaminas($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->vitaminc = new VitaminasC($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->complejb = new ComplejosB($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->tiaminax = new Tiaminas($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->acidosxx = new Acidos($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->vitamink = new VitaminasK($this->estructu, $this->pesoxxxx, $this->npt_idxx);
    $this->lipidosx = new Lipidos($this->estructu, $this->pesoxxxx, $this->npt_idxx);

    $this->aguasxxx = new Aguas($this->estructu, $this->pesoxxxx, $this->npt_idxx);
  }

  private function estructura() {
    $estructu['rediario'] = 0; // requerimiento diario del medicamento cuando se formula por volumen
    $estructu['reqtotal'] = 0; // requerimiento total del medicamnto
    $estructu['volumenx'] = 0; // volumen requerido por el medicamento cuando se formula por requeriminto diario
    $estructu['purgaxxx'] = 0; // calculo * purga
    return $estructu;
  }
  public function calculos($dataxxxx) {


    $medicame = Medicame::where('id', $dataxxxx['medisele'])->first();
    $calculox=[];
    switch ($medicame->casa->id) {
      case 1:
        $calculox=$this->aminoaci->aminoacido($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 2:
        $calculox=$this->fosfatos->fosfato($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 3:
        $calculox=$this->carbohid->carbohidrato($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 4:
        $calculox=$this->sodiosxx->sodio($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 5:
        $calculox=$this->potasios->potasio($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 6:
        $calculox=$this->calcioxx->calcio($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 7:
        $calculox=$this->magnesio->magnesio($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 8:
        $calculox=$this->elemento->elemento($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 9:
        $calculox=$this->hidrosol->hidrosoluble($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 10:
        $calculox=$this->glutamin->glutamina($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 11:
        $calculox=$this->vitaminc->vitaminac($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 12:
        $calculox=$this->complejb->complejob($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 13:
        $calculox=$this->tiaminax->tiamina($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 14:
        $calculox=$this->acidosxx->acido($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 15:
        $calculox=$this->vitamink->vitaminak($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 16:
        $calculox=$this->lipidosx->lipido($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 17:
        $calculox=$this->liposolu->liposoluble($dataxxxx, $medicame, $this->purgaxxx);
        break;
      case 18:

        $calculox=$this->aguasxxx->agua($dataxxxx, $medicame, $this->purgaxxx);
        break;
    }
    return $calculox;
  }

}
