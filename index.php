<!DOCTYPE html>
<?php
  session_start();
  $_SESSION['message']='';
  $conn = new mysqli("localhost","root","Destro","blood");
  if(isset($_POST['register'])){
header("location:register.php");
}
if(isset($_SESSION['username'])){
    header('location:home.php');
  }

if($_SERVER['REQUEST_METHOD']=='POST'){  //  session_start();

    $username=$conn->real_escape_string($_POST['username']);

    $password=$conn->real_escape_string($_POST['password']);
    $password=md5($password);

    $get="SELECT * FROM users WHERE username='$username' AND password='$password'";

       $result=$conn->query($get);
       if(mysqli_num_rows($result)== 1){
         $_SESSION['message']="You are now logged in !";
         $_SESSION['username']=$username;
         header("location:home.php");
       }
       else{
         $_SESSION['message']="username or password did not matched!";

       }

    }
  ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Blood Quest</title>
    <link rel="stylesheet" href="css/form.css">
     <link rel="shortcut icon" href="img/blood.png">
  </head>
  <body>
    <center>
    <h1>Welcome to Blood Quest</h1>
    <div class="firstpageheader">
      <img src="img/blood-quest1.png" alt="logo">
    </div>
    <h3>Login:</h3>
    <div class="form">
    <form class="form" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
  <form action="index.php" method="POST">
  <table>
    <tr>
      <td>Not registerd yet?</td>
    </tr>
    <tr>
      <td>  <input type="submit" value="Register Now" name="register" class="btn btn-block btn-primary"></td>
    </tr>
  </table>
</form>
</center>
  </body>
</html>
