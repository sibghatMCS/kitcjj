<?php
/* @var $this WebGalleryCateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Web Gallery Cates',
);

$this->menu=array(
	array('label'=>'Create WebGalleryCate', 'url'=>array('create')),
	array('label'=>'Manage WebGalleryCate', 'url'=>array('admin')),
);
?>

<h1>Web Gallery Cates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
