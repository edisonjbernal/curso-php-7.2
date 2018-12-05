<?php

require_once 'BaseElement.php';

class Job extends BaseElement{


  public function __construct($title,$description){
    $newTitle='Trabajo: '.$title;
    parent::__construct($newTitle,$description);
  }

  function getDurationAsString(){
    $years= floor($this->months / 12);
    $extraMonths=$this->months % 12;
    $totalTime='Trabajo';
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
