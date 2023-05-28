<?php 
session_start();  
include ('../common/library.php');  

     
  if($_POST['c_no'] !=''){
  
  		if($_POST['tr_from']=="Give Loan"){
		$s = $conn->query("select sum(l.dr_amt-l.cr_amt) as due from ledger d, journal l where l.group_for = '".$_SESSION['group_for']."' and d.ledger_id = l.ledger_id and d.ledger_name like '".$_POST['c_no']."' and tr_from like 'Give loan' ");
		}else{
  
       		$s = $conn->query("select sum(l.cr_amt-l.dr_amt) as due from ledger d, journal l where l.group_for = '".$_SESSION['group_for']."' and d.ledger_id = l.ledger_id and d.ledger_name like '".$_POST['c_no']."' and tr_from like 'loan' ");
		
		}
				while($dealer = $s->fetch_assoc()){
               $data['due'] = $dealer['due'];
         }
  }
  
   echo json_encode($data);
   
?>

		
		