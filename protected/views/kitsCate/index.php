<?php
/* @var $this KitsCateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kits Cates',
);

$this->menu=array(
	array('label'=>'Create KitsCate', 'url'=>array('create')),
	array('label'=>'Manage KitsCate', 'url'=>array('admin')),
);
?>

<h1>Kits Cates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
