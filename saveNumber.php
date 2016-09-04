<?php
  extract($_POST);
  if(!isset($submit))
  header("Location:index.php");

//check validity using NumVERIFY API
  require 'verifyNumber.php';
  $validationResult = verifyNumber($PhoneNo);
  print_r($validationResult);
  if($validationResult['valid']==true){
  require("connect.php");
  $PhoneNo = mysqli_real_escape_string($conn,$PhoneNo);
  $Name = mysqli_real_escape_string($conn,$Name);
  $query = "Select * From users where `mobilenumber`=".$PhoneNo;
  $c = mysqli_query($conn,$query);
  $countrycode = $validationResult['country_code'];
  if(!mysqli_num_rows($c)){
    $query = "Insert into users (username,mobilenumber,countrycode) values('$Name','$PhoneNo','$countrycode')";
    $c = mysqli_query($conn,$query);
    echo "Details saved successfully.<br><a href='index.php'>Click Here To Save Another</a>";
  }
  else {
    echo "Mobile number already exists.<br><a href='index.php'>Click Here To Try Again</a>";
  }
  mysqli_close();
}
?>
