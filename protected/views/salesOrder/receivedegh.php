<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    input[type="checkbox"] {
    opacity: 1;
    position: static;
    }
</style>
<h1>Assign Degh and Cook </h1>
<form action="" method="POST">
    
    <input type="hidden" name="orderid" value="<?php echo $_GET['id'] ?>" />
    <table>
        <tr><td> Degh </td><td>
                    <?php   
                    $order_id=$_GET['id'];
                    
                    $sql="select ad.*, d.code from assign_degh ad, degh d where order_id = $order_id and ad.status=1 and ad.degh_id=d.id ";
                          $command = Yii::app()->db->createCommand($sql);
$deghs= $command->queryAll();
                    
                    
                    //$deghs=Degh::model()->findAllByattributes(array('order_id'=>$order_id,'status'=>1)); 
                    
   foreach ($deghs as $degh )
   {
                    ?>
                
                <input type="checkbox" name="deghs[]" class="chkboxclass" value=" <?php echo $degh['id'] ?>" /> <?php echo $degh['code'] ?> <br/>
                   
   <?php } ?>
                </td></tr>
        
        
       
        <tr><td colspan="2"><input type="submit" value="Submit" class="btn btn-success"/></td></tr>
    </table>    
    
</form>