<?php
  extract($_POST);
  if(!isset($submit))
  header("Location:index.php");
  require("connect.php");
  $PhoneNo = mysqli_real_escape_string($conn,$PhoneNo);
  $Name = mysqli_real_escape_string($conn,$Name);
  $query = "Select * From users where `mobilenumber`=".$PhoneNo;
  $c = mysqli_query($conn,$query);
  if(!mysqli_num_rows($c)){
    $query = "Insert into users (username,mobilenumber) values('$Name','$PhoneNo')";
    $c = mysqli_query($conn,$query);
    echo "Details saved successfully.<br><a href='index.php'>Click Here To Save Another</a>";
  }
  else {
    echo "Mobile number already exists.<br><a href='index.php'>Click Here To Try Again</a>";
  }

?>
