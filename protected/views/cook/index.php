<?php
/* @var $this CookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cooks',
);

$this->menu=array(
	array('label'=>'Create Cook', 'url'=>array('create')),
	array('label'=>'Manage Cook', 'url'=>array('admin')),
);
?>

<h1>Cooks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
