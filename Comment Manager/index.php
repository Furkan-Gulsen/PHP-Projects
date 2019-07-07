<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Form</title>
</head>
<body>

<?php 

if(!isset($_GET['page'])){
  $_GET['page'] = 'index';
}



switch ($_GET['page']) {
  case 'index':
    require_once 'forum.php';
    break;
  case 'admin':
    require_once './Admin/admin.php';
    break;
  case 'read':
    require_once 'readComment.php';
    break;
  case 'answer':
    require_once 'answer.php';
    break;
  case 'commentView':
    require_once './commentView/commentView.php';
    break;
}
?>


</body>
</html>


