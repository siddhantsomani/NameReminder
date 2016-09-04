<?php
  require 'connect.php';

  require 'helperFunctions.php';
  $query = "select * from users";
  $arr  = mysqli_query($conn,$query);
  if(mysqli_num_rows($arr))
  {
    while($row = mysqli_fetch_assoc($arr))
    {
      $number = $row['mobilenumber'];
      $name = $row['username'];
      $countrycode = $row['countrycode'];
      if(checkTime($countrycode)){
      sendMessage($number,$name);
     }
    }
  }
?>
