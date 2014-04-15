<?php
/* @var $this WebGalleryController */
/* @var $model WebGallery */

$this->breadcrumbs=array(
	'Web Galleries'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WebGallery', 'url'=>array('index')),
	array('label'=>'Create WebGallery', 'url'=>array('create')),
	array('label'=>'View WebGallery', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage WebGallery', 'url'=>array('admin')),
);
?>

<h1>Update WebGallery <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>