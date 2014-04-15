<?php
/* @var $this WebGalleryCateController */
/* @var $model WebGalleryCate */

$this->breadcrumbs=array(
	'Web Gallery Cates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WebGalleryCate', 'url'=>array('index')),
	array('label'=>'Manage WebGalleryCate', 'url'=>array('admin')),
);
?>

<h1>Create WebGalleryCate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>