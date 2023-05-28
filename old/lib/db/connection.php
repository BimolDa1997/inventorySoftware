<?php
  
  //Connection
  
  $host = 'localhost';
  $user = 'mollkgee_inventory_user';
  $pass = 'Mollik+plaza_inv';
  $db   = 'mollkgee_inventory';
  
  $conn = new mysqli($host,$user,$pass,$db);
  if($conn->connect_errno){
   die('Connection Problem '.$conn -> connect_error);
  }else{
   echo 'Yes';
  }
 


/*$link=mysql_connect ($host,$user,$pass);
if(!$link){die("Could not connect to MySQL");}
mysql_select_db("$db",$link) or die ("could not open db".mysql_error());*/


?>