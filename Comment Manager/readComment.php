<?php require 'navbar.php' ?>

<?php
require_once 'connect.php';

if(!isset($_GET['id']) || empty($_GET['id'])){
  echo '404 Not Found';
  die();
};


$sorgu = $db->prepare('SELECT * FROM formInformation WHERE id=?');
$sorgu->execute([$_GET['id']]);
$ders = $sorgu->fetch(PDO::FETCH_ASSOC);
?>

<style> <?php include './commentView/commentView.css'; ?> </style>
<div class="testimonials-container">
	<p class="testimonial"><?php echo $ders['comment'] ?></p>
	<div class="centered-items">
		<div class="user-details">
			<h4 class="username"><b>NAME: </b><?php echo $ders['fullName'] ?></h4>
			<p class="role"><b>MAIL: </b><?php echo $ders['email'] ?></p>
		</div>
  </div>
</div>

<?php

$execute = $db->prepare('SELECT * FROM formInformation
                         INNER JOIN answers
                         ON formInformation.id = answers.id
                         WHERE id=?');
$execute->execute(array($_GET['id']));
$dersler = $sorgu->fetch(PDO::FETCH_ASSOC);


if($dersler){
  echo 'henüz yanıt verilmemiş...';
}else{
  $ex = $db->prepare('SELECT * FROM answers WHERE id = ?');
  $ex->execute([$_GET['id']]);
  $suc = $ex->fetch(PDO::FETCH_ASSOC);
  if(!isset($suc['comment']) || empty($suc['comment'])){ ?>

  <div class="testimonials-container">
    <p class="testimonial">No replied yet.</p>
  </div>

  <?php
  }else{
    ?>

  <div class="testimonials-container">
    <p class="testimonial"><?php echo $suc['comment'] ?></p>
    <div class="centered-items">
      <div class="user-details">
        <h4 class="username">ADMIN</h4>
      </div>
    </div>
  </div>
    <?php
  };

};



?>
<style> <?php include 'style.css'; ?> </style>
