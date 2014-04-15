
<h1>Assign Degh and Cook </h1>
<form action="" method="POST">
    <input type="hidden" name="orderid" value="<?php echo $_GET['id'] ?>" />
    <table>
        <tr><td> Degh </td><td><select multiple name="degh[]">
                    <?php  $deghs=Degh::model()->findAllByattributes(array('status'=>0,'del_status'=>0)); 
                    
                    
                    
   foreach ($deghs as $degh )
   {
                    ?>
                    <option value="<?php echo $degh->id ?>" ><?php echo $degh->code ?></option>                
   <?php } ?>
                </select></td></tr>
        
        
        <tr><td>Cook</td>
            <td>  <?php   $sql= "select distinct c.* from cook c , cook_work cw where c.id=cw.cook_id and  c.id not in (select cook_id from cook_work where order_id = '".$_GET['id']."' )";
                  //echo   $sql; 
                   $command = Yii::app()->db->createCommand($sql);
$cooks= $command->queryAll();
                  ?>
                <select multiple name="cook[]">
                    
                    <?php  //$cooks=Cook::model()->findAll(); 
                    
                
                    foreach($cooks as $cook)
                    {
                    ?>
                    <option value="<?php echo $cook['id'] ?>" ><?php echo $cook['firstname'].' ' .$cook['lastname'] ?></option>
                    <?php } ?>
                    
                </select>
                
                
            </td>
        
        </tr>
        <tr><td colspan="2"><input type="submit" value="Submit" class='btn btn-success'/></td></tr>
    </table>    
    
</form>