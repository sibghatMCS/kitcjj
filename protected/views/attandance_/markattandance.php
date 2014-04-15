
<style>
    
    input[type=checkbox] {
opacity: 1;
    }
    
    input {
width: 144px;
}

</style>

<script>
function submitRowAsForm(idRow) {
  form = document.createElement("form"); // CREATE A NEW FORM TO DUMP ELEMENTS INTO FOR SUBMISSION
  form.method = "post"; // CHOOSE FORM SUBMISSION METHOD, "GET" OR "POST"
  form.action = ""; // TELL THE FORM WHAT PAGE TO SUBMIT TO
  $("#"+id+" td").children().each(function() { // GRAB ALL CHILD ELEMENTS OF <TD>'S IN THE ROW IDENTIFIED BY idRow, CLONE THEM, AND DUMP THEM IN OUR FORM
        if(this.type.substring(0,6) == "select") { // JQUERY DOESN'T CLONE <SELECT> ELEMENTS PROPERLY, SO HANDLE THAT
            input = document.createElement("input"); // CREATE AN ELEMENT TO COPY VALUES TO
            input.type = "hidden";
            input.name = this.name; // GIVE ELEMENT SAME NAME AS THE <SELECT>
            input.value = this.value; // ASSIGN THE VALUE FROM THE <SELECT>
            form.appendChild(input);
        } else { // IF IT'S NOT A SELECT ELEMENT, JUST CLONE IT.
            $(this).clone().appendTo(form);
        }

    });
  form.submit(); // NOW SUBMIT THE FORM THAT WE'VE JUST CREATED AND POPULATED
}



</script>

<script src="http://code.jquery.com/jquery-1.11.0.js"></script> 
<script type="text/javascript">
       
function markattend(val)
   { 
       if(val!='' && val!=' ')
           {
               var overtime = document.getElementById("overtime"+val).value; 
               var fine  = document.getElementById("fine"+val).value; 
               var service = document.getElementById("serive"+val).value; 
               var remarks = document.getElementById("remarks"+val).value; 
       	$.ajax({
            
type: "POST",
url: "index.php?r=attandance/markAttden&id="+val+"&overtime="+overtime+"&fine="+fine+"&service="+service+"&remkars="+remarks,
	//data: "items="+itemlist,
                           
success: function(data){
alert(data);
 
			   }
			 });
           }
           

              
}

function markabsent(val)
   { 
       if(val!='' && val!=' ')
           {
              
       	$.ajax({
            
type: "POST",
url: "index.php?r=attandance/markAbsent&id="+val,
	//data: "items="+itemlist,
                           
success: function(data){
alert(data);
 

	   }
			 });
           }
           

              
}
</script>

<?php


$sql_count="SELECT count(a.emp_id) FROM attandance a where a.date = curdate()";
$sql_count = Yii::app()->db->createCommand($sql_count);
$sql_count= $sql_count->queryRow();

if($sql_count['count(a.emp_id)'] < 1)
$subquery= 1 ;
else
$subquery = "e.id not in (SELECT a.emp_id FROM attandance a where a.date = curdate())";

$sql="select e.id,e.name,e.cat_id from employees e where status = 1 and ".$subquery; 
$command = Yii::app()->db->createCommand($sql);
$cate= $command->queryAll();

?>

<div class="row-fluid">
     <table id="table_report" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                           
                                            <th>OverTime Amount </th>
                                            <th>Fine Amount</th>
                                            <th>Service</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($cate as $cates) { ?>

                                  
                                        
                                        <tr >
<td><?php echo $cates['name'] ?>

    <input type="hidden" name="empid" value="<?php echo $cates['id'] ?>" />
</td>
<td><?php echo EmpCat::model()->findByPk($cates['cat_id'])->name ?></td>
<td><input type="text" id="overtime<?php echo $cates['id']?>" name="overtime" value=""></td>
<td><input type="text" name="fine" id="fine<?php echo $cates['id']?>" value=""></td>
<td><select style="width: 175px;" name="service" id="serive<?php echo $cates['id']?>">
        <option value="0">No Servive</option>
        <option value="1">Servive</option>
    </select>
</td>
<td><input type="text" name="remarks" id="remarks<?php echo $cates['id']?>"value=""></td> 
                                            
                                            
                                            <td>
                                                
<div class='btn-group'>
         
<a class=" btn btn-mini btn-success" onclick="markattend(<?php echo $cates['id']?>);">
<i class="icon-edit"></i>
Present
</a>
               <a class="btn btn-mini btn-danger"  onclick="markabsent(<?php echo $cates['id']?>)">
<i class="icon-edit"></i>
Absent
</a>
 </div>
 </td>
     </tr>	
                                        
                                      
                            <?php } ?>
                                     
                                        
                                    </tbody>
                                </table>
    </div>