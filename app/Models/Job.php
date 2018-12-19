<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Job extends Model{

  protected $table = 'jobs';

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
