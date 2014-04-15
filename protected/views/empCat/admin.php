<?php
/* @var $this EmpCatController */
/* @var $model EmpCat */

$this->breadcrumbs=array(
	'Emp Cats'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EmpCat', 'url'=>array('index')),
	array('label'=>'Create EmpCat', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#emp-cat-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Categories </h1>

<?php $sql="select * from emp_cat where status =1"; 
$command = Yii::app()->db->createCommand($sql);
$cate= $command->queryAll();
?>
  <div class="row-fluid">
<h3 class="header smaller lighter blue">
    <a href="index.php?r=empCat/create" style="float:right" class="btn btn-mini btn-primary">New Create</a></h3>
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
           
    

        <a href="index.php?r=empCat/update&id=<?php echo $cates['id']; ?>" class='btn btn-mini btn-success span6' 
    >
    <i class='icon-th'></i> Update </a>
    
       <a href="index.php?r=empCat/Del&id=<?php echo $cates['id']; ?>" class='btn btn-mini btn-danger span6' 
          onclick="return confirm('Are you sure you want to delete this deigh?')">
    <i class='icon-th'></i> Delete </a>
    
    
    
 

                                                </div>
                                              
                                             </td>
                                        </tr>	
                            <?php } ?>
                                     
                                        
                                    </tbody>
                                </table>
                            
                        </div>



<?php /* $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'emp-cat-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); */ ?>
