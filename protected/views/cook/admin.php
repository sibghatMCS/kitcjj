<?php

/* @var $this CookController */
/* @var $model Cook */

$this->breadcrumbs=array(
	'Cooks'=>array('index'),
	'Manage',
);
/*
$this->menu=array(
	array('label'=>'List Cook', 'url'=>array('index')),
	array('label'=>'Create Cook', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cook-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cooks</h1>

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
	'id'=>'cook-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'firstname',
		'lastname',
		'phone',
		'address',
		'cnic',
		/*
		'shift',
		'status',

		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
*/
?>

<?php

$sql="select * from employees where cat_id=2 AND status =1";
$command = Yii::app()->db->createCommand($sql);
$orders= $command->queryAll();
?>

<h1><?php //echo $this->id . '/' . $this->action->id; ?></h1>

  <div class="row-fluid">
<h3 class="header smaller lighter blue">Cooks
    <div style="float:right"><a href="index.php?r=cook/report"  class="btn btn-mini btn-primary">Cook Report</a>
      
  </div>
  </h3>
  
                            <div class="table-header">
                                Sorted By Last Joined Cook	</div>
                            
                                <table id="table_report" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>CNIC</th>
                                            
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($orders as $order) { ?>


                                        
                                        <tr>
                                            <td><?php echo $order['name'] ?></td>
                                            
                                            <td><?php echo $order['contanct_no'] ?></td>
                                            
                                            <td><?php echo $order['cnic'] ?></td>
                                            
                                            
                                        </tr>	
                            <?php } ?>
                                     
                                        
                                    </tbody>
                                </table>
                            
                        </div>


