<?php
/* @var $this EmpTransController */
/* @var $model EmpTrans */

$this->breadcrumbs=array(
	'Emp Trans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmpTrans', 'url'=>array('index')),
	array('label'=>'Create EmpTrans', 'url'=>array('create')),
	array('label'=>'View EmpTrans', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EmpTrans', 'url'=>array('admin')),
);
?>

<h1>Update EmpTrans <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>