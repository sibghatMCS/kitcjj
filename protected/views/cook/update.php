<?php
/* @var $this CookController */
/* @var $model Cook */

$this->breadcrumbs=array(
	'Cooks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cook', 'url'=>array('index')),
	array('label'=>'Create Cook', 'url'=>array('create')),
	array('label'=>'View Cook', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cook', 'url'=>array('admin')),
);
?>

<h1>Update Cook <?php echo $model->firstname.'&nbsp;'.$model->lastname; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>