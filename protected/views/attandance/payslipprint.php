    
<?php 


$sql_emp="SELECT * FROM employees a where id = '".$_GET['id']."'  ";
//echo $sql;exit; 
$sql_emp= Yii::app()->db->createCommand($sql_emp);
$sql_emp= $sql_emp->queryRow();


$totaldays = $absent['count(*)']+$work['count(*)'];

if($totaldays!=0)
$perdaypay = round($sql_emp['salary']/$totaldays);
else
$perdaypay=0;

?>

<script>
    function pirntpay(divID) {
            
            var divElements = document.getElementById(divID).innerHTML;
            
            
     myWindow=window.open();
     myWindow.innerWidth='500px';
    myWindow.document.body.innerHTML = "<html><body><div style='width:500px'>"+divElements+"</div></body></html>";
  
    myWindow.print(); 
    return;
          
        }
        
    


</script>


    <h3 class="header smaller lighter blue">PAY SHEET OF <?php echo $sql_emp['name']; ?> FOR THE MONTH OF <?php echo  date("F", mktime(null, null, null, $_GET['month']));; ?></h3>
 
    
    
<div class="row-fluid" id="payslip"> 
   <table width="50%" cellspacing="2" cellpadding="2" style="border : 1px solid;"> 

       <tr  style="border : 1px solid;">
           <th colspan="2">PAY SLIP </th>
       </tr>
       
        <tr  style="border : 1px solid;">
            <td  style="border : 1px solid;font-weight: bold" >Employee Name</td>
           <td style="border : 1px solid;"><?php echo $sql_emp['name']?></td>
       </tr>
      
       <tr  style="border : 1px solid;">
           <td style="border : 1px solid;">Employee Category</td>
           <td  style="border : 1px solid;"><?php echo EmpCat::model()->findByPk($sql_emp['cat_id'])->name ?></td>
       </tr>
              
       <tr  style="border : 1px solid;">
           <td style="border : 1px solid;">Presents</td>
           <td  style="border : 1px solid;"><?php echo $work['count(*)'] ?></td>
       </tr>
       
        <tr  style="border : 1px solid;">
          <td style="border : 1px solid;">Absent</td>
           <td  style="border : 1px solid;"><?php echo $absent['count(*)'] ?></td>
        </tr>

       <tr  style="border : 1px solid;">
          <td  style="border : 1px solid;">Gross Salary</td>
          <td  style="border : 1px solid;"><?php  echo $sql_emp['salary']?></td>
       </tr>
       
       <tr  style="border : 1px solid;">
          <td  style="border : 1px solid;">Salary Deduction</td>
          <td  style="border : 1px solid;"><?php  $absent_decut= $perdaypay*$absent['count(*)'];
          echo  $absent_decut; ?></td>
       </tr>
       
       
       <tr  style="border : 1px solid;">
          <td  style="border : 1px solid;">Total Over Time Amount</td>
          <td  style="border : 1px solid;"><?php  echo $sum['sum(overtime_amount)']?></td>
      </tr>
       
       <tr  style="border : 1px solid;">
            <td  style="border : 1px solid;">Total Fine Amount</td>
            <td  style="border : 1px solid;"><?php  echo $sum['sum(fine_amount)']?></td>
           
       </tr>
       
       <tr  style="border : 1px solid;">
            <td  style="border : 1px solid;">Total Deduction</td>
            <td  style="border : 1px solid;"><?php  
            $toatl_dedcut = $sum['sum(fine_amount)'] + $absent_decut;
            echo $toatl_dedcut; ?></td>
           
       </tr>
      
        
<tr  style="border : 1px solid;background-color: #C2DAEE;">
           
<td  style="border : 1px solid;font-weight: bold">Total Amount for the month</td>
<td  style="border : 1px solid;font-weight: bold"><?php  $tol_sal=$sql_emp['salary']+$sum['sum(overtime_amount)'] - $toatl_dedcut ; echo $tol_sal  ?></td>
           
</tr>
     <tr  style="border : 1px solid;">
            <td  style="border : 1px solid;">Paying Amount Now</td>
            <td  style="border : 1px solid;"><?php  
                        echo $paid[0] ?></td>
           
       </tr>
      <?php if(isset($paid[1])) { ?>
            <tr  style="border : 1px solid;">
            <td  style="border : 1px solid;">Loan Detection</td>
            <td  style="border : 1px solid;"><?php  
            
             echo $paid[1]; ?></td>
           
       </tr>
      
      <?php } ?>
<?php    
$balance = new EmpTrans;
$balance=EmpTrans::model()->findByAttributes(array('emap_id'=>$_GET['id']),array(
        'order' => 'id desc',
        'limit' => '1',
    )); 

$loan= Loan::model()->findByAttributes(array('emp_id'=>$_GET['id']));

if(!isset($balance->balance))
   $balc=0;
else {
   $balc=$balance->balance;
}
?>



 </table>
        
        
   
    </div>   <input type="button" value="print" onclick="pirntpay('payslip');"/>