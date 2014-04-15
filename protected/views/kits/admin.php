<?php
/* @var $this KitsController */
/* @var $model Kits */

$this->breadcrumbs=array(
	'Kits'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Kits', 'url'=>array('index')),
	array('label'=>'Create Kits', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#kits-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Manage Kit  </h1>

<?php $sql="select k.*, kc.name from kits k,kits_cate kc where kc.id=k.cate"; 
$command = Yii::app()->db->createCommand($sql);
$cate= $command->queryAll();
?>
  <div class="row-fluid">
<h3 class="header smaller lighter blue">
    <a href="index.php?r=kitsCate/admin" style="float:right" ><input type="button" value=Categories" class="btn  btn-primary" /></a></h3>
    <br/>
                            <div class="table-header">
                                Sorted By Last Added	</div>
                            
                                <table id="table_report" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>code</th>
                                                  <th>Category Name</th>
                                       
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($cate as $cates) {  ?>
                                
                                   <tr>
                                            <td><?php echo $cates['code'] ?></td>
                                            <td><?php echo $cates['name'] ?></td>
                                       
                                            <td><a href="index.php?r=Kits/update&id=<?php echo $cates['id'] ?>" ><input type="button" class="btn " value="Edit" /></a></td>
                                        </tr>
                               <?php  } ?>