<?php

class BaseElement {
  //Private: Solo esta clase
  //Public: Desde cualquier lado puede ser accedido
  //Protected: Solo desde la clase y desde las clases hijas pueden ser accedidos
  protected $title;
  public $description;
  public $visible = true;
  public $months;


public function __construct($title,$description){
    $this->setTitle($title);
    $this->description = $description;
}

  public function setTitle($t){
    if(!$t){
      $this->title = 'N/A';
    }
    else{
      $this->title = $t;
    }
  }

  public function getTitle(){
    return $this->title;
  }

  function getDurationAsString(){
    $years= floor($this->months / 12);
    $extraMonths=$this->months % 12;
    $totalTime='';
  if($years){
    $totalTime=$years.' año';
    if($years > 1){
      $totalTime.='s';
    }
  }
  if($extraMonths){
    if($years){
      $totalTime.=' y ';
    }
    $totalTime.=$extraMonths.' mes';
    if($extraMonths > 1){
      $totalTime.='es';
    }
  }
    return $totalTime.'.';
  }

}
