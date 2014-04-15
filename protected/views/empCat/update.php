<?php
/* @var $this EmpCatController */
/* @var $model EmpCat */

$this->breadcrumbs=array(
	'Emp Cats'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmpCat', 'url'=>array('index')),
	array('label'=>'Create EmpCat', 'url'=>array('create')),
	array('label'=>'View EmpCat', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EmpCat', 'url'=>array('admin')),
);
?>

<h1>Update EmpCat <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>