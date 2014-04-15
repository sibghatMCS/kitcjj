<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>Assign Degh and Cook </h1>
<form>
    
    <table>
        <tr><td> Degh </td><td><select multiple name="degh">
                    <?php   $deghs=Degh::model()->findAll(); 
                    
   foreach ($deghs as $degh )
   {
                    ?>
                    <option value="<?php echo $degh->id ?>" ><?php echo $degh->code ?></option>                
   <?php } ?>
                </select></td></tr>
        
        
        <tr><td>Cook</td>
            <td>
                <select multiple name="cook">
                    
                    <?php  $cooks=Cook::model()->findAll(); 
                    
                    foreach($cooks as $cook)
                    {
                    ?>
                    <option value="<?php echo $cook->id ?>" ><?php echo $cook->firstname.' ' .$cook->lastname ?></option>
                    <?php } ?>
                    
                </select>
                
                
            </td>
        
        </tr>
           <tr><td colspan="2"><input type="submit" class="btn btn-small btn-success" value="Submit" /></td></tr>
    </table>    
    
</form>