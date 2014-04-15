<?php
/* @var $this WebItemsController */
/* @var $model WebItems */

$this->breadcrumbs=array(
	'Web Items'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List WebItems', 'url'=>array('index')),
	array('label'=>'Create WebItems', 'url'=>array('create')),
	array('label'=>'Update WebItems', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete WebItems', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WebItems', 'url'=>array('admin')),
);
?>

<h1>View WebItems #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
