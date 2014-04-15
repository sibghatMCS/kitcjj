<?php
/* @var $this AttandanceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Attandances',
);

$this->menu=array(
	array('label'=>'Create Attandance', 'url'=>array('create')),
	array('label'=>'Manage Attandance', 'url'=>array('admin')),
);
?>

<h1>Attandances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
