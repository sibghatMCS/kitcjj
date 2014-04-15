<?php
/* @var $this WebGalleryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Web Galleries',
);

$this->menu=array(
	array('label'=>'Create WebGallery', 'url'=>array('create')),
	array('label'=>'Manage WebGallery', 'url'=>array('admin')),
);
?>

<h1>Web Galleries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
