<?php require 'navbar.php' ?>

<?php
  require_once 'connect.php';
  if(!isset($_GET['answer']) || empty($_GET['answer'])){
    echo '404 Not A Find Page';
    die();
  };

  $comment = $_POST['comment'];
  echo $_POST['comment'];
  echo  $_POST['id'];
  $execute = $db->prepare('INSERT INTO answers(id,comment) VALUES(?,?)');
  $execute->execute(array($id));
  $execute->fetch(PDO::FETCH_ASSOC);

  header('Location: admin.php');

?>