<?php
  extract($_POST);
  if(!isset($submit))
  header("Location:index.php");
  require("connect.php");
  
 ?>
