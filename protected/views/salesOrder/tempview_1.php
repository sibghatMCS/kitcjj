<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$oder_det="select * from `temp_customer_order` where id =".$id;
$oder_det= Yii::app()->db->createCommand($oder_det);
$oder_det= $oder_det->queryRow();
?>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
  #itemtable  input[type="text"]
    {
        width:70px;
    }
    
    
    .hideit { display: none}
    
    
    input[type=checkbox] {
opacity: 1;

    }
</style>


<div class="row-fluid" id="tryingdata">
   
    <form id="frm11"  action="index.php?r=SalesOrder/vieworder" method="POST">
    <table class="table table-bordered" >
            <tr><td><label>Delivery Address:</label></td>
                <td><textarea readonly name="develry_address" required id="develry_address" ><?php echo $oder_det['delivery_address']?></textarea></td>
               
                
                
                <td><label>Delivery Date:</label></td>
                <td><input type="text" readonly required name="develry_date" id="dpd1" value="<?php echo date('m/d/Y',  strtotime($oder_det['delivery_date']))?>" ></td>
            
            </tr>
            
             <tr><td><label>Event:</label></td>
                <td><input type="text" readonly name="event" id="event" value="<?php echo $oder_det['event']?>" ></td>
            <td><label>Delivery Time:</label></td>
                <td><input type="text" readonly required name="develry_time" id="timepicker1" value="<?php echo $oder_det['delivery_time']?>" ></td>
            
             </tr></table>
       

    <?php 

    $sql="SELECT * FROM  `kits` ";
    
    
        $command = Yii::app()->db->createCommand($sql);
$items= $command->queryAll();
        
     $sql=" SELECT * FROM  `0_debtors_master` where debtor_no = '".$oder_det['customer_id']."' ";
               $command = Yii::app()->db->createCommand($sql);
                                $cusname= $command->queryRow();
    ?>
        
     
        <table>
            
            <tr><td>Customer:</td><td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td>
<input type="hidden" name="customer" id="custmerid"  value="<?php echo $oder_det['customer_id']?>" />
<input type="text" readonly name="customername" id="custmername" value="<?php echo $cusname['name'];?>" style="width:300px" />
                </td>
            <td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
                <td>Booking Type:</td>
                <td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
                <td>
                   
                    <select name="booking_type" readonly id="booking_type" onchange="guesttr(this.value)">
                        <option value="0">PER KG</option>
                        <option value="1">Guest</option>
                    </select>
                </td>
            
            </tr>

            
<tr id="guest_tr" <?php if($oder_det['kg'] == 0) echo 'style="display:none"'; ?>>
    <td>Guest:</td><td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td>
                   
<input readonly type="text" name="guest" id="guest" value="<?php echo $oder_det['guest']; ?>" style="width:300px" />
                </td>
            
<td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
<td>Rate PER Guest:</td><td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td>
                   
    <input readonly type="text" name="rate" id="guest_rate" value="<?php echo $oder_det['rate']; ?>" style="width:100px" onkeyup="getingtotal()"/>
                </td>
                
                <td>Amount:</td><td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td>
                   
    <input readonly type="text" name="total_amount" id="total_amount" value="<?php echo $oder_det['guest']*$oder_det['rate']; ?>" style="width:100px" />
                </td>
                
                

</tr>

        </table>

        
<table class="table table-bordered" id="itemtable" width="100%">
    <tr>
        <th>Item</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Deigh</th>
        <th>Amount</th>
        <th>Total</th>
        
        
    
    
    </tr>

    
    <?php 
