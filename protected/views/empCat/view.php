<?php
/* @var $this EmpCatController */
/* @var $model EmpCat */

$this->breadcrumbs=array(
	'Emp Cats'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EmpCat', 'url'=>array('index')),
	array('label'=>'Create EmpCat', 'url'=>array('create')),
	array('label'=>'Update EmpCat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmpCat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmpCat', 'url'=>array('admin')),
);
?>

<h1>View EmpCat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'status',
	),
)); ?>
