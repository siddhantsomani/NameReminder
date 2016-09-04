<?php
  require 'connect.php';
  function checkTime($countrycode){
    $q1 = "Select * from zone where country_code='$countrycode'";
    $result = mysqli_query($conn,$q1);
    print_r($result);
    $arr = mysqli_fetch_assoc($result);
    $zoneid = $arr['zone_id'];
    $q1 = "Select * from timezone where zone_id='$zoneid'";
    $result = mysqli_query($conn,$q1);
    print_r($result);
    $arr = mysqli_fetch_assoc($result);
    $ans = $arr['gmt_offset'];

  }
 ?>
