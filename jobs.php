<?php

$jobs=[
  [
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
  ]
];

function getDuration($months){
  $years= floor($months / 12);
  $extraMonths=$months % 12;
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


function printJob($job,$totalMonths){  ?>

  <li class="work-position">
    <h5><?php echo $job['title']; ?></h5>
    <p><?php echo $job['description']; ?></p>
    <p>Hace <?php echo $totalMonths; ?> meses</p>
    <p>Tiempo de trabajo: <?php echo getDuration($job['months']); ?></p>
    <strong>Achievements:</strong>
    <ul>
      <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
      <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
      <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
    </ul>
  </li>

<?php
}
