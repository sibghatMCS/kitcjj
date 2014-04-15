<?php
/* @var $this CookController */
/* @var $model Cook */

$this->breadcrumbs=array(
	'Cooks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cook', 'url'=>array('index')),
	array('label'=>'Manage Cook', 'url'=>array('admin')),
);
?>

<h1>Create Cook</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>