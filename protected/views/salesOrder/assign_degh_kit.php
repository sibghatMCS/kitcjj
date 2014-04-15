<h1>Assign Degh and Cook </h1>
<div style="float: right">
    <a href="index.php?r=SalesOrder" ><input type="button" value="DONE" class="btn btn-large"/></a>
</div>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$order= $_GET['id'];
//$qsl="select * from 0_sales_order_details where unit_price !=0 and order_no = $order";

$qsl="select * from customer_order_detail,0_sales_order_details  where main_order=1 and 0_sales_order_details.order_no = $order and 0_sales_order_details.id=customer_order_detail.sale_detail_id";


    $command = Yii::app()->db->createCommand($qsl);
     $kits= $command->queryAll();
     //print_r($kits);
     
     foreach ($kits as $kit) { 
         echo '<h3>'.$kit["description"].'</h3>';
         
              $sql="SELECT * FROM  `assign_degh` ad,degh d where ad.order_id ='$order' and ad.kit_no='".$kit['id']."' and ad.degh_id=d.id ";
                                
                                $command = Yii::app()->db->createCommand($sql);
                                $deghs_= $command->queryAll();
                                
                                  $sql="SELECT * FROM  `cook_work` cw,employees c where order_id ='$order' and cw.cook_id=c.id and kit='".$kit['id']."' and c.status=1 ";
                                
                                $command = Yii::app()->db->createCommand($sql);
                                $cooks11= $command->queryAll();
                                
                                
                                
                                
         ?>
    


<form action="" method="POST">
    <input type="hidden" name="orderid" value="<?php echo $_GET['id'] ?>" />
    <input type="hidden" name="kitid" value="<?php echo $kit['id'] ?>" />
    <table>
        <tr><td> Degh </td><td><select multiple name="degh[]">
                    <?php  $deghs=Degh::model()->findAllByattributes(array('status'=>0,'del_status'=>0)); 
                    
                    
                    
   foreach ($deghs as $degh )
   {
                    ?>
                    <option value="<?php echo $degh->id ?>" ><?php echo $degh->code ?></option>                
   <?php } ?>
                </select></td>
        
                <td> <div style="border: solid 1px; width: 220px; height: 77px">
                    <?php $i=0; foreach ($deghs_ as $degha) {
                                                
                                                if($i==3)
                                                {echo '<br/>';
                                                
                                                $i=0;
                                                }
                                                echo $degha['code'].',';
                                                
                                                $i++;
                                
                            } ?>
                               
                    </div></td>
        </tr>
        
        
        <tr><td>Cook</td>
            <td>  <?php
            
            $sql= "select distinct c.* from employees c , cook_work cw where   c.id not in (select cook_id from cook_work where order_id = '".$order."' and kit='".$kit['id']."'  ) and c.cat_id=2  and c.status=1 ";
            //      echo   $sql; 
                   $command = Yii::app()->db->createCommand($sql);
$cooks= $command->queryAll();
                  ?>
                <select multiple name="cook[]">
                    
                    <?php  //$cooks=Cook::model()->findAll(); 
                    
                
                    foreach($cooks as $cook)
                    {
                    ?>
                    <option value="<?php echo $cook['id'] ?>" ><?php echo $cook['name'] ?></option>
                    <?php } ?>
                    
                </select>
                
                
            </td>
            <td><div><?php $i=0; foreach ($cooks11 as $coo) {
                                 if($i==2)
                                                {echo '<br/>';
                                                
                                                $i=0;
                                                }
                                                echo $coo['name']; 
                                                    $i++;
                            } ?></div></td>
        
        </tr>
        <tr><td colspan="2"><input type="submit" value="Submit" class='btn btn-success'/></td></tr>
    </table>    
    
</form>
<?php }
?>
