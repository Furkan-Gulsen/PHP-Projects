<?php require 'navbar.php' ?>



<style> <?php include 'comment.css'; ?> </style>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<form action="" method='post'>
  <h1>WRITE COMMENT</h1>
  <div class="row">
    <textarea name="comment" id="fancy-textarea"></textarea>
    <label for="fancy-textarea">Description</label>
  </div>
  <button type="submit" name='submit' tabindex="0">Submit</button>
</form>


<?php
  require_once 'connect.php';
  if(!isset($_GET['answer']) || empty($_GET['answer'])){
    echo '404 Not A Find Page';
    die();
  };
  if(isset($_POST['comment'])){
    if(!empty($_POST['comment'])){
      $data = [];
      $comment = $_POST['comment'];
      $id = $_GET['answer'];
      // kontrol yap
      $control = $db->prepare('SELECT * FROM answers WHERE id=?');
      $control->execute(array($id));
      $controlFetch = $control->fetch(PDO::FETCH_ASSOC);


      if($controlFetch['id']){
        $execute = $db->prepare("UPDATE answers SET comment=? WHERE id=?");
        $execute->execute(array($comment,$id));
        $execute->fetch(PDO::FETCH_ASSOC);
        echo 'yorum başarıyla güncellendi';
      }else{
        $execute = $db->prepare('INSERT INTO answers(id,comment) VALUES(?,?)');
        $execute->execute(array($id,$comment));
        $execute->fetch(PDO::FETCH_ASSOC);
        echo 'yorum başarıyla yollandı...';
      }
    }else{
      echo 'düzgün gir değerleri...';
    }
  }

?>