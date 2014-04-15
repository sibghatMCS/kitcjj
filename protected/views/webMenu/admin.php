<?php
/* @var $this WebMenuController */
/* @var $model WebMenu */

$this->breadcrumbs=array(
	'Web Menus'=>array('index'),
	'Manage',
);

$sql="select * from web_menu "; 
$command = Yii::app()->db->createCommand($sql);
$cate= $command->queryAll();

?>


  <div class="row-fluid">
<h3 class="header smaller lighter blue">
    <a href="index.php?r=webMenu/create" style="float:right" class="btn btn-mini btn-primary">New Create</a></h3>
                            <div class="table-header">
                                Sorted By Last Added	</div>
                            
                                <table id="table_report" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                             <th>Price</th>
                                         
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($cate as $cates) { ?>

            
                                        <tr>
                                            <td><?php echo $cates['name'] ?></td>
                                            <td><?php echo $cates['price'] ?></td>
                                         
                                         
                                            
                                            
                                            <td width="25%">
                                                
<div class='btn-group span12'>
           <a href="index.php?r=webMenu/update&id=<?php echo $cates['id']; ?>" class='btn btn-mini btn-success span6'>
    <i class='icon-th'></i> Update </a>
    
       <a href="index.php?r=webMenu/Del&id=<?php echo $cates['id']; ?>" class='btn btn-mini btn-danger span6' 
          onclick="return confirm('Are you sure you want to delete this deigh?')">
    <i class='icon-th'></i> Delete </a>
    
    
    
 

                                                </div>
                                              
                                             </td>
                                        </tr>	
                            <?php } ?>
                                     
                                        
                                    </tbody>
                                </table>
                            
                        </div>


