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
    <section class="about">
          <h2>ABOUT US</h2>
          <p>We are a catering company that specializes in providing delicious food for events and parties. Our team of experienced chefs use only the freshest ingredients to create a menu that is sure to impress your guests.</p>
        </section>
        <br>
        <section class="contact">
          <h2>CONTACT US</h2>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="message">&emsp;&emsp;Message:</label>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <textarea id="message" class="messageBox" name="message" required></textarea>
            <br> <br>
            <input type="submit" value="Submit">
          </form>
        </section>
  <!--COMMENTED OUT STUFF-->
    <!--<div class="row">
      <div class="colL">
        <img src="kachoriImage.jpg" width="30%" height="70%">
      </div>
      <div class="colM">
        <section class="about">
          <h2>ABOUT US</h2>
          <p>We are a catering company that specializes in providing delicious food for events and parties. Our team of experienced chefs use only the freshest ingredients to create a menu that is sure to impress your guests.</p>
        </section>
        <br>
        <section class="contact">
          <h2>CONTACT US</h2>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="message">&emsp;&emsp;Message:</label>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <textarea id="message" class="messageBox" name="message" required></textarea>
            <br> <br>
            <input type="submit" value="Submit">
          </form>
        </section>
      </div>
      <div class="colR">
        <img src="ladooImage.jpg" width="30%" height="70%">
      </div>
    </div>-->
  </main>

</body>
</html>