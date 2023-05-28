<?php
 include "../lib/db/connection.php";
 
 
 function find_a_field($table_name,$field,$unique_id){
global $conn;
 $sql = "select ".$field." from ".$table_name." where ".$unique_id."";

$select = $conn->query($sql);
if ($select->num_rows>0){
$data = $select->fetch_assoc();
return $data[$field];

}
 }

 function find_a_field2($table_name,$field,$unique_id){
  global $conn;
  $sql = "select ".$field." from ".$table_name." where ".$unique_id."";
  
  $select = $conn->query($sql);
  if ($select->num_rows>0){
  $data = $select->fetch_row();
  return $data[0];
  
  }
   }
 
 function find_all($table_name,$unique_id){
  global $conn;
$sql = "select * from ".$table_name." where ".$unique_id."";

$select = $conn->query($sql);
if ($select->num_rows>0){
$data = $select->fetch_assoc();
return $data;

}
 }
 
 
 
 
 // foreign relation

function foreign_relation($table,$field1,$field2,$value,$condition){
    //return date('Y-m-d');
global $conn;
if($condition !=""){
	$con=" WHERE $condition";
}

  $sql = "SELECT $field1,$field2 FROM $table $con ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
   // echo '<option></option>';
  while($row = $result->fetch_assoc()) {
	  if($value==$row[$field1]){
	echo '<option value="'.$row[$field1].'" selected >'.$row[$field2].'</option>';
	  }else{
		echo '<option value="'.$row[$field1].'">'.$row[$field2].'</option>';
	  }
  }
} 

 
 }




 function foreign_relation2($table,$field1,$field2,$value,$condition){
  //return date('Y-m-d');
global $conn;
if($condition !=""){
$con=" WHERE $condition";
}

 $sql = "SELECT $field1,$field2 FROM $table $con ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
 // echo '<option></option>';
while($row = $result->fetch_row()) {
  if($value==$row[0]){
    echo '<option value="'.$row[0].'" selected >'.$row[1].'</option>';
  }else{
    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
  }
}
} 


}
 
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function mailer($to,$toName,$subject,$msg,$cc){
	require '../pages/vendor/autoload.php';
$mail = new PHPMailer(true);
try {
     $mail->SMTPDebug = 1;                                       // Enable verbose debug output

    $mail->isSMTP();                                            // Set mailer to use SMTP

    $mail->Host       = 'premium273.web-hosting.com';  // Specify main and backup SMTP servers

    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

    $mail->Username   = 'info@rbdreliance.com';                     // SMTP username

    $mail->Password   = 'JWPXoEAUavUt';                               // SMTP password

    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted

    $mail->Port       = 465;  

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );
    
	$from_email= "info@rbdreliance.com";
	$from_name = "RBDreliance";
	//$to_email = "kamrulerp@gmail.com";
	$to_email = $to;
	//$to_email= "bimol@erp.com.bd";
	$to_name = $toName;
	$subject = $subject;
	$body = $msg;
    //Recipients
    $mail->setFrom($from_email,$from_name);
    $mail->addAddress($to_email,$to_name);     // Add a recipient


    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;

    $mail->Body    = $msg;

    $mail->AltBody = '';

    $mail->send();



    echo 'Message has been sent';


} 

catch (Exception $e) {

    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}

}

 
?>