<?php
$this->breadcrumbs=array(
	'Deghs'=>array('index'),
	'Manage',
);

/* @var $this DeghController */
/* @var $model Degh 



$this->menu=array(
	array('label'=>'List Degh', 'url'=>array('index')),
	array('label'=>'Create Degh', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#degh-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Deghs</h1>

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
	'id'=>'degh-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'code',
		'status',
		'del_status',
		array(
			'class'=>'CButtonColumn',
		),
	),
));*/ ?>
<?php
/* @var $this CookController */
/* @var $model Cook */
/*
$this->breadcrumbs=array(
	'Cooks'=>array('index'),
	'Manage',
);

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

$sql="select * from degh";
$command = Yii::app()->db->createCommand($sql);
$orders= $command->queryAll();
?>

<h1><?php //echo $this->id . '/' . $this->action->id; ?></h1>

  <div class="row-fluid">
<h3 class="header smaller lighter blue">Deigh
    <a href="index.php?r=degh/create" style="float:right" class="btn btn-mini btn-primary">New Deigh</a></h3>
                            <div class="table-header">
                                Sorted By Last Added	</div>
                            
                                <table id="table_report" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Status</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($orders as $order) { ?>


                                        
                                        <tr>
                                            <td><?php echo $order['code'] ?></td>
                                            <td><?php 
                                            if($order['status'] == 1) echo 'Busy';
                                            Else echo 'Avaliable' ?></td>
                                            
                                            <td width="25%">
                                                
<div class='btn-group span12'>
           
    

       <a href="index.php?r=degh/delete&id=<?php echo $order['id']; ?>" class='btn btn-mini btn-danger span6' 
          onclick="return confirm('Are you sure you want to delete this deigh?')">
    <i class='icon-th'></i> Delete </a>
    
    <a href="index.php?r=degh/DeghRecords&dgid=<?php echo $order['id']; ?>" class='btn btn-mini btn-info span6' 
        >
    <i class='icon-th'></i> Booking Records </a>
    
    
    
 

                                                </div>
                                              
                                             </td>
                                        </tr>	
                            <?php } ?>
                                     
                                        
                                    </tbody>
                                </table>
                            
                        </div>



