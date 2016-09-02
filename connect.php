<?php
  $host = "localhost";
  $user = "root";
  $pass = "root";
  $db = "NameReminder";
  $conn = mysqli_connect("localhost","root","root","NameReminder");
  if (mysqli_connect_errno())
  {
    die("Failed to connect to Database: " . mysqli_connect_error());
  }
  
?>
