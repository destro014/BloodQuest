<!DOCTYPE html>
<?php
 session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/form.css">
  </head>
  <body>
    <div class="body-content">
      <div class="welcome">
        <div class="alert alert-sucess"><?=$_SESSION['message']?></div>
    <h1>Welcome</h1>
    <?php echo $_SESSION['username']; ?>
  </div>
</div>
  </body>
</html>