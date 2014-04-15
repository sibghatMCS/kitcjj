<?php
/* @var $this WebItemsController */
/* @var $model WebItems */

$this->breadcrumbs=array(
	'Web Items'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WebItems', 'url'=>array('index')),
	array('label'=>'Create WebItems', 'url'=>array('create')),
	array('label'=>'View WebItems', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage WebItems', 'url'=>array('admin')),
);
?>

<h1>Update WebItems <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>