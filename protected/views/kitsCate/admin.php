
<h1>Manage Kit Categories </h1>

<?php $sql="select * from kits_cate where status = 1"; 
$command = Yii::app()->db->createCommand($sql);
$cate= $command->queryAll();
?>
  <div class="row-fluid">
<h3 class="header smaller lighter blue">
    <a href="index.php?r=kitsCate/create" style="float:right" class="btn btn-mini btn-primary">New Create</a></h3>
                            <div class="table-header">
                                Sorted By Last Added	</div>
                            
                                <table id="table_report" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                       
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($cate as $cates) {  ?>
                                
                                   <tr>
                                            <th><?php echo $cates['name'] ?></th>
                                       
                                            <th><a href="index.php?r=kitsCate/update&id=<?php echo $cates['id'] ?>" ><input type="button" class="btn " value="Edit" /></a></th>
                                        </tr>
                               <?php  }?>