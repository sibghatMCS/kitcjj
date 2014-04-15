<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//print_r($data);

?>


  <div class="row-fluid">
<h3 class="header smaller lighter blue">Deigh
    <a href="index.php?r=degh/create" style="float:right" class="btn btn-mini btn-primary">New Deigh</a></h3>
                            <div class="table-header">
                                Sorted By Last Added	</div>
                            
                                <table id="table_report" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Order ID</th>
                                           <th>Assigned Date </th>
                                           <th>Client Name</th>
                                           <th>Status</th>
                                           
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($data as $dataval) { 
      //print_r($dataval['order_id']); exit;
                               $sql="SELECT * FROM  degh where id ='".$dataval['degh_id']."'  " ;
                               $command = Yii::app()->db->createCommand($sql);
                                $degh_code= $command->queryRow();
                                
                                 $sql="SELECT * FROM  `0_debtors_master` as dm , customer_order co where co.sale_order='".$dataval['order_id']."'  and co.customer_id=dm.debtor_no";
                                $command = Yii::app()->db->createCommand($sql);
                                $cus_name= $command->queryRow();
                                ?>
                                        
                                        <tr>
                                            <td><?php echo $degh_code['code']; ?></td>
                                            <td><?php echo $dataval['order_id'];?></td>
                                            <td><?php echo $dataval['assign_date'];    ?></td>
                                            <td><?php echo $cus_name['name']; ?></td>
                                            <td><?php echo $dataval['status']==1? 'Busy': 'Received/Return'; ?></td>
                                        </tr>  

                                
                                
                                
                                <?php           }
?>


                                        
                                        
                                        