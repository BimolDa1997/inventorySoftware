<?php 

include ('../common/library.php');
include ('../common/helper.php');    


if(isset($_POST['co_party'])){
        
 $co_party = $_POST['co_party'];

}
?>

    <datalist  id="dealer_codes">

    <?php foreign_relation('customer_info','id','concat(business_name,"-",customer_address)','','status="Active" and customer_type="'.$co_party.'"');?>
									
</datalist>		
		

