<?php
/* @var $this WebItemsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Web Items',
);

$this->menu=array(
	array('label'=>'Create WebItems', 'url'=>array('create')),
	array('label'=>'Manage WebItems', 'url'=>array('admin')),
);
?>

<h1>Web Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
