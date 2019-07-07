<?php

// mysql ile bağlantıyı sağlayalım
try{
  $db = new PDO("mysql:host=localhost;dbname=form;charset=UTF8",'root','');
}catch(PDOException $e){
  echo 'There was an error connecting to the database';
  echo $e->getMessage();
  die();
};

?>