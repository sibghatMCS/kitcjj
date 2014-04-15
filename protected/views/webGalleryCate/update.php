<?php
/* @var $this WebGalleryCateController */
/* @var $model WebGalleryCate */

$this->breadcrumbs=array(
	'Web Gallery Cates'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WebGalleryCate', 'url'=>array('index')),
	array('label'=>'Create WebGalleryCate', 'url'=>array('create')),
	array('label'=>'View WebGalleryCate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage WebGalleryCate', 'url'=>array('admin')),
);
?>

<h1>Update WebGalleryCate <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>