<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$token = hash('sha256', uniqid(mt_rand(), true));
$date= date('m/d/Y');
//echo $date; exit;
$sql = "SELECT next_reference FROM 0_sys_types WHERE type_id = 12";

  $command = Yii::app()->db->createCommand($sql);
     $lid= $command->queryRow();
     $lid=$lid['next_reference'];
                        
?>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>





<script>
    $('document').ready( function () {
        
        
     var car = { trans_no: '', old_ref: '0', bank_account: '1', customer_id: '<?php echo $data['customer'] ?>' , BranchID: '<?php echo $data['branch'] ?>',DateBanked: '<?php echo $date ?>', ref: '<?php echo $lid ?>' , bank_amount: '<?php echo $data['amount'] ?>' , charge: '0', TotalNumberOfAllocs:'0', discount:'0',amount:'<?php echo $data['amount'] ?>',memo_:'Customer payment against order no <?php echo  $data["id"] ?> ',AddPaymentItem:'Add Payment',_focus:'bank_account',_modified:'0',_token:'<?php echo $token ?>'   };
    
var data1 ={ui_mode:'1',user_name_entry_field:'admin',password:'admin',company_login_name:0,SubmitUser:'Login -->',_focus:'user_name_entry_field',_modified:0,_token:'<?php echo $token ?>'};
    $.ajax({
    
    type: "POST",
    url: "../mateenfoods/index.php",

     data: data1,

    success: function (data) {

       
       $.ajax({
    
    type: "POST",
    url: "../mateenfoods/sales/customer_payments.php",
   
     data: car,
   
    success: function (data) {
   
    }
});




       //  alert(data);
    }
});


   
  


});
</script>

<div id="res"></div>