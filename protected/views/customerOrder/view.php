<?php
/* @var $this CustomerOrderController */
/* @var $model CustomerOrder */

$this->breadcrumbs=array(
	'Customer Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CustomerOrder', 'url'=>array('index')),
	array('label'=>'Create CustomerOrder', 'url'=>array('create')),
	array('label'=>'Update CustomerOrder', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CustomerOrder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CustomerOrder', 'url'=>array('admin')),
);
?>

<h1>View CustomerOrder #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'customer_id',
		'delivery_address',
		'delivery_time',
		'delivery_date',
		'event',
		'discount',
		'advance',
		'total',
		'fare_charges',
		'bbq_charges',
		'service_charges',
		'packing_charges',
		'comments',
		'lunch_dinner',
	),
)); ?>
