<?php
  include("connection.php");

  function orderSubmit($conn, $inputBox, $dateSpec) {
    $disp= (empty($_POST[$inputBox]));
    //echo 'is it empty: ' . $disp . '<br>';
    if(!(empty($_POST[$inputBox]))) {
      $amount = $_POST[$inputBox];
      $dateSpecific = $dateSpec;
      //echo strtotime($dateSpecific);
      $dateOrdered = date('Y-m-d');
      $email = $_SESSION['email'];

      //echo ' || For ' . $inputBox . ' the amount is ' . $amount . ' the date spec is ' . $dateSpecific . ' the date ordered is ' . $dateOrdered . ' the email is ' . $email . '<br>';

      if($dateSpecific > $dateOrdered) {
        $query = "INSERT INTO order_info (date_ordered, date_specific, amount, email) VALUES ('$dateOrdered', '$dateSpecific', '$amount', '$email')";
        mysqli_query($conn, $query);

	/*switch($inputBox) {
	  case "monNum":
	    $day_of_week = "Monday";
	    break;
	  case "tuesNum":
	    $day_of_week = "Tuesday";
	    break;
	  case "wedNum":
	    $day_of_week = "Wednesday";
	    break;
	  case "thursNum":
	    $day_of_week = "Thursday";
	    break;
	  case "friNum":
	    $day_of_week = "Friday";
	    break;
	}*/
	echo '<script>
		alert("Thank you for your order!");
	      </script>';
      } else {
        echo '<script> alert("Your order for DAY was not submitted Orders for a date that is today or prior to today will not be submitted. However, the portions of your order that are for a date after today have been submitted. Thank you!"); </script>';
        }
    }
  }
?>