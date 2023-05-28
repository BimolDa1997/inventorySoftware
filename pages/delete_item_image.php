<?php 
date_default_timezone_set("Asia/Dhaka");
include ('../common/library.php');
include ('../common/helper.php');

if($_GET['image_id']>0 &&  $_GET['item_id']>0)
{
	$image_id=$_GET['image_id'];
	$item_id=$_GET['item_id'];

	// delete image from folder and database
	 $sql = "SELECT * FROM item_photo WHERE id='$image_id'";
	 $result = mysqli_query($conn,$sql);
	 $item_row = mysqli_fetch_object($result);
	 $item_row->item_photo;
	if($item_row->item_photo !=''){
		
		$photo_path = "../files/item/".$item_row->item_photo;
		unlink($photo_path);

		 $delete_sql = "DELETE FROM item_photo WHERE id='$image_id'";
															
		if(mysqli_query($conn,$delete_sql))
		{
			// change location
			header("Location:item_info_create.php?id=$item_id");
		}
		else
		{
			echo "Error: " . $delete_sql . "<br>" . mysqli_error($con);
		}
	}

	header("location: item_info_create.php?id=$item_id");

}

// suggested item delete
if($_GET['item_id']>0 && $_GET['suggested_item_id']>0){
	$item_id=$_GET['item_id'];
	$suggested_item_id=$_GET['suggested_item_id'];

	// delete image from folder and database
		 $delete_sql = "DELETE FROM suggested_item WHERE suggested_item_id='$suggested_item_id' AND item_id='$item_id'";
															
		if(mysqli_query($conn,$delete_sql))
		{
			// change location
			header("Location:item_info_create.php?id=$item_id");
		}
		else
		{
			echo "Error: " . $delete_sql . "<br>" . mysqli_error($con);
		}
	

	header("location: item_info_create.php?id=$item_id");
}


?>
