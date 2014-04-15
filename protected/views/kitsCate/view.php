<?php
/* @var $this KitsCateController */
/* @var $model KitsCate */

$this->breadcrumbs=array(
	'Kits Cates'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List KitsCate', 'url'=>array('index')),
	array('label'=>'Create KitsCate', 'url'=>array('create')),
	array('label'=>'Update KitsCate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KitsCate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KitsCate', 'url'=>array('admin')),
);
?>

<h1>View KitsCate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'status',
	),
)); ?>
