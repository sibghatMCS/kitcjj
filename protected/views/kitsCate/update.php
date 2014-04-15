<?php
/* @var $this KitsCateController */
/* @var $model KitsCate */

$this->breadcrumbs=array(
	'Kits Cates'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KitsCate', 'url'=>array('index')),
	array('label'=>'Create KitsCate', 'url'=>array('create')),
	array('label'=>'View KitsCate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KitsCate', 'url'=>array('admin')),
);
?>

<h1>Update KitsCate <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>