<?php

namespace App\Models;

require_once 'BaseElement.php';

class Project extends BaseElement{

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
