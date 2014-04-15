<script>
    
    function getbalc(id)
    {
      //  alert(id)
      if(id!=0)
      {
          $.ajax({
            
			   type: "POST",
			   url: "index.php?r=attandance/getbalance&id="+id,
success: function(data){
       
 document.getElementById("amtt").innerHTML = data;
			   }
                           
                           
			 });
                     }
      }
   
        
        </script>
<div id="content">
	
<h1>Payment</h1>


<div class="form">

    
    
<form action="" method="post">
    <input type="hidden" name="uid" value="<?php  //echo $user ?>" />
    <table>
        <tr><td>Employee</td><td> <?php   $list = CHtml::listData(Employees::model()->findAllByAttributes(array('status'=>1)), 'id', 'name'); 
   echo '<select name="emp_id" onchange="getbalc(this.value)" >'
        . '<option value="0">Select an Employee</option>';
        foreach ($list as $key => $value) { 
       echo '<option id="'.$key.'" value="'.$key.'" >'.$value.' </option>';
       
       
   }
   echo '</select>';
        
        ?></td></tr>
        <tr class="row"> <td>Balance Amount </td></tr>
        <tr class="row"><td><b id="amtt"><?php // echo $balance->balance ?></b></td></tr>
    
        
        
        <tr class="row"><td>Paying Now </td></tr>
        <tr class="row"><td><input type="text" name="amount" ></td></tr>
        <tr class="row"><td><input type="submit" name="submitamt" ></td></tr>
    
    </table>
    
    
</form></div></div>