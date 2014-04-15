<?php
/* @var $this WebGalleryCateController */
/* @var $model WebGalleryCate */

$this->breadcrumbs=array(
	'Web Gallery Cates'=>array('index'),
	'Manage',
);


?>

<?php 
$sql="select * from web_gallery_cate "; 
$command = Yii::app()->db->createCommand($sql);
$cate= $command->queryAll();

?>


  <div class="row-fluid">
<h3 class="header smaller lighter blue">
    <a href="index.php?r=webGalleryCate/create" style="float:right" class="btn btn-mini btn-primary">New Create</a></h3>
                            <div class="table-header">
                                Sorted By Last Added	</div>
                            
                                <table id="table_report" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                         
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($cate as $cates) { ?>

            
                                        <tr>
                                            <td><?php echo $cates['name'] ?></td>
                                         
                                         
                                            
                                            
                                            <td width="25%">
                                                
<div class='btn-group span12'>
           <a href="index.php?r=webGalleryCate/update&id=<?php echo $cates['id']; ?>" class='btn btn-mini btn-success span6'>
    <i class='icon-th'></i> Update </a>
    
       <a href="index.php?r=webGalleryCate/Del&id=<?php echo $cates['id']; ?>" class='btn btn-mini btn-danger span6' 
          onclick="return confirm('Are you sure you want to delete this deigh?')">
    <i class='icon-th'></i> Delete </a>
    
    
    
 

                                                </div>
                                              
                                             </td>
                                        </tr>	
                            <?php } ?>
                                     
                                        
                                    </tbody>
                                </table>
                            
                        </div>
