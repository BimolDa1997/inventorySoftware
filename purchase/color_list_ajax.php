<?php 
session_start();
//include ('../common/library.php');  
include "../lib/db/connection.php";
include ('../common/helper.php'); 

   $item_id       = $_POST['item_id'];
	
   $sql = "SELECT c.id, c.color FROM item_photo p, color_list c WHERE c.id=p.color and p.item_id = '$item_id' group by c.id order by c.color asc";
   $query = mysqli_query($conn, $sql);
   $option = "<option></option>";
   $count = mysqli_num_rows($query);
   while($row = mysqli_fetch_array($query)){
      
      $option .= "<option value='".$row['id']."'>".$row['color']."</option>";
   }
  

  
  if ($count==true) {
		echo json_encode(array("statusCode"=>200,"row"=>$option));
	}else{
		echo json_encode(array("statusCode"=>201,"row"=>$count));
	}
  

?>

		
		