$oder_detail="select * from `temp_customer_order_detail` where `temp_customer_order_id` =".$id;
$oder_detail= Yii::app()->db->createCommand($oder_detail);
$oder_detail= $oder_detail->queryAll();

    foreach($oder_detail as $detials){
    ?>
    <tr id="lists">
        <td><input type="text" readonly name="item" id="item" value="<?php echo $detials['item']?>"/></td>
        <td><input type="text" readonly name="time_code" id="time_code" value="<?php echo $detials['desp']?>"/></td>
   <td><input type="text"  readonly name="quantity" id="quantity" value="<?php echo $detials['qty']?>"/></td>
     <td>
         <?php  if($detials['main_order'] == 1) {?>
         <input type="text" readonly name="deigh" id="deigh" value="<?php echo $detials['daigh'] ?>"/>
         <?php } ?>
     </td>
              <td><?php echo $detials['amount']?></td>

        <td><?php echo $detials['total']?></td>
      
                </tr>
            <?php } ?>
                
          
      
        
       
      
       

    <tr>
        <td></td>
        <td></td>
        <td></td>

        <td></td>
        
        <td></td>
    <td><lable id="item_total"><?php echo $oder_det['itemcost']?></lable></td></tr>
    
</table>
        <table class="table table-bordered">
          
             <tr>
            <td><label>Type:</label></td>
                <td>
                    <select readonly required name="lunch_dinner">
<option value="Lunch" <?php if($oder_det['lunch_dinner'] == 'Lunch') echo 'selected=selected'?>>Lunch</option>
<option value="dinner" <?php if($oder_det['lunch_dinner'] == 'dinner') echo 'selected=selected'?>>Dinner</option>
                    </select>
                    
                    
                </td>
                      <td><label>Comments:</label></td>
                <td><textarea readonly name="comments"><?php echo $oder_det['comments']?> </textarea></td>
                
            </tr>
            <tr>
                <td><label>Service Charges:(RS)</label></td>
                <td><input type="text" readonly name="service_charges"  id="service_chrg" value="<?php echo $oder_det['service_charges']?>" onkeyup="mytwoinone(this)"></td>
                
                <td><label>Discount:(RS)</label></td>
                <td><input type="text" readonly name="discount" id="discount" value="<?php echo $oder_det['discount']?>" onkeyup="mytwoinone(this)" ></td>
                
            </tr>
            
            <tr><td><label>Packing Charges:(RS)</label></td>
                <td><input type="text" readonly name="packing_charges" id="packing_chrg" onkeyup="mytwoinone(this)" value="<?php echo $oder_det['packing_charges']?>"></td>
            
                
            <td><label>Advance:(RS)</label></td>
                <td><input type="text" readonly name="advance" id="advance" value="<?php echo $oder_det['advance']?>" onkeyup="mytwoinone(this)" ></td>
            </tr>
            
            
            <tr><td><label>BBQ Charges:(RS)</label></td>
                <td><input type="text" readonly name="bbq_charges" id="bbq_chrg" onkeyup="mytwoinone(this)" value="<?php echo $oder_det['bbq_charges']?>"></td>
           
                
               <td><label>Total:(RS)</label></td>
                <td><input type="text" readonly name="total" required id="total" value="<?php echo $oder_det['total']?>" ></td>
                
                
            </tr>
           
          
            <tr>
                 <td><label>Fare Charges:(RS)</label></td>
                <td><input type="text" readonly name="fare_charges" id="fare_chrg" value="<?php echo $oder_det['fare_charges']?>" onkeyup="mytwoinone(this)" ></td>
                
                
                <td><label>Net Balance:(RS)</label></td>
                
                
                <?php 
                        
                
                ?>
                <td><input type="text" name="nettotal" readonly id="netbalance" value="<?php $sum = $oder_det['discount']+$oder_det['advance'];
                                                                                                  echo $oder_det['total']-$sum  ?>" ></td>
                    
            <input type="hidden" name="itemcost" id="itemcost" value="0" />
            </tr>
            <tr>
               <td><label>Total In Words:</label></td>
                <td colspan="3">
<input style="width : 500px;" type="text" id="amt_words" readonly name="amt_words" required value="<?php echo $oder_det['amt_word']?>" ></td>
                
            
            </tr>
            
        </table>
       
</form>
</div>
