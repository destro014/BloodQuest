<!DOCTYPE html>
<?php
 session_start();
 if (!isset($_SESSION['username'])) {
   header('location:index.php'); 
 }
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="shortcut icon" href="img/blood.png">

  </head>
  <body>
    <div class="body-content">
      <div class="welcome">
        <div class="alert alert-sucess"><?=$_SESSION['message']?></div>
    <h1>Welcome</h1>
    <?php echo $_SESSION['username']; ?>
    <br>
    <a href="logout.php">Logout</a>
  </div>
</div>
  </body>
</html>
