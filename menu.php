<?php
  session_start();

  include("connection.php");
  include("functions.php");

  $user_data = check_login($con);
  
  //DISPLAYING THE MENU FROM DATABASE              //ADD TRY CATCH TYPE THING SO THAT IF NO ENTRY TO DB IT WILL DISPLAY N/A OR NONE OR SM
  $query= "SELECT * FROM menu_info ORDER BY date_specific DESC LIMIT 5";
  $week_menu= mysqli_query($con, $query);

  $counter= 0; $week_start = new DateTime('2016/01/01'); $week_end = new DateTime('2016/01/01');
  while($day_menu = mysqli_fetch_assoc($week_menu)) {
    //echo $day_menu['date_specific'] . ' $' . $day_menu['price'] . $day_menu['food1'] . $day_menu['food2'] . $day_menu['food3'];
    switch($counter) {
      case 4:
	 $week_start= $day_menu['date_specific'];
	 $priceM= $day_menu['price'];
	 $food1M= $day_menu['food1'];
	 $food2M= $day_menu['food2'];
	 $food3M= $day_menu['food3'];
	 break;
       case 3:
         $priceT= $day_menu['price'];
	 $food1T= $day_menu['food1'];
	 $food2T= $day_menu['food2'];
	 $food3T= $day_menu['food3'];
	 break;
       case 2:
	 $priceW= $day_menu['price'];
	 $food1W= $day_menu['food1'];
	 $food2W= $day_menu['food2'];
	 $food3W= $day_menu['food3'];
	 break;
       case 1:
	 $priceTh= $day_menu['price'];
	 $food1Th= $day_menu['food1'];
	 $food2Th= $day_menu['food2'];
	 $food3Th= $day_menu['food3'];
	 break;
       case 0:
	 $week_end= $day_menu['date_specific'];
	 $priceF= $day_menu['price'];
	 $food1F= $day_menu['food1'];
	 $food2F= $day_menu['food2'];
	 $food3F= $day_menu['food3'];
	 break;
      }
    $counter= ($counter) + 1;
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

  <main align="center">
    <div class="container" align="center">
      <h2 class="weekOfLabel" style="color: #eb4034;"><b>WEEK OF: <?php echo substr($week_start,5,9) . ' to ' . substr($week_end,5,9); ?></b></h2>
      <div class="row">
        <div class="col1">
          <b><FONT COLOR="white">MONDAY</FONT></b>
          <p><i><FONT COLOR="white">$<?php echo $priceM ?></FONT></i></p>
          <p><FONT COLOR="white"><?php echo $food1M ?></FONT></p>
          <p><FONT COLOR="white"><?php echo $food2M ?></FONT></p>
          <p><FONT COLOR="white"><?php echo $food3M ?></FONT></p>
        </div>
        <div class="col1">
          <b><FONT COLOR="white">TUESDAY</FONT></b>
          <p><i><FONT COLOR="white">$<?php echo $priceT ?></FONT></i></p>
          <p><FONT COLOR="white"><?php echo $food1T ?></FONT></p>
          <p><FONT COLOR="white"><?php echo $food2T ?></FONT></p>
          <p><FONT COLOR="white"><?php echo $food3T ?></FONT></p>
        </div>
        <div class="col1">
          <b><FONT COLOR="white">WEDNESDAY</FONT></b>
          <p><i><FONT COLOR="white">$<?php echo $priceW ?></FONT></i></p>
          <p><FONT COLOR="white"><?php echo $food1W ?></FONT></p>
          <p><FONT COLOR="white"><?php echo $food2W ?></FONT></p>
          <p><FONT COLOR="white"><?php echo $food3W ?></FONT></p>
        </div>
      </div>
      <div class="row">
        <div class="col2">
          <b><FONT COLOR="white">THURSDAY</FONT></b>
          <p><i><FONT COLOR="white">$<?php echo $priceTh ?></FONT></i></p>
          <p><FONT COLOR="white"><?php echo $food1Th ?></FONT></p>
          <p><FONT COLOR="white"><?php echo $food2Th ?></FONT></p>
          <p><FONT COLOR="white"><?php echo $food3Th ?></FONT></p>
        </div>
        <div class="col1">
          <b><FONT COLOR="white">FRIDAY</b>
          <p><i><FONT COLOR="white">$<?php echo $priceF ?></FONT></i></p>
          <p><FONT COLOR="white"><?php echo $food1F ?></FONT></p>
          <p><FONT COLOR="white"><?php echo $food2F ?></FONT></p>
          <p><FONT COLOR="white"><?php echo $food3F ?></FONT></p>
        </div>
      </div>
    </div>
  </main>

</body>
</html>