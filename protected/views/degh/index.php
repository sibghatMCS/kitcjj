<?php
/* @var $this DeghController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Deghs',
);

$this->menu=array(
	array('label'=>'Create Degh', 'url'=>array('create')),
	array('label'=>'Manage Degh', 'url'=>array('admin')),
);
?>

<h1>Deghs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
