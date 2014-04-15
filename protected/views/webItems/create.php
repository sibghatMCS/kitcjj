<?php
/* @var $this WebItemsController */
/* @var $model WebItems */

$this->breadcrumbs=array(
	'Web Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WebItems', 'url'=>array('index')),
	array('label'=>'Manage WebItems', 'url'=>array('admin')),
);
?>

<h1>Create WebItems</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>