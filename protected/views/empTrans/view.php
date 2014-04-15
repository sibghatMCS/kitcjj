<?php
/* @var $this EmpTransController */
/* @var $model EmpTrans */

$this->breadcrumbs=array(
	'Emp Trans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EmpTrans', 'url'=>array('index')),
	array('label'=>'Create EmpTrans', 'url'=>array('create')),
	array('label'=>'Update EmpTrans', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmpTrans', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmpTrans', 'url'=>array('admin')),
);
?>

<h1>View EmpTrans #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'emap_id',
		'paid',
		'balance',
		'due',
		'date',
	),
)); ?>
