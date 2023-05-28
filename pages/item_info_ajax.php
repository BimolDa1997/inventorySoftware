<?php 
session_start();
include ('../common/library.php'); 
include ('../common/helper.php');  

   $item = $_POST['item_id'];
   $item_info = explode("#",$item);
   $item_in = $conn->query('select sum(item_in-item_ex) as stock from journal_item where item_id="'.$item_info[1].'"');
   $data['item_info'] = $item_in->fetch_assoc();
   echo json_encode($data);
   
	

 
?>

		
		