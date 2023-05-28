<?php
session_start();
 //include ('../common/library.php'); 
 include "../lib/db/connection.php";
 include ('../common/helper.php'); 
 $id = $_GET['id'];
 

	$del = $conn->query("delete from purchase_order where id=".$id."");
	
	$count = 1;
	if ($del==true) {
		echo json_encode(array("statusCode"=>200,"row"=>$count));
	} 
	else {
		echo json_encode(array("statusCode"=>201,"row"=>$count));
	}

?>
 
