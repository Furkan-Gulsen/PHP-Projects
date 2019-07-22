<?php 

try{
  $dataConnect = new PDO('mysql:host=localhost;dbname=multiple;charset=UTF8','root','');
}catch(PDOException $e){
  echo 'ERROR: ' . $e->getMessage();
  die();
};


?>