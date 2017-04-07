<!DOCTYPE html>
<?php
  $_SESSION['message']="";
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Blood Quest</title>
    <link rel="stylesheet" href="css/form.css">
  </head>
  <body>
    <center>
    <h1>Welcome to Blood Quest</h1>
    <div class="firstpageheader">
      <img src="img/dev.png" alt="developer image">
    </div>
    <h3>Login:</h3>
    <div class="form">
    <form class="form" action="home.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?=$_SESSION['message'] ?></div>
      <table>
        <tr>
          <td>
            <input type="text" placeholder="User Name" name="username" required />
          </td>
        </tr>
        <tr>
          <td><input type="password" placeholder="Password" name="password" required /></td>
        </tr>
        <tr>
          <td><input type="submit" value="Login" name="login" class="btn btn-block btn-primary" /></td>
        </tr>
      </table>
    </form>
  </div><br>
  <table>
    <tr>
      <td>Not registerd yet?</td>
    </tr>
    <tr>
      <td>  <a href="register.php"><input type="submit" value="Register Now" name="register" class="btn btn-block btn-primary"></a></td>
    </tr>
  </table>
  </table>
</center>
  </body>
</html>
