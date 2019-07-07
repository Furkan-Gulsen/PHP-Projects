
<?php require 'navbar.php' 
?>

    
  <style> <?php include 'comment.css'; ?> </style>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<form action="comment.php" method='post'>
  <h1>WRITE COMMENT</h1>
  <div class="row">
    <input type="text" name="fullName" id="fancy-text"/>
    <label for="fancy-text">Name</label>
  </div>
  <div class="row">
    <input type="text" name="email" id="fancy-text"/>
    <label for="fancy-text">MAIL</label>
  </div>
  <div class="row">
    <textarea name="comment" id="fancy-textarea"></textarea>
    <label for="fancy-textarea">Description</label>
  </div>
  <button type="submit" name='submit' tabindex="0">Submit</button>
</form>
