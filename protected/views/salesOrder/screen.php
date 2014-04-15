<?php
/* @var $this SalesOrderController */

$this->breadcrumbs=array(
	'Sales Order',
);

//print_r($orders);

$sql="SELECT * FROM  `0_item_codes` ";
   $command = Yii::app()->db->createCommand($sql);
$urdu= $command->queryAll();
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
foreach ($urdu as $val) {
    
 // echo $val['description'].$val['urdu_name'].'<br/>';
    
}
?>
<div style="padding: 16px">
<h1><?php //echo $this->id . '/' . $this->action->id; ?></h1>
<div id="demoLightbox" class="lightbox fade"  tabindex="-1" role="dialog" aria-hidden="true">
	<div class='lightbox-content'>
		<img height="0" style="display: none" src="assets\img\glyphicons-halflings.png" alt="jashd kjashd">
                <span><b><u>Order Items</u></b></span>	<div style="height:66%" id="recipedata" class="lightbox-caption"></div>
	</div>
</div>
<div class="clear"></div>
  <div class="row-fluid">
      
                            <h3 class="header smaller lighter blue">Todays Order (Dated: <?php echo $_GET['sdate'].' to '.$_GET['edate']  ?>)
                            <a style="float:right;z-index: 999999" href="index.php" class="btn btn-primary">Back</a>
                            </h3>
                            <div class="table-header">
                                Kitchen status	</div>
                            
                            <table><tr><td>
                                        <table>
                              
                            <?php $descp=''; foreach ($kits as $order) { 
                            
                                $sql="SELECT * FROM  `customer_order` where id = '".$order['customer_order_id']."' ";
                                  $command = Yii::app()->db->createCommand($sql);
                            $time= $command->queryRow();
                                $time=$time['delivery_time'];
                                
                               $sql= "SELECT * FROM  `0_sales_order_details` where id = '".$order['sale_detail_id']."'  ";
                                 $command = Yii::app()->db->createCommand($sql);
                            $remarks= $command->queryRow();
                            
                              $rem=  $remarks['remarks'];
                            if($descp!=$order['desp'])
                            {
                           $sql="select * from 0_item_codes where  item_code='".$order['item']."' and stock_id ='".$order['item']."' ";
                             $command = Yii::app()->db->createCommand($sql);
                            $urdu_name= $command->queryRow();
                            $despp=  explode('_', $order['desp']);
                            
                                echo '<tr><td colspan=2><h3>'.$despp[0].'</h3></td><td></td></tr>';
                                
                                echo '<tr><td><h5>Order No</h5></td> <td><h5>Quanity</h5></td> </tr>';
                            
                            
                            }
                               //echo '<h5>'.$order['order_no'].'Quantity'.$order['quantity'].'</h5>'; 
                                echo '<tr><td><h5>'.$order['id'].'</h5></td> <td><h5>'.$order['qty'].'</h5></td><td>'.date("g:i a", strtotime($time)).'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;'.$rem.'</td></tr>'; 
                            
                            ?>
                          <?php $descp=$order['desp'];   } ?>
                            </table>
                                        
                                    </td>
                                    <td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>    
                                    <td><table>
                              
                            <?php $descp=''; foreach ($kits as $order) { 
                            
                            if($descp!=$order['desp'])
                            {
                                
                                   $sql="SELECT * FROM  `customer_order` where id = '".$order['customer_order_id']."' ";
                                  // echo $sql;
                                  $command = Yii::app()->db->createCommand($sql);
                            $time= $command->queryRow();
                                $time=$time['delivery_time'];
                                
                               $sql= "SELECT * FROM  `0_sales_order_details` where id = '".$order['sale_detail_id']."'  ";
                                 $command = Yii::app()->db->createCommand($sql);
                            $remarks= $command->queryRow();
                            
                              $rem=  $remarks['remarks'];
                              
                              
                       $sql="select * from 0_item_codes,kits where  item_code!='".$order['item']."' and stock_id ='".$order['item']."' and item_code=code";
                      // echo $sql;
                             $command = Yii::app()->db->createCommand($sql);
                            $urdu_name= $command->queryRow();
                            
                            
                            
                                echo '<tr><td colspan=2><h3> '.$urdu_name["urdu_name"].'</h3></td></tr>';
                                
                                echo '<tr><td><h5>Order No</h5></td> <td><h5>Quanity</h5></td><td></td> </tr>';
                            
                            
                            }
                             $sql="SELECT * FROM  `customer_order` where id = '".$order['customer_order_id']."' ";
                                //   echo $sql;
                              $command = Yii::app()->db->createCommand($sql);
                            $time= $command->queryRow();
                                $time=$time['delivery_time'];
                                
                               $sql= "SELECT * FROM  `0_sales_order_details` where id = '".$order['sale_detail_id']."'  ";
                                 $command = Yii::app()->db->createCommand($sql);
                            $remarks= $command->queryRow();
                            
                              $rem=  $remarks['remarks'];
                              
                               //echo '<h5>'.$order['order_no'].'Quantity'.$order['quantity'].'</h5>'; 
                                echo '<tr><td><h5>'.$order['id'].'</h5></td> <td><h5>'.$order['qty'].'</h5></td><td>'. date("g:i a", strtotime($time)).'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;'.$rem.'</td></tr>'; 
                            
                            ?>
                          <?php $descp=$order['desp'];   } ?>
                            </table></td>
                                </tr></table>
                            
                        </div>

</div>