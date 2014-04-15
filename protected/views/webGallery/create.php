<?php
/* @var $this WebGalleryController */
/* @var $model WebGallery */

$this->breadcrumbs=array(
	'Web Galleries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WebGallery', 'url'=>array('index')),
	array('label'=>'Manage WebGallery', 'url'=>array('admin')),
);
?>

<h1>Create WebGallery</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>