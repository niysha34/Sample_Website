<?php
  function check_login($con){
    if(isset($_SESSION['email'])) {
      $id = $_SESSION['email'];
      $query = "SELECT * FROM user_info WHERE email = '$id' LIMIT 1";

      $result = mysqli_query($con,$query);
      if($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        return $user_data;
      }
    }

    //if don't have an account redirect to login page
    header("Location: login.php");
    die;
  }

/*  function orderSubmit($conn, $inputBox) {
    $disp= (isset($_POST[$inputBox]));
    echo 'is it empty: ' . $disp;
    if(!(isset($_POST[$inputBox]))) {
      $amount = $_POST[$inputBox];
      echo 'amount: ' . ($amount);

      $dateOrdered = date('Y-m-d');
      $email = $_SESSION['email'];

      getDateAndPrice($inputBox);
      switch($inputBox) {
        case "monOrder":
	  $dateSpecific = $dateMon;
	  break;
        case "tuesOrder":
	  $dateSpecific = $dateTues;
	  break;
        case "wedOrder":
	  $dateSpecific = $dateWed;
	  break;
        case "thursOrder":
	  $dateSpecific = $dateThurs;
	  break;
        case "friOrder":
	  $dateSpecific = $dateFri;
	  break;
      }

      
      if($dateOrdered < $dateSpecific) {
	$query = "INSERT INTO order_info (date_ordered, date_specific, amount, email) VALUES ('$dateOrdered', '$dateSpecific', '$amount', '$email')";
      }
    }
  }

  function getDateAndPrice($inputBox) {
    $con = include("connection.php");
    $query= "SELECT * FROM menu_info ORDER BY date_specific DESC LIMIT 5";
    $week_menu= mysqli_query($con, $query);

    global $dateMon; global $priceMon;
    global $dateTues; global $priceTues;
    global $dateWed; global $priceWed;
    global $dateThurs; global $priceThurs;
    global $dateFri; global $priceFri;

    $counter= 0;
    while($day_menu = mysqli_fetch_assoc($week_menu)) {
      switch($counter) {
        case 4:
	  $dateMon = $day_menu['date_specific'];
	  $priceMon = $day_menu['price'];
	  break;
        case 3:
	  $dateTues = $day_menu['date_specific'];
	  $priceTues = $day_menu['price'];
	  break;
        case 2:
	  $dateWed = $day_menu['date_specific'];
	  $priceWed = $day_menu['price'];
	  break;
        case 1:
 	  $dateThurs = $day_menu['date_specific'];
	  $priceThurs = $day_menu['price'];
	  break;
        case 0:
	  $dateFri = $day_menu['date_specific'];
	  $priceFri = $day_menu['price'];
	  break;
      }
      $counter= ($counter) + 1;
    }
  }*/
?>