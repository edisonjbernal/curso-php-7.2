<?php


class Job {
  private $title;
  public $description;
  public $visible;
  public $months;

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

$job1 = new Job();
$job1->setTitle('PHP Developer');
$job1->description='Algunos proyectos de esta área PHP';
$job1->visible=true;
$job1->months=25;

$job2 = new Job();
$job2->setTitle('JS Developer');
$job2->description='Algunos proyectos de esta área JS';
$job2->visible=true;
$job2->months=1;

$job3 = new Job();
$job3->setTitle('');
$job3->description='Algunos proyectos de esta área CSS y HTML';
$job3->visible=true;
$job3->months=4;

$jobs=[
  $job1,
  $job2,
  $job3
/*  [
    'title'=>'PHP Developer',
    'description'=>'Algunos proyectos de esta área PHP',
    'visible'=>true,
    'months'=>25
  ],
  [
    'title'=>'JS Developer',
    'description'=>'Algunos proyectos de esta área JS',
    'visible'=>true,
    'months'=>1
  ],
  [
    'title'=>'HTML AND CSS',
    'description'=>'Algunos proyectos de esta área HTML CSS',
    'visible'=>true,
    'months'=>13
  ],
  [
    'title'=>'Frontend Developer',
    'description'=>'Algunos proyectos de esta área HTML CSS',
    'visible'=>false,
    'months'=>2
  ],
  [
    'title'=>'.Net Developer',
    'description'=>'Algunos proyectos de esta área HTML CSS',
    'visible'=>true,
    'months'=>6
  ]*/
];




function printJob($job,$totalMonths){  ?>

  <li class="work-position">
    <h5><?php echo $job->getTitle(); ?></h5>
    <p><?php echo $job->description; ?></p>
    <p>Hace <?php echo $totalMonths; ?> meses</p>
    <p>Tiempo de trabajo: <?php echo $job->getDurationAsString(); ?></p>
    <strong>Achievements:</strong>
    <ul>
      <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
      <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
      <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
    </ul>
  </li>

<?php
}
