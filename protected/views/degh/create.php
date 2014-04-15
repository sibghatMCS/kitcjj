<?php
/* @var $this DeghController */
/* @var $model Degh */

$this->breadcrumbs=array(
	'Deghs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Degh', 'url'=>array('index')),
	array('label'=>'Manage Degh', 'url'=>array('admin')),
);
?>

<h1>Create Degh</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>