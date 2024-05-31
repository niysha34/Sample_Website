<?php
	//TO-DO --> WRONG PWORD ALERT MESSES UP FORMATTING
        //FOR SOME REASON. FIX THAT!!

session_start();

  include("connection.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)) {
      //save from database
      $query = "SELECT * FROM user_info WHERE email = '$email' LIMIT 1";
      $result = mysqli_query($con, $query);
      
      if($result) { 				       //check if there is a result
        if($result && mysqli_num_rows($result) > 0) {  //check that there is a row returned
          $user_data = mysqli_fetch_assoc($result);    //assign that row data to a variable
          //echo "Email: " . $user_data['email'] . "  PWord: " . $user_data['password'];

          if($user_data['password'] === $password) {   //check whether the password for that matched account matches what the user entered
            $_SESSION['email'] = $user_data['email'];  //assign a session thing

              if($user_data['email'] == 'admin@hotmail.com') {     //check whether user is an admin --> redirect to admin pages
		header("Location: index_admin.php");
		die;
	      } else{
                  header("Location: index.php");
		  die;
                }
            
          } else{
            echo '<script type="text/javascript">';
            echo 'alert("Wrong email or password!")';
            echo '</script>';
          }

        } else{
          echo '<script type="text/javascript">';
          echo 'alert("Wrong email or password!")';
          echo '</script>';
        }
      } else{
              echo '<script type="text/javascript">';
              echo 'alert("Wrong email or password!")';
              echo '</script>';
      }

    } else{
      echo '<script type="text/javascript">';
      echo 'alert("Wrong email or password!")';
      echo '</script>';
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
      <div class="bgRect" align="center">
        <h2><b>LOGIN</b></h2>
        <br><br><br>
        <form method="post">
          <label for="email"><b>Email</b></label> <br>
          <input type="text" id="email" name="email" required>
          <br><br><br>
          <label for="password"><b>Password</b></label> <br>
          <input type="text" id="password" name="password" required>
          <br><br><br><br>
          <input type="submit" value="LOGIN" class="loginButton">
          <!--<button class="loginButton"><b>LOGIN</b></button>-->
        </form>
        <p>Don't have an account? <a href="register-copy.php"><i>Register Here</i></a></p>
      </div>
    </div>
  </main>

</body>
</html>