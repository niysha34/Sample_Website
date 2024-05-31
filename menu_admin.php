<?php
session_start();

  include("connection.php");
  include("functions.php");

  //REDIRECT USER TO LOGIN IF NOT LOGGED IN//
  $user_data = check_login($con);

  //SUBMIT MENU ITEMS//
  $today_date= date("Y-m-d"); //setting today's date for the html input field limit

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date_specific= $_POST['date_offered'];
    $price= $_POST['price'];
    $food1= $_POST['food1'];
    $food2= $_POST['food2'];
    $food3= $_POST['food3'];

    $duplicates_query= "SELECT * FROM menu_info WHERE date_specific = '$date_specific'";
    $duplicates= mysqli_query($con, $duplicates_query);
    if(mysqli_num_rows($duplicates) > 0) {		//Check for duplicate entry in menu table
      echo '<script> alert("Menu already exists for this date."); </script>';
      //echo "Menu already exists for this date.";
    } else {						//Add menu thing to table if no duplicates exist
        $query = "INSERT INTO menu_info (date_specific,food1,food2,food3,price) VALUES ('$date_specific','$food1','$food2','$food3','$price')";
        mysqli_query($con, $query);
    }
  }

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catering Website</title>
  <link rel="stylesheet" href="style.css">
</head>


<body>
  <header>
    <img class= "logo" src="logo.JPG" align="left">
    <nav>
      <ul>
        <li><a href="index_admin.php">HOME&emsp;|</a></li>
        <li><a href="menu_admin.php">&emsp;MENU&emsp;|</a></li>
        <li><a href="order_admin.php">&emsp;ORDER&emsp;|</a></li>
        <li><a href="logout.php">&emsp;LOGOUT&emsp;|</a></li>
      </ul>
    </nav>
    <br>
    <h1>Snila's Vyanjan</h1>
  </header>

  <main>
    <div class="col1ADMIN" align="center">
      <form method="post" ><FONT COLOR="white" align="right"><b>
	<label for="date_offered">OFFER DATE</label>
	<input type="date" id="date_offered" name="date_offered" min="<?php echo $today_date; ?>" required>
	<br /><br>
	<label for="price">PRICE</label>
	<input type="number" id="price" name="price" required>
	<br /><br>
	<label for="food1">1ST FOOD ITEM</label>
	<input type="text" id="food1" name="food1" required>
	<br /><br>
	<label for="food2">2ND FOOD ITEM</label>
	<input type="text" id="food2" name="food2" required>
	<br /><br>
	<label for="food3">3RD FOOD ITEM</label>
	<input type="text" id="food3" name="food3" required>
	<br /><br><br>
	<input type="submit" class="submitMenuButton" value="SUBMIT">
      </b></FONT></form>
    </div>
  </main>

</body>
</html>