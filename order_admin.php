<?php
session_start();

  include("connection.php");
  include("functions.php");

  $user_data = check_login($con);

  //FETCHING AND DISPLAYING ORDER_INFO DATA TO TABLE
/*  $query= "SELECT date_specific, date_ordered, amount, email FROM order_info";
  $result = $conn-> query($query);

  if($result-> num_rows > 0) {
    while($row = $result-> fetch_assoc()) {
      echo "<tr><td>" . $row["date_specific"] . "</td></tr>" . $row["date_ordered"] . "</td></tr>" . $row["amount"] . "</td></tr>" . $row["email"] . "</td></tr>";
    }
    echo "</table>";
  } else {
      echo "<tr><td>" . "no orders" . "</td></tr>";
    }*/
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catering Website</title>
  <link rel="stylesheet" href="style_OrderAdmin.css">
  <script type="text/javascript" src="C:\Users\anils\OneDrive\Documents\CompSci IA\calcAmtTotal.js"></script>
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
    <div class="container">
      <table align="center">
	<tr>
	  <td> Lunchbox Date </td>
	  <td> Date Ordered </td>
	  <td> # Lunchboxes </td>
	  <td> Email </td>
	</tr>

	<?php
	  include("connection.php");

	  $query= "SELECT date_specific, date_ordered, amount, email FROM order_info ORDER BY date_specific ASC";
  	  $results = mysqli_query($con, $query);

  	  if($results-> num_rows > 0) {
    	    while($row = $results-> fetch_assoc()) {
      	      echo "<tr>
		      <td>" . $row["date_specific"] . "</td>" .
		     "<td>" . $row["date_ordered"] . "</td>" .
		     "<td>" . $row["amount"] . "</td>" .
		     "<td>" . $row["email"] . "</td>
		   </tr>";
    	    }
    	    echo "</table>";
  	  } else {
      	      echo "<tr><td>" . "no orders" . "</td></tr>";
    	  }
        ?>

      </table>
    </div>
  </main>

</body>
</html>