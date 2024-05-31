<?php
session_start();

  include("connection.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phNum = $_POST['phNum'];
    $address = $_POST['address'];

    if(!empty($email) && !empty($password) && !empty($fname) && !empty($lname) && !empty($phNum) && !empty($address)) {
      //save to database
      $query = "INSERT INTO user_info (first_name,last_name,email,phone_num,address,password) VALUES ('$fname','$lname','$email','$phNum','$address','$password')";
      mysqli_query($query);
      header("Location: login.php");
      die;
    } else{
      echo "Please enter valid values.";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catering Website</title>
  <link rel="stylesheet" href="style2TEMP.css">
</head>


<body>
  <header>
    <a href="index.php"><img class= "logo" src="logo.JPG" align="left"></a>
  </header>

  <main>
    <div class="loginBg" align="center">
      <div class="bgRectRegister" align="center">
        <h2><b>REGISTER</b></h2>
        <br><br>
        <form method="post">
            <label for="fName"><b>First Name</b></label> <br>
            <input type="text" id="fName" name="fName" required>
            <br><br><br>
            <label for="lName"><b>Last Name</b></label> <br>
            <input type="text" id="lName" name="lName" required>
            <br><br><br>
            <label for="address"><b>Address</b></label> <br>
            <input type="text" id="address" name="address" required>
            <br><br><br>
            <input type="submit" value="REGISTER" class="loginButton">
            <!--<button class="loginButton"><b>REGISTER</b></button>-->

            <br><br>
            <label for="email"><b>Email</b></label> <br>
            <input type="text" id="email" name="email" required>
            <br><br><br>
            <label for="phNum"><b>Phone Number</b></label> <br>
            <input type="text" id="phNum" name="phNum" required>
            <br><br><br>
            <label for="password"><b>Password</b></label> <br>
            <input type="text" id="password" name="password" required>

        </form>
        <p>Have an account? <a href="login.php"><i>Login Here</i></a></p>
      </div>
    </div>
  </main>

</body>
</html>