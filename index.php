<?php
session_start();

  include("connection.php");
  include("functions.php");

  $user_data = check_login($con);
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
    <br>
    <div class="split left">
      <br><br><br><br>
      <section>
	<h2>&emsp; Quality Food at a Minimum &emsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price!</h2>
        <p>&emsp;&emsp;&emsp; Lunchboxes, Catering, & Specialty Sweets</p>
        <p>&emsp;&emsp;&emsp; Home-made with the freshest ingredients</p>
        <br>
        <br>
      </section>
      <!--<section>
        <h2>&emsp;&emsp;&emsp;&emsp;TODAY'S MENU</h2>
        <ul>
          <li class="space">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Paav Bhaji</li>
          <li class="space">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Mixture</li>
          <li class="space">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Pickled Onions</li>
        </ul>
        <!--<br>-->
        <button type="button" class="orderButtonHome" onclick="window.location.href='order.php'">ORDER</button>
      </section>
    </div>
    <div class="split right">
      <img id="scrollImage" class="scrollImage" src="cutlet2Image.jpg">
      <!--<script type="text/javascript" src="C:\Users\anils\OneDrive\Documents\XAMPP\XAMPP_Download\htdocs\login_CompSci_IA\changeImage.js"></script>-->

      <script>
        var currImage = document.getElementById("scrollImage");
	var images= ["kebabImage.jpg","lunchBox6.jpg","lunchBox5.jpg","burgerImage.jpg","cutlet2Image.jpg","lassiImage.jpg","noodleImage.jpg","wadapavImage.jpg","onionRingImage.jpg", "rasmalai2Image.jpg","dhoklaImage.jpg"];

	var i= 0;
	function scrollImage() {
  	  //alert("Image set to " + images[i]);
  	  if(i >= images.length) {i= 0;}
  	  currImage.setAttribute("src",images[i]);
  	  i++;
	}

	setInterval(scrollImage, 3000);
      </script>

    </div>
  </main>

</body>
</html>
