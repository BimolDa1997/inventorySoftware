<?php 
include ('../common/library.php'); 
include ('../common/helper.php');  

$msg ='';
$data = '';
// get sub category info by category id
if(isset($_POST['category_id'])){
  $category_id = $_POST['category_id'];
  echo $sql = "select * from sub_category_info where category_id = '".$category_id."'";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
	$data .='<option value="'.$row['id'].'">'.$row['category'].'</option>';
  }

  echo $data;
  
}
