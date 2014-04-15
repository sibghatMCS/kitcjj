<?php
/* @var $this EmpTransController */
/* @var $model EmpTrans */

$this->breadcrumbs=array(
	'Emp Trans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmpTrans', 'url'=>array('index')),
	array('label'=>'Manage EmpTrans', 'url'=>array('admin')),
);
?>

<h1>Create EmpTrans</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>