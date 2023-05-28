<?php
  
  //Connection
  global $conn;
  $host = 'localhost';
  $user = 'rbdrvzbx_ecom';
  $pass = 'ecom@224424';
  $db   = 'rbdrvzbx_ecom';
  
  $conn = new mysqli($host,$user,$pass,$db);
  if($conn->connect_errno){
   die('Connection Problem '.$conn -> connect_error);
  }else{
   //echo 'Yes';
  }
 

date_default_timezone_set("Asia/Dhaka");
/*$link=mysql_connect ($host,$user,$pass);
if(!$link){die("Could not connect to MySQL");}
mysql_select_db("$db",$link) or die ("could not open db".mysql_error());*/


?>