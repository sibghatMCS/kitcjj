<?php
/* @var $this DeghController */
/* @var $model Degh */

$this->breadcrumbs=array(
	'Deghs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Degh', 'url'=>array('index')),
	array('label'=>'Create Degh', 'url'=>array('create')),
	array('label'=>'View Degh', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Degh', 'url'=>array('admin')),
);
?>

<h1>Update Degh <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>