<?php
/* @var $this WebMenuController */
/* @var $model WebMenu */

$this->breadcrumbs=array(
	'Web Menus'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WebMenu', 'url'=>array('index')),
	array('label'=>'Create WebMenu', 'url'=>array('create')),
	array('label'=>'View WebMenu', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage WebMenu', 'url'=>array('admin')),
);
?>

<h1>Update WebMenu <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>