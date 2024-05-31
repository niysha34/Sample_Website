<?php
  $dbhost= "localhost";
  $dbuser= "root";
  $dbpass= "";
  $dbname= "compsci_ia";

  if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)) {
    die("couldn't connect!");
  }
?>