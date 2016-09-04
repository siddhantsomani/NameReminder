<?php
  require 'connect.php';

  require 'helperFunctions.php';
  require 'twilioConnector.php';
  $query = "select * from users";
  $arr  = mysqli_query($conn,$query);
  if(mysqli_num_rows($arr))
  {
    while($row = mysqli_fetch_assoc($arr))
    {
      $number = $row['mobilenumber'];
      $name = $row['username'];
      $countrycode = $row['countrycode'];
      print_r($row);
      echo checkTime($countrycode);
      if(checkTime($countrycode)){
      sendMessage($number,$name);
    }
    }
  }
?>
