<?php
/* @var $this AttandanceController */
/* @var $model Attandance */

$this->breadcrumbs=array(
	'Attandances'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Attandance', 'url'=>array('index')),
	array('label'=>'Create Attandance', 'url'=>array('create')),
	array('label'=>'Update Attandance', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Attandance', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Attandance', 'url'=>array('admin')),
);
?>

<h1>View Attandance #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'emp_id',
		'date',
		'time_in',
		'time_out',
		'hours',
		'over_time',
		'half_day',
		'status',
	),
)); ?>
