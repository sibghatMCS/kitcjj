<?php
/* @var $this CustomerOrderController */
/* @var $model CustomerOrder */

$this->breadcrumbs=array(
	'Customer Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CustomerOrder', 'url'=>array('index')),
	array('label'=>'Create CustomerOrder', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customer-order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Customer Orders</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customer-order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'customer_id',
		'delivery_address',
		'delivery_time',
		'delivery_date',
		'event',
		/*
		'discount',
		'advance',
		'total',
		'fare_charges',
		'bbq_charges',
		'service_charges',
		'packing_charges',
		'comments',
		'lunch_dinner',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
