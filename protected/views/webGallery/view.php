<?php
/* @var $this WebGalleryController */
/* @var $model WebGallery */

$this->breadcrumbs=array(
	'Web Galleries'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List WebGallery', 'url'=>array('index')),
	array('label'=>'Create WebGallery', 'url'=>array('create')),
	array('label'=>'Update WebGallery', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete WebGallery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WebGallery', 'url'=>array('admin')),
);
?>

<h1>View WebGallery #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'image',
		'cate',
	),
)); ?>
