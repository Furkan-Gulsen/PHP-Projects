<?php require 'navbar.php' ?>

<?php
 require_once 'connect.php';

$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$comment = isset($_POST['comment']) ? $_POST['comment'] : null;

if(!$fullName){echo 'Do not leave fullName blank ...';}
elseif(!$email){echo 'Do not leave email blank ...';}
elseif(!$comment){echo 'Do not leave comment blank ...';}
else{
  $add = $db->prepare('INSERT INTO formInformation(fullName,email,comment) 
                        VALUES(:fullName,:email,:comment)');
  $add->bindParam(':fullName',$fullName, PDO::PARAM_STR);
  $add->bindParam(':email',$email, PDO::PARAM_STR);
  $add->bindParam(':comment',$comment, PDO::PARAM_STR);
  $add->execute();
  if($add){
    echo 'comment added';
  }else{
    echo 'There was an error adding comments. try again.';
  };

  $dat = [];
  $getData = $db->query('SELECT * FROM formInformation',PDO::FETCH_ASSOC);
  if($getData){
   foreach($getData as $data){
     $dat[] = $data;
    };
  };
  $db->query('TRUNCATE TABLE formInformation');

  $setData = $db->prepare('INSERT INTO formInformation(fullName,email,comment) 
                      VALUES(:fullName,:email,:comment)');

  foreach($dat as $val){
    $dat_fullName = $val['fullName'];
    $dat_email = $val['email'];
    $dat_comment = $val['comment'];
    $setData->bindParam(':fullName',$dat_fullName, PDO::PARAM_STR);
    $setData->bindParam(':email',$dat_email, PDO::PARAM_STR);
    $setData->bindParam(':comment',$dat_comment, PDO::PARAM_STR);
    $setData->execute();
  }
}
 $db = null;
 header('Location:index.php')
?>