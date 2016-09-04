
<?php
  require 'twilioConnector.php';
  require 'connect.php';
  $query = "select * from users";
  $arr  = mysqli_query($conn,$query);
  if(mysqli_num_rows($arr))
  {
    while($row = mysqli_fetch_assoc($arr))
    {//DB - username, mobilenumber
      $number = $row['mobilenumber'];
      $name = $row['username'];
      $countrycode = $row['countrycode'];
      print_r($row);
      if(checkTime($countrycode)){
      sendMessage($number,$name);
    }
    }
  }
?>
