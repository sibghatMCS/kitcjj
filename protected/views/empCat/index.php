<?php
/* @var $this EmpCatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Emp Cats',
);

$this->menu=array(
	array('label'=>'Create EmpCat', 'url'=>array('create')),
	array('label'=>'Manage EmpCat', 'url'=>array('admin')),
);
?>

<h1>Emp Cats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
