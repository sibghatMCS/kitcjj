
<script>
function showemprecord(val)
{
    var mon=<?php echo $_GET['mon']; ?>
    
    window.location='http://localhost/kitchen/index.php?r=emptrans/Transactions&mon='+mon+'&emp_id='+val
}
</script>
<?php
echo 'Select Employee : ';
       if(!isset($_GET['emp_id']))
       {


  $list = CHtml::listData(Employees::model()->findAllByAttributes(array('status'=>1)), 'id', 'name'); 
   echo ' <select name="emp_id" onchange="showemprecord(this.value)" >';
   echo '<option >Select Employee</option>';
        foreach ($list as $key => $value) { 
       echo '<option id="'.$key.'" value="'.$key.'" >'.$value.' </option>';
       
       
   }
   echo '</select>';
      }
          if(isset($data))
          {
              
              
  $list = CHtml::listData(Employees::model()->findAllByAttributes(array('status'=>1)), 'id', 'name'); 
   echo '<select name="emp_id" onchange="showemprecord(this.value)" >';
        foreach ($list as $key => $value) { 
            if($_GET['emp_id']==$key)
                echo '<option selected id="'.$key.'" value="'.$key.'" >'.$value.' </option>';
            else
       echo '<option id="'.$key.'" value="'.$key.'" >'.$value.' </option>';
       
       
   }
   echo '</select>';
   
   
 $month = date('m');

for($i=1;$i<= $month; $i++){
    
    $mon=$month-$i;
    //echo $mon;
   $month_name = date('F', strtotime("-$mon month"));
    $eid=$_GET["emp_id"];
    //echo $month_name;
    echo'
            <a href="index.php?r=emptrans/Transactions&mon='.$i.'&emp_id='.$eid.'">
<input class="btn btn-inverse btn-small" type="button" value="'.$month_name.'">
</a>';
    
    
}
$mon=$_GET['mon'];
    ?>



    <h3 class="header smaller lighter blue">MONTH OF <?php echo  date("F", mktime(null, null, null, $mon));; ?></h3>
 

<table class="table">
    <tr>
        <th>Date</th>

    <th>Paid</th>
    <th>Due</th>
    <th>Loan</th>
        <th>Balance</th>
    </tr>
    
    <?php    foreach ($data as $value) { ?>
        <tr>
    <td><?php echo  $value['date'] ?></td>
  
    <td><?php echo  $value['paid'] ?></td>
    <td><?php echo  $value['due'] ?></td>
    <td><?php echo  $value['loan'] ?></td>
      <td><?php echo  $value['balance'] ?></td>
    </tr>
   <?php  } ?>
    
    
</table>
          <?php } ?>