<?php
/* @var $this EmployeesController */
/* @var $model Employees */

$this->breadcrumbs=array(
	'Employees'=>array('index'),
	'Manage',
);

?>

<h1>Manage Employee </h1>

<a href="index.php?r=employees/Advancepayment" ><input type="button" value="Advance Payment" class="btn btn-large btn-success" /></a>

<a href="index.php?r=loan/create" ><input type="button" value="Loan" class="btn btn-large btn-success" /></a>

<a href="index.php?r=emptrans/Transactions&mon=<?php echo date('m') ?>" ><input type="button" value="Transactions" class="btn btn-large btn-success" /></a>


<?php $sql="select * from employees where status =1"; 
$command = Yii::app()->db->createCommand($sql);
$cate= $command->queryAll();
?>
  <div class="row-fluid">
<h3 class="header smaller lighter blue">
    <a href="index.php?r=employees/create" style="float:right" class="btn btn-mini btn-primary">New Create</a></h3>
                            <div class="table-header">
                                Sorted By Last Added	</div>
                            
                                <table id="table_report" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>salary</th>
                                            
                                       
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($cate as $cates) { ?>


                                        
                                        <tr>
                                            <td><?php echo $cates['name'] ?></td>
                                            <td><?php echo EmpCat::model()->findByPk($cates['cat_id'])->name ?></td>
                                            <td><?php echo $cates['salary'] ?></td>
                                            
                                            
                                            <td width="25%">
                                                
<div class='btn-group span12'>
           <a href="index.php?r=employees/update&id=<?php echo $cates['id']; ?>" class='btn btn-mini btn-success span6'>
    <i class='icon-th'></i> Update </a>
    
       <a href="index.php?r=employees/Del&id=<?php echo $cates['id']; ?>" class='btn btn-mini btn-danger span6' 
          onclick="return confirm('Are you sure you want to delete this deigh?')">
    <i class='icon-th'></i> Delete </a>
    
    
    
 

                                                </div>
                                              
                                             </td>
                                        </tr>	
                            <?php } ?>
                                     
                                        
                                    </tbody>
                                </table>
                            
                        </div>


