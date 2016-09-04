<!DOCTYPE html>
<html>
<body>

<?php
$nightStart = strtotime("now") + 900;  //900 = 15 min X 60 sec
$nightEnd = strtotime();
$currentTime = date('H:i:s', strtotime("now"));

if((strtotime($currentTime)<strtotime($nightStart) && strtotime($currentTime)>strtotime($nightEnd))
{
  echo "";
}

echo (strtotime($selectedTime))>strtotime($str) ;
?>

</body>
</html>
