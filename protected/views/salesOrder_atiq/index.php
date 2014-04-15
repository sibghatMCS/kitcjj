<?php
/* @var $this SalesOrderController */

$this->breadcrumbs=array(
	'Sales Order',
);

//print_r($orders);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

  <div class="row-fluid">
                            <h3 class="header smaller lighter blue">Invoices<a href="#" style="float:right" class="btn btn-mini btn-primary">New Invoice</a></h3>
                            <div class="table-header">
                                Sorted By Last Invoices	</div>
                            
                                <table id="table_report" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Order Date</th>
                                            <th>Delivery Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($orders as $order) { ?>


                                        
                                        <tr>
                                            <td><?php echo $order['deliver_to'] ?></td>
                                            <td><?php echo $order['ord_date'] ?></td>
                                            <td><?php echo $order['delivery_date'] ?></td>
                                            <td width="10%">
                                                <div class='btn-group'>
                                                    
                                                    <a href="index.php?r=SalesOrder/Assigndegh&id=<?php echo $order['order_no'] ?>" class='btn btn-mini btn-primary'><i class='icon-fullscreen'></i>Assign Degh</a>
                                                    
                                                </div>
                                             </td>
                                        </tr>	
                            <?php } ?>
                                     
                                        
                                    </tbody>
                                </table>
                            
                        </div>

