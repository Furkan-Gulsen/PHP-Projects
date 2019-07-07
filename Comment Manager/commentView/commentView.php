<?php require 'navbar.php' ?>

<?php

  require_once 'connect.php';
  
  $data = $db->prepare('SELECT * FROM formInformation');
  $data->execute();
  $val = $data->fetchAll(PDO::FETCH_ASSOC);


?>
<style> <?php include 'commentView.css'; ?> </style>
  
<?php foreach( $val as $arr ): ?>
<div class="testimonials-container">
	<p class="testimonial"><?php echo $arr['comment'] ?></p>
	<div class="centered-items">
		<div class="user-details">
			<h4 class="username"><b>NAME: </b><?php echo $arr['fullName'] ?></h4>
			<p class="role"><b>MAIL: </b><?php echo $arr['email'] ?></p>
		</div>
  </div>
</div>
<?php endforeach; ?>

