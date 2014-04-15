<?php
/* @var $this SalesOrderController */

$this->breadcrumbs=array(
	'Sales Order',
);

//print_r($orders);
?>
	
<h1><?php //echo $this->id . '/' . $this->action->id; ?></h1>
<div id="demoLightbox" class="lightbox fade"  tabindex="-1" role="dialog" aria-hidden="true">
	<div class='lightbox-content'>
		<img height="0" style="display: none" src="assets\img\glyphicons-halflings.png" alt="recipe">
                <span><b><u>Order Items</u></b></span>	<div style="height:66%" id="recipedata" class="lightbox-caption"></div>
	</div>
</div>
<div class="clear"></div>
  <div class="row-fluid">
      
                            <h3 class="header smaller lighter blue"> Orders</h3>
                            <div class="table-header">
                                Kitchen status	</div>
                            
                                <table id="table_report" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Order Date</th>
                                            <th>Delivery Date</th>
                                            <th>Assigned Dehg</th>
                                           
                                            <th>Assigned Cook</th>
                                             <th>Received Dehg</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                                            
                                    <tbody>
                            <?php  foreach ($orders as $order) { 
                                
                                $sql="SELECT * FROM  `cook_work` cw,employees c where order_id ='". $order['sale_order']."' and cw.cook_id=c.id and c.status=1";
                                
                                $command = Yii::app()->db->createCommand($sql);
                                $cooks= $command->queryAll();
                                
                                
                                
                                 $sql="SELECT * FROM  `assign_degh` ad,degh d where ad.order_id ='". $order['sale_order']."' and ad.degh_id=d.id ";
                                
                                $command = Yii::app()->db->createCommand($sql);
                                $deghs= $command->queryAll();
                                
                                
                                
                                 $sql="SELECT * FROM  `assign_degh` ad,degh d where ad.order_id ='". $order['sale_order']."' and ad.degh_id=d.id  and ad.status=0";
                                
                                $command = Yii::app()->db->createCommand($sql);
                                $deghs_received= $command->queryAll();
                                

                                ?>

                                            
                                        
                                        <tr>
                                            <td><?php echo $order['deliver_to'] ?></td>
                                            <td><?php echo $order['ord_date'] ?></td>
                                            <td><?php echo $order['delivery_date'] ?></td>
                                            <td><?php $i=0; foreach ($deghs as $degh) {
                                                
                                                if($i==3)
                                                {echo '<br/>';
                                                
                                                $i=0;
                                                }
                                                echo $degh['code'].',';
                                                
                                                $i++;
                                
                            }?></td>
                                            <td><?php $i=0; foreach ($cooks as $cook) {
                                 if($i==2)
                                                {echo '<br/>';
                                                
                                                $i=0;
                                                }
                                                echo $cook['name'].','; 
                                                    $i++;
                            } ?></td>
                                            <td>
                                              <?php $i=0; foreach ($deghs_received as $degh) {
                                                
                                                if($i==3)
                                                {echo '<br/>';
                                                
                                                $i=0;
                                                }
                                                echo $degh['code'].',';
                                                
                                                $i++;
                                
                            }?></td>
                                            
                                            
                                            <td width="10%">
                                                <div class='btn-group'>
<?php    if($order['deliverd']==0) 
{ ?>

<a href="index.php?r=SalesOrder/Assigndegh&id=<?php echo $order['order_no'] ?>" class='btn btn-mini btn-primary'><i class='icon-fullscreen'></i>Assign Asset</a>

<?php } ?>
<?php if((count($deghs_received)!=count($deghs) && count($deghs)>0 )){ ?>
<a href="index.php?r=SalesOrder/Receivedegh&id=<?php echo $order['order_no'] ?>" class='btn btn-mini btn-success'><i class='icon-fullscreen'></i>Receive Degh</a>
<?php } 
if((count($deghs_received)==count($deghs))) 
{ ?>
<a href="index.php?r=SalesOrder/Close&id=<?php echo $order['order_no'] ?>" onclick="return myFunction()" class='btn btn-mini btn-success'><i class='icon-fullscreen'></i>Close Order</a>
<?php } 

if($order['deliverd']==0) 
{ ?>


<a href="index.php?r=SalesOrder/delivery&id=<?php echo $order['id'] ?>" onclick="return myFunction()" class='btn btn-mini btn-success'><i class='icon-fullscreen'></i>Delivered Order</a>
               
<?php } ?>
<a onclick="fancy(<?php echo $order['id'] ?>)" class='btn btn-mini btn-success' href="#" >show Recipe</a>                        
                                                    
                                                </div>
                                             </td>
                                        </tr>	
                                        
                            <?php } ?>
                                       
                                        
                                    </tbody>
                                </table>
                            
                        </div>

<script>
function myFunction()
{
var x;
var r=confirm("Are you sure !");
if (r==true)
  {
  return true
  }
else
  {
  return false
  }

}
</script>