<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="./form.css">
  
  <title>PHP Email</title>
</head>
<body>

  <form action="result.php" method='post'>
    <div class="container">
    <div class="row">
        <h1>contact us</h1>
    </div>
    <div class="row">
        <h4 style="text-align:center">We'd love to hear from you!</h4>
    </div>
    <div class="row input-container">
        <div class="col-xs-12">
          <div class="styled-input wide">
            <input type="text" name='fullname' required />
            <label>Fullname</label> 
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="styled-input">
            <input type="text" name='email' required />
            <label>Email</label> 
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="styled-input" style="float:right;">
            <input type="text" name='subject' required />
            <label>Subject</label> 
          </div>
        </div>
        <div class="col-xs-12">
          <div class="styled-input wide">
            <textarea name='message' required></textarea>
            <label>Message</label>
          </div>
        </div>
        <div class="col-xs-12">
          <button type='submit' class="btn-lrg submit-btn">Send Message</button>
        </div>
    </div>
  </div>

  </form>
  
</body>
</html>