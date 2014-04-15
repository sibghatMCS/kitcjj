<?php
/* @var $this DeghController */
/* @var $model Degh */

$this->breadcrumbs=array(
	'Deghs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Degh', 'url'=>array('index')),
	array('label'=>'Create Degh', 'url'=>array('create')),
	array('label'=>'Update Degh', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Degh', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Degh', 'url'=>array('admin')),
);
?>

<h1>View Degh #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'status',
		'del_status',
	),
)); ?>
