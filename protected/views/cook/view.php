<?php
/* @var $this CookController */
/* @var $model Cook */

$this->breadcrumbs=array(
	'Cooks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cook', 'url'=>array('index')),
	array('label'=>'Create Cook', 'url'=>array('create')),
	array('label'=>'Update Cook', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cook', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cook', 'url'=>array('admin')),
);
?>

<h1>View Cook #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'firstname',
		'lastname',
		'phone',
		'address',
		'cnic',
		'shift',
		'status',
	),
)); ?>
