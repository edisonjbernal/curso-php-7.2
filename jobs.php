<?php

require 'app/Models/Job.php';

require 'app/Models/Project.php';


$job1 = new Job('PHP Developer','Algunos proyectos de esta área PHP');
$job1->months=25;

$job2 = new Job('JS Developer','Algunos proyectos de esta área JS');
$job2->months=1;

$job3 = new Job('','Algunos proyectos de esta área CSS y HTML');
$job3->months=4;

$project1 = new Project('Project 1','Description 1');

$jobs=[
  $job1,
  $job2,
  $job3

];

$projects=[
  $project1
];




function printElement($job){  ?>

  <li class="work-position">
    <h5><?php echo $job->getTitle(); ?></h5>
    <p><?php echo $job->description; ?></p>
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
