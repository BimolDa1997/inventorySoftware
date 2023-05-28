<?php
session_start();
 include ('../common/library.php');  
 //include '../db/db.php';

 

	//include 'database.php';
	$sql = $conn->query("SELECT * FROM sales_order where s_no=".$_SESSION['sale_no']."");
	//$result = $conn->query($sql);
	
		while($dt = $sql->fetch_assoc()) {
?>	
		<tr>
			
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			
		</tr>
<?php	
	}
	
	
	//mysqli_close($conn);
?>
 
