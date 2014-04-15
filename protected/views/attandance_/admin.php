<?php
$sql="select * from employees e where status = 1  "; 
$command = Yii::app()->db->createCommand($sql);
$users= $command->queryAll();

$cur_month = date('m');
$cur_year = date('Y');



?>

<div id="content">
    
    <div class="row-fluid">
        <table width="100%">
            
            <tr>
                <td><h3>View Monthly Attendance</h3></td>
                <td style="text-align: right">
                    <a class=" btn btn-success" href="index.php?r=attandance/getmonattendance&month=<?php echo date('m')?>">
                    <i class="icon-edit"></i>
                    MONTHLY ATTENDANCE
                    </a>
                </td>
            </tr>
            
        </table>
        
        
        
        
    </div>
    
<div class="row-fluid">
     <table id="table_report" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($users as $user) { ?>

                                  
                                        
                                        <tr >
<td><?php echo $user['name'] ?>

    <input type="hidden" name="empid" value="<?php echo $user['id'] ?>" />
</td>
<td><?php echo EmpCat::model()->findByPk($user['cat_id'])->name ?></td>

                                            
                                            <td>
                                                
<div class='btn-group'>
         
<a class=" btn btn-success" href="index.php?r=attandance/getattendance&id=<?php echo $user['id']?>&month=<?php echo $cur_month;?>&year=<?php echo $cur_year;?>">
<i class="icon-edit"></i>
MONTH
</a>
    
<a class=" btn btn-warning" href="index.php?r=attandance/getattendyearly&id=<?php echo $user['id']?>&year=<?php echo $cur_year;?>">
<i class="icon-edit"></i>
Yearly
</a>

    
 </div>
 </td>
     </tr>	
                                        
                                      
                            <?php } ?>
                                     
                                        
                                    </tbody>
                                </table>
    </div>
    
    </div>