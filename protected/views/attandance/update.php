<?php
/* @var $this AttandanceController */
/* @var $model Attandance */

$this->breadcrumbs=array(
	'Attandances'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Attandance', 'url'=>array('index')),
	array('label'=>'Create Attandance', 'url'=>array('create')),
	array('label'=>'View Attandance', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Attandance', 'url'=>array('admin')),
);
?>

<h1>Update Attandance <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>