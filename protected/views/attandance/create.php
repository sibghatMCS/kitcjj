<?php
/* @var $this AttandanceController */
/* @var $model Attandance */

$this->breadcrumbs=array(
	'Attandances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Attandance', 'url'=>array('index')),
	array('label'=>'Manage Attandance', 'url'=>array('admin')),
);
?>

<h1>Create Attandance</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>