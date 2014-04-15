<?php
/* @var $this WebGalleryCateController */
/* @var $model WebGalleryCate */

$this->breadcrumbs=array(
	'Web Gallery Cates'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List WebGalleryCate', 'url'=>array('index')),
	array('label'=>'Create WebGalleryCate', 'url'=>array('create')),
	array('label'=>'Update WebGalleryCate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete WebGalleryCate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WebGalleryCate', 'url'=>array('admin')),
);
?>

<h1>View WebGalleryCate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
