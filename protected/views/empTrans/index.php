<?php
/* @var $this EmpTransController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Emp Trans',
);

$this->menu=array(
	array('label'=>'Create EmpTrans', 'url'=>array('create')),
	array('label'=>'Manage EmpTrans', 'url'=>array('admin')),
);
?>

<h1>Emp Trans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
