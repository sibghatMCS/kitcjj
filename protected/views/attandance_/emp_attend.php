<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//print_r ($sum);




$sql_emp="SELECT * FROM employees a where id = '".$_GET['id']."'  ";
//echo $sql;exit; 
$sql_emp= Yii::app()->db->createCommand($sql_emp);
$sql_emp= $sql_emp->queryRow();


$totaldays = $absent['count(*)']+$work['count(*)'];
$perdaypay = round($sql_emp['salary']/$totaldays);



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

<div id="content">
   
    <div class="row-fluid">
        
        <?php 

//echo date('m', strtotime('-02 month')), '<br>',
//     date('m', strtotime('last month')), '<br>',
//     date('m');
//$month_name = date('F');


//echo $month_name.'<br/>';
$month = date('m');

for($i=1;$i<= $month; $i++){
    $mon=$month -$i;
   $month_name = date('F', strtotime("-$mon month"));
    
    //echo $month_name;
    echo'<a href="index.php?r=attandance/getattendance&month='.$i.'&id='.$_GET['id'].'">
<input class="btn btn-inverse btn-small" type="button" value="'.$month_name.'">
</a>';
    
    
}



?>
        

        
    </div>
    
    <br/>
    
     <h3 class="header smaller lighter blue">PAY SHEET OF <?php echo $sql_emp['name']; ?> FOR THE MONTH OF <?php echo date('F')?></h3>
    
   <table width="100%" cellspacing="2" cellpadding="2" style="border : 1px solid;"> 
       <tr  style="border : 1px solid;">
           <th  style="border : 1px solid;">Date</th>
           <th  style="border : 1px solid;">Overtime<br/> Amount</th>
           <th  style="border : 1px solid;">Fine <br/>Amount</th>
           <th  style="border : 1px solid;width: 100px;">Service</th>
           <th  style="border : 1px solid;">Remarks</th>
           <th  >Attendance</th>
       </tr>
       
       
       
       <?php
       
     
       foreach($data as $rec){ 
           
           if($rec['attd_status'] == 1){?>
           
       <tr  style="border : 1px solid;">
           <td  style=" text-align: center; border : 1px solid;" ><?php echo $rec['date']; ?></td>
           <td style="border : 1px solid;text-align: center;"><?php if($rec['overtime_amount'] == 0) echo '-'; else echo $rec['overtime_amount']; ?></td>
           <td  style="border : 1px solid;text-align: center;"><?php if($rec['fine_amount'] == 0) echo '-'; else echo $rec['fine_amount']; ?></td>
           <td  style="border : 1px solid;text-align: center;width: 100px;"><?php if($rec['service'] == 1) {
               echo 'On Service';
           }
           else
               echo 'No Service' ; ?></td>
           <td  style="border : 1px solid;text-align: center;"><?php if($rec['remarks'] == '') echo '-'; else echo $rec['remarks']; ?></td>
           <td  style="text-align: center;text-align: center;"><?php if($rec['attd_status'] == 1) {
               echo 'Present';
           }
           else
               echo 'Absent' ; ?></td>
       </tr>     
           <?php } else {?>
       
       
       <tr  style="border : 1px solid;background-color: gainsboro;">
          <td  style="border : 1px solid;text-align: center;" ><?php echo $rec['date']; ?></td>
           <td style="border : 1px solid;text-align: center;"><?php if($rec['overtime_amount'] == 0) echo '-'; else echo $rec['overtime_amount']; ?></td>
           <td  style="border : 1px solid;text-align: center;"><?php if($rec['fine_amount'] == 0) echo '-'; else echo $rec['fine_amount']; ?></td>
           <td  style="border : 1px solid;text-align: center;width: 100px;"><?php if($rec['service'] == 1) {
               echo 'On Service';
           }
           else
               echo 'No Service' ; ?></td>
           <td  style="border : 1px solid;text-align: center;"><?php if($rec['remarks'] == '') echo '-'; else echo $rec['remarks']; ?></td>
           <td colspan="5" style="text-align: center; font-weight: bold"><?php echo 'ABSENT'; ?></td>
       </tr>
           <?php     }   
           
           
           
           }?>
       
       

       
   </table>
    
    
     <br/> 
    
    
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
           
<td  style="border : 1px solid;font-weight: bold">Total Amount</td>
<td  style="border : 1px solid;font-weight: bold"><?php  echo $sql_emp['salary']+$sum['sum(overtime_amount)'] - $toatl_dedcut ?></td>
           
</tr>
 </table>
    </div>
     
      <input type="button" value="print" onclick="pirntpay('payslip');"/>
</div>  