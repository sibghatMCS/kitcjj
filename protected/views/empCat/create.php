<?php
/* @var $this EmpCatController */
/* @var $model EmpCat */

$this->breadcrumbs=array(
	'Emp Cats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmpCat', 'url'=>array('index')),
	array('label'=>'Manage EmpCat', 'url'=>array('admin')),
);
?>

<h1>Create EmpCat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>