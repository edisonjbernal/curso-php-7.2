<?php
  var_dump($_GET);
  var_dump($_POST);



?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Job</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
      crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Add Job</h1>
<form class="" action="addJob.php" method="post">
  <label for="">Title:</label>
  <input type="text" name="title" value=""><br/>
  <label for="">Description:</label>
  <input type="text" name="description" value=""><br/>
  <button type="submit">Save</button>
</form>
  </body>
</html>
