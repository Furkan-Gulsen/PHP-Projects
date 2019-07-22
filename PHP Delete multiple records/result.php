<?php require_once('connect.php') ?>

<?php 

  function GetFilter($value){
    $step1 = trim($value);
    $step2 = strip_tags($step1);
    $step3 = htmlspecialchars($step2);
    return $step3;
  };

  $GetDelete     = $_POST['delete'];
  $GetDeleteTidy = GetFilter(implode(',', $GetDelete));

  $DELETE = $dataConnect->prepare("DELETE FROM people WHERE id IN ($GetDeleteTidy)");
  $DELETE->execute();

  header('Location:index.php');
  exit();

?>