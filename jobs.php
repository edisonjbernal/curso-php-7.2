<?php

/*
Antes de php 7
use App\Models\Job;
use App\Models\Project;*/
use App\Models\{Job,Project};

$jobs=Job::all();

//$projectLib = new Lib1\Project();

/*

$project1 = new Project('Project 1','Description 1');

$projects=[
  $project1
];*/

function printElement($job){  ?>

  <li class="work-position">
    <h5><?php echo $job->title; ?></h5>
    <p><?php echo $job->description; ?></p>
    <p>Tiempo de trabajo: <?php  echo $job->getDurationAsString(); ?></p>
    <strong>Achievements:</strong>
    <ul>
      <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
      <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
      <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
    </ul>
  </li>

<?php
}
