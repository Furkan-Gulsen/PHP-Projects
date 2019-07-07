<?php require 'navbar.php' ?>

<?php

  require_once 'connect.php';

  $dat = $db->prepare('SELECT * FROM formInformation');
  $dat->execute();
  $val = $dat->fetchAll(PDO::FETCH_ASSOC);



?>
<style> <?php include 'admin.css'; ?> </style>

<ul>
  <?php foreach($val as $veri): ?>
    <li class='box'>
      <div class='name'><?php echo $veri['fullName']; ?></div>
      <a class='but1' href="index.php?page=read&id=
              <?php echo $veri['id'] ?>" >VIEW</a>
      <a class='but2' href="index.php?page=answer&answer=
              <?php echo $veri['id'] ?>" > Answer </a>
    </li>
  <?php endforeach; ?>
</ul>