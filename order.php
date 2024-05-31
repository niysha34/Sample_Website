<?php
session_start();

  include("connection.php");
  include("functions.php");

  $user_data = check_login($con);

  //DISPLAYING THE MENU FROM DATABASE              //ADD TRY CATCH TYPE THING SO THAT IF NO ENTRY TO DB IT WILL DISPLAY N/A OR NONE OR SM
  $query= "SELECT * FROM menu_info ORDER BY date_specific DESC LIMIT 5";
  $week_menu= mysqli_query($con, $query);

  $counter= 0;
  while($day_menu = mysqli_fetch_assoc($week_menu)) {
    switch($counter) {
      case 4:
	$priceM= $day_menu['price'];
	$dateM= $day_menu['date_specific'];
	break;
      case 3:
	$priceT= $day_menu['price'];
	$dateT= $day_menu['date_specific'];
	break;
      case 2:
	$priceW= $day_menu['price'];
	$dateW= $day_menu['date_specific'];
	break;
      case 1:
	$priceTh= $day_menu['price'];
	$dateTh= $day_menu['date_specific'];
	break;
      case 0:
	$priceF= $day_menu['price'];
	$dateF= $day_menu['date_specific'];
	break;
    }
    $counter= ($counter) + 1;
  }

  //SEND ORDERS TO DATABASE
  /*if($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "monday amt is: " . $_POST['monNum'];
  }*/


  include("functionTEST.php");
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    orderSubmit($con, 'monNum', $dateM);
    orderSubmit($con, 'tuesNum', $dateT);
    orderSubmit($con, 'wedNum', $dateW);
    orderSubmit($con, 'thursNum', $dateTh);
    orderSubmit($con, 'friNum', $dateF);
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
        <li><a href="index.php">HOME&emsp;|</a></li>
        <li><a href="menu.php">&emsp;MENU&emsp;|</a></li>
        <li><a href="order.php">&emsp;ORDER&emsp;|</a></li>
        <li><a href="logout.php">&emsp;LOGOUT&emsp;|</a></li>
        <li><a href="about.php">&emsp;ABOUT</a></li>
      </ul>
    </nav>
    <br>
    <h1>Snila's Vyanjan</h1>
  </header>

  <main>
    <div class="split1 left1"><form method="post">
      <p><b>Please enter how many lunchboxes you want for the days you would like to receive a lunchbox (limit of 250; for anymore lunchboxes on a given day, please phone Snila for a bulk order discount).</b></p>
      <div class="orderForm"><FONT COLOR="white">
	<br><br><br>
        <h2><font size="6px">Lunchbox Days</font></h2>
	<br>
        <label for="monOrder" id="monLabel">&emsp;Monday - <span class="price">$<?php echo $priceM ?></span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
        <input type="number" id="monNum" name="monNum" max="250" min="0" placeholder="0">
        <br><br>
        <label for="tuesOrder" id="tuesLabel">&emsp;Tuesday - <span class="price">$<?php echo $priceT ?></span></label>&emsp;&emsp;&emsp;&emsp;&emsp;
        <input type="number" id="tuesNum" name="tuesNum" max="250" min="0" placeholder="0">
        <br><br>
        <label for="wedOrder" id="wedLabel">&emsp;Wednesday - <span class="price">$<?php echo $priceW ?></span></label>&emsp;&emsp;&emsp;&ensp;
        <input type="number" id="wedNum" name="wedNum" max="250" min="0" placeholder="0">
        <br><br>
        <label for="thursOrder" id="thursLabel">&emsp;Thursday - <span class="price">$<?php echo $priceTh ?></span></label>&emsp;&emsp;&emsp;&emsp;&ensp;
        <input type="number" id="thursNum" name="thursNum" max="250" min="0" placeholder="0">
        <br><br>
        <label for="friOrder" id="friLabel">&emsp;Friday - <span class="price">$<?php echo $priceF ?></span></label>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;
        <input type="number" id="friNum" name="friNum" max="250" min="0" placeholder="0">
        <br><br>
      </div>
    </FONT></div>
    <div class="split1 right1">
      <section>
	<b><p class="amtTotal" id="amtTotal">Order Total: $0.00</FONT></p></b>
        <br><br>
        <button class="orderButton">ORDER</button>
      </section>
    </form></div>
  </main>

  <script type="text/javascript" src="calcTotal.js"></script>

</body>
</html>