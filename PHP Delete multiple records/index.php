<?php require_once('connect.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="./style.css">
  <title>Delete Multiple Records</title>
</head>
<body>
  
  <?php

  $query = $dataConnect->prepare('SELECT * FROM people');
  $query->execute();

  $peopleCount = $query->rowCount();
  $record      = $query->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <form action='result.php' method='post'>
    <table id="customers">
      <th>ID</th>
      <th>NAME</th>
      <th>SURNAME</th>
      <th>DELETE</th>
  <?php
  foreach($record as $recordPerson){?>   
      <tr>
        <td><?php echo $recordPerson['id'] ?></td>
        <td><?php echo $recordPerson['name'] ?></td>
        <td><?php echo $recordPerson['surname'] ?></td>
        <td><input type='checkbox' name='delete[]' value='<?php echo $recordPerson['id'] ?>'></td>
      </tr>
  <?php 
  }
  ?>
    </table>
    <button type='submit'>DELETE</button>
  </form>
</body>
</html>