<?php
/* @var $this KitsCateController */
/* @var $model KitsCate */

$this->breadcrumbs=array(
	'Kits Cates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KitsCate', 'url'=>array('index')),
	array('label'=>'Manage KitsCate', 'url'=>array('admin')),
);
?>

<h1>Create KitsCate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>