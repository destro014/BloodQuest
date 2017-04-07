<!DOCTYPE html>
<?php
  session_start();
  $_SESSION['message']='';
  //create connection
  $conn = new mysqli('localhost','root','greenland','blood');
  //check connection
  if($conn->connect_error){
  die("Connection Failed:".$conn->connect_error);
}

if($_SERVER['REQUEST_METHOD']=='POST'){  
    $firstname=$conn->real_escape_string($_POST['firstname']);
    $lastname=$conn->real_escape_string($_POST['lastname']);
    $username=$conn->real_escape_string($_POST['username']);
    $email=$conn->real_escape_string($_POST['email']);
    $password=$conn->real_escape_string($_POST['password']);
    $confirmpassword=$conn->real_escape_string($_POST['confirmpassword']);
    $bloodgroup=$conn->real_escape_string($_POST['bloodgroup']);
    $location=$conn->real_escape_string($_POST['location']);
    $phone=$conn->real_escape_string($_POST['phone']);
    $gender=$conn->real_escape_string($_POST['gender']);

    if($password==$confirmpassword){
      //create user
      $password=md5($password);  //hash form of password;
      //make sure file type is image
      /*if(preg_match("!image!",$_FILES['avatar']['type'])){
        //copy avatar to images/ folder
        if(copy($_FILES['avatar']['tmp_name'],$avatar_path)){
          $_SESSION['username']=$username;
          $_SESSION['avatar']=$avatar_path ;
        }
        else{
          $_SESSION['message']="Failed to upload file!";
        }
      }
      else{
        $_SESION['message']="Only upload image of .JIF, .JPG, .BMP images";
      }
*/
      $sql = "INSERT INTO users (firstname,lastname,username,email,password,bloodgroup,location,phone,gender) VALUES('$firstname','$lastname','$username','$email','$password','$bloodgroup','$location','$phone','$gender')";
       /*if($conn->query($sql)===true){
        echo "New Record created successfully";
       }

       else{
        echo"Echo:".$sql."<br>".$conn->error;
       }*/
       $conn->query($sql);
       $_SESSION['message']="You are now logged in !";
       $_SESSION['username']=$username;
       header("location:home.php");

    }
    else{
      //failed to create user
      $_SESSION['message']="Two password did not matched";
    }

  }

        //make sure file type is image

?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/form.css">
  </head>
  <body>
    <div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" autocomplete="on">
      <div class="alert alert-error"><?= $_SESSION['message']?></div>
      <table>
        <tr>
          <td><input type="text" placeholder="First name" name="firstname" required /></td>
        </tr>
        <tr>
          <td><input type="text" placeholder="last name" name="lastname" required /></td>
        </tr>
        <tr>
          <td><input type="text" placeholder="User Name" name="username" required /></td>
        </tr>
        <tr>
          <td><input type="email" placeholder="Email" name="email" required /></td>
        </tr>
        <tr>
          <td><input type="password" placeholder="Password" name="password" autocomplete="new-password" required /></td>
        </tr>
        <tr>
        <td><input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required /></td>
        </tr>
        <tr>
          <td><input type="text" placeholder="Blood Group in capital letter" name="bloodgroup" required /></td>
        </tr>
        <tr>
          <td><input type="text" placeholder="Location" name="location" required /></td>
        </tr>
        <tr>
          <td><input type="number" placeholder="Phone Number:" name="phone" required /></td>
        </tr>
        <tr>
          <td><input type="text" placeholder="Gender" name="gender" required /></td>
        </tr>
      <tr>
          <td>
             <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
          </td>
        </tr>
        <tr>
          <td><input type="submit" value="Register" name="register" class="btn btn-block btn-primary" /></td>
        </tr>
      </table>
      <!--Gender: &nbsp;<input type="radio" name="male"required> Male  &nbsp;&nbsp;
              <input type="radio" required> Female <br>-->
    </form>
  </div>
</div>
  </body>
</html>
