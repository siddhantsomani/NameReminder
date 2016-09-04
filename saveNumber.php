<?php
  extract($_POST);
  if(!isset($submit))
  header("Location:index.php");

//check validity using NumVERIFY API
  require 'helperFunctions.php';
  $ccode = (string)$countrycode;
  $PhNo = (string)$PhoneNumber;
  $newPhoneNo = "$ccode"."$PhNo";
  $validationResult = verifyNumber($newPhoneNo);
  if($validationResult['valid']==true){
  require("connect.php");
  $newPhoneNo = mysqli_real_escape_string($conn,$newPhoneNo);
  $Name = mysqli_real_escape_string($conn,$Name);
  $query = "Select * From users where `mobilenumber`=".$newPhoneNo;
  $c = mysqli_query($conn,$query);
  $countrycode = $validationResult['country_code'];
  if(!mysqli_num_rows($c)){
    $query = "Insert into users (username,mobilenumber,countrycode) values('$Name','$newPhoneNo','$countrycode')";
    $c = mysqli_query($conn,$query);
    echo "Details saved successfully.<br><a href='index.php'>Click Here To Save Another</a>";
  }
  else {
    echo "Mobile number already exists.<br><a href='index.php'>Click Here To Try Again</a>";
  }
  mysqli_close($conn);
}
else {
  echo "Number not valid";
}
?>
