


<script>
    function pirntpay(divID) {
            
            var divElements = document.getElementById(divID).innerHTML;
            
            
     myWindow=window.open();
     //myWindow.innerWidth='500px';
    myWindow.document.body.innerHTML = "<html><body><div>"+divElements+"</div></body></html>";
  
    myWindow.print(); 
    return;
          
        }
        
    


</script>

    <?php 
          
 $month = date('m');

for($i=1;$i<= $month; $i++){
    $mon=$month -$i;
   $month_name = date('F', strtotime("-$mon month"));
    
    //echo $month_name;
    echo'
            <a href="index.php?r=attandance/getattendance&month="'.$i.'">
<input class="btn btn-inverse btn-small" type="button" value="'.$month_name.'">
</a>';
    
    
}
    ?>
     
  
  
    
    
    <div class="row-fluid" id="payprint">
        <h3 class="header smaller lighter blue">PAY SHEET OF EMPLOYEES FOR THE MONTH OF <?php echo date('F')?></h3>
        
   <table  cellspacing="2" cellpadding="2" style="border : 1px solid;width: 100%"> 
       <tr  style="border : 1px solid;">
           <th  style="border : 1px solid;">Name</th>
           <th  style="border : 1px solid;">Category</th>
           <th  style="border : 1px solid;">Gross Salary</th>
           <th  style="border : 1px solid;">Salary Deduction</th>
           <th  style="border : 1px solid;">Overtime Amount</th>
           <th  style="border : 1px solid;">Fine Amount</th>
           <th  style="border : 1px solid;width: 100px;">Presents</th>
           <th  style="border : 1px solid;">Absents</th>
           <th  style="border : 1px solid;">Total Deduction</th>
           <th  style="border : 1px solid;">Total Pay Amount</th>
          
       </tr>
       
       
       
       <?php
       
 
      
       
       $sql_emp="SELECT * FROM `employees` WHERE  status =1";
//echo $sql;exit; 
$sql_emp= Yii::app()->db->createCommand($sql_emp);
$sql_emp= $sql_emp->queryAll();
       
     foreach($sql_emp as $emp){
  $sql="SELECT emp_id, sum(overtime_amount) , sum(fine_amount) FROM `attandance` WHERE 
    month(date) = month(curdate()) AND emp_id =".$emp['id'];
//echo $sql;exit; 
$sql= Yii::app()->db->createCommand($sql);
$rec= $sql->queryRow(); 

  $sql_pre="SELECT count(*) FROM `attandance` WHERE month(date) = month(curdate()) AND emp_id ='".$emp['id']."' and 
       attd_status = 1";
//echo $sql;exit; 
$sql_pre= Yii::app()->db->createCommand($sql_pre);
$sql_pre= $sql_pre->queryRow(); 

  $sql_abs="SELECT count(*) FROM `attandance` WHERE month(date) = month(curdate()) AND emp_id ='".$emp['id']."' and 
       attd_status = 0";
//echo $sql;exit; 
$sql_abs= Yii::app()->db->createCommand($sql_abs);
$sql_abs= $sql_abs->queryRow(); 


$totaldays = $sql_abs['count(*)']+$sql_pre['count(*)'];
$perdaypay = round($emp['salary']/$totaldays);


//print_r ($rec) ; exit;?>
           
           
       <tr  style="border : 1px solid;">
<td  style=" text-align: center; border : 1px solid;" ><?php echo $emp['name']; ?></td>
<td  style=" text-align: center; border : 1px solid;" >
    <?php echo EmpCat::model()->findByPk($emp['cat_id'])->name ?></td>
<td  style="border : 1px solid;text-align: center;"><?php echo $emp['salary']; ?></td>
<td  style="border : 1px solid;text-align: center;"><?php $absent_decut= $perdaypay*$sql_abs['count(*)'];
          echo  $absent_decut; ?></td>
<td style="border : 1px solid;text-align: center;"><?php  echo $rec ['sum(overtime_amount)'] ; ?></td>
<td  style="border : 1px solid;text-align: center;"><?php echo $rec['sum(fine_amount)']; ?></td>
<td  style="border : 1px solid;text-align: center;width: 100px;"><?php echo $sql_pre['count(*)']?></td>
<td  style="border : 1px solid;text-align: center;"><?php echo $sql_abs['count(*)']?></td>
<td  style="border : 1px solid;text-align: center;">
    <?php $toatl_dedcut = $rec['sum(fine_amount)'] + $absent_decut;echo $toatl_dedcut; ?></td>
<td  style="border : 1px solid;text-align: center;">
    <?php echo $emp['salary']+$rec['sum(overtime_amount)'] - $toatl_dedcut ?></td>
       </tr>     
         
           
           
           
        <?php    } ?>
       
 
   </table>
        </div> 
    
    <br/>
    
     <input type="button" value="print" onclick="pirntpay('payprint');"/>
