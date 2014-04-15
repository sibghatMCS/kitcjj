<?php
/* @var $this WebMenuController */
/* @var $model WebMenu */

$this->breadcrumbs=array(
	'Web Menus'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List WebMenu', 'url'=>array('index')),
	array('label'=>'Create WebMenu', 'url'=>array('create')),
	array('label'=>'Update WebMenu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete WebMenu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WebMenu', 'url'=>array('admin')),
);
?>

<h1>View WebMenu #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'price',
	),
)); ?>
