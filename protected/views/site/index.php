<h1><?php //echo $this->id . '/' . $this->action->id; ?></h1>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
    <script type="text/javascript" src="css/bootstrap-select.js"></script>
  <script type="text/javascript">
        $(window).on('load', function () {

            $('.selectpicker').selectpicker({
                'selectedText': 'cat'
            });

            // $('.selectpicker').selectpicker('hide');
        });
    </script>
    
<div id="demoLightbox" class="lightbox fade"  tabindex="-1" role="dialog" aria-hidden="true">
	<div class='lightbox-content'>
		<img height="0" style="display: none" src="assets\img\glyphicons-halflings.png" alt="jashd kjashd">
                <span><b><u>Order Items</u></b></span>	<div style="height:66%" id="recipedata" class="lightbox-caption"></div>
	</div>
</div>
<div class="clearfix"></div>
  <div class="row-fluid">
      
      
      <h2>Dishes </h2>
      <h4></h4>
      <?php
      if(isset($_GET['frm']))
      {
       echo '  <h4 class="alert alert-danger">No record in this date</h4>';   
      }
      
      $sql="select * from kits_cate ";
        $command = Yii::app()->db->createCommand($sql);
                $kits= $command->queryAll();
                
                
                ?>
      <script>
         
    function checkit()
    {
      //  alert('Select an Item')
   var   select = document.getElementById('sele'); // or in jQuery use: select = this;
  
    

if (select.value) {
  // value is set to a valid option, so submit form
  return true;
}
alert('Select an Item')
return false;

    }
          </script>
          
          <form action="" method="get" onsubmit="return checkit()">
          <label>Date</label>
          <input type="sdate" placeholder="Start Date" name="sdate" value="" id="dpd1" required class="" />
            <input type="sdate" placeholder="End Date"  name="edate" value="" id="dpd2" required class="" />
            <br>
          <br>
          
          <input type="hidden" name="r" value="SalesOrder/screen" />
          <select id="sele"  name="item[]" class="selectpicker" multiple title='Choose  Items'>
     <?php          foreach ($kits as $kit) { ?>
                              
          <option value="<?php echo $kit['id'] ?>"><?php echo $kit['name'] ?></option>
     
      
     <?php } ?>
  </select>
          <br/>
          <input type="submit" name="submit" class="btn" value="show" />
           </form>
      
                            <h3 class="header smaller lighter blue">Todays Order</h3>
                            
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
                                
                                $sql="SELECT * FROM  `cook_work` cw,cook c where order_id ='". $order['order_no']."' and cw.cook_id=c.id ";
                                
                                $command = Yii::app()->db->createCommand($sql);
                                $cooks= $command->queryAll();
                                
                                
                                
                                 $sql="SELECT * FROM  `assign_degh` ad,degh d where ad.order_id ='". $order['order_no']."' and ad.degh_id=d.id ";
                                
                                $command = Yii::app()->db->createCommand($sql);
                                $deghs= $command->queryAll();
                                
                                
                                
                                 $sql="SELECT * FROM  `assign_degh` ad,degh d where ad.order_id ='". $order['order_no']."' and ad.degh_id=d.id  and ad.status=0";
                                
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
                                                echo $cook['firstname'].''.$cook['lastname'].','; 
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
                                                  
<a href="index.php?r=SalesOrder/Assigndegh&id=<?php echo $order['order_no'] ?>" class='btn btn-mini btn-primary'><i class='icon-fullscreen'></i>Assign Asset</a>
<?php if((count($deghs_received)!=count($deghs) && count($deghs)>0 )){ ?>
<a href="index.php?r=SalesOrder/Receivedegh&id=<?php echo $order['order_no'] ?>" class='btn btn-mini btn-success'><i class='icon-fullscreen'></i>Receive Degh</a>
<?php } ?>
      <a onclick="fancy(<?php echo $order['order_no'] ?>)" class='btn btn-mini btn-success' href="#" >show Recipe</a>                        
                                                  
                                                    
                                                </div>
                                             </td>
                                        </tr>	
                                        
                            <?php } ?>
                                       
                                        
                                    </tbody>
                                </table>
                            
                        </div>
<br/>
<div class="clear"></div>
<div class="row-fluid span-12">
                  
                     <div> 
                         
                          
                         <table id="table_report" class="table table-striped table-bordered table-hover span5">
     
                             <tbody><tr><td><h3 class=" header smaller lighter blue">  </h3></td></tr>
       
 
 
                                                    
                                                    
                                                    
                                 
 </tbody></table></div>
                  
                  
                  
                     
      <div class="span6">
                        <table id="table_report" class="table table-striped table-bordered table-hover ">
                     
 
 <tbody><tr><td >   <h3 class="header smaller lighter blue"> Out of Stock </h3></td></tr>
     
     <?php $sql="SELECT stock_id, SUM(sm.qty) as qty FROM  `0_stock_moves` sm GROUP BY stock_id"; 
      $command = Yii::app()->db->createCommand($sql);
        $Stock= $command->queryAll();
        
        foreach ($Stock as $Stock_item) {
            $qty=$Stock_item['qty'];
            $t_id=$Stock_item['stock_id'];

        $sql=" select count(*) from 0_loc_stock where $qty <= reorder_level and stock_id ='$t_id' ";
        
      $command = Yii::app()->db->createCommand($sql);
        $out= $command->queryRow();
        
        $sql="SELECT * FROM  `0_stock_master`  where stock_id ='$t_id' ";
      
        $command = Yii::app()->db->createCommand($sql);
        $item= $command->queryRow();
        
        if($out['count(*)'] >=1)
        {
     $uint=$item['units'];
     if($uint=='ea.')
         $uint="Itam";
    
         
     ?>
     
     
     <tr><td><?php echo $item['description'].' has only '.$qty.' '.$uint.  ' On hand' ?></td></tr>
     
        <?php } } ?>                                                  
                                                    
                                                    
                                                       
                                                    
                                                    
                                                    
                                 
 </tbody></table>
      </div>
             
              
              </div>
