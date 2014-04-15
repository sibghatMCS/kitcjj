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
<script src="http://code.jquery.com/jquery-1.11.0.js"></script>
<script>
     
       
        function setamountcus(item)
        {
         
            var amt= $('#amount'+item.id).val();
         
            var tam =$('#item_total').html();
         
            var t =0;
             t =parseInt(tam)-parseInt(amt)+parseInt(item.value);//-parseInt(amt);
         
            $('#amount'+item.id).val(item.value);
$('#item_total').html(t);

        }
        
     var delenow =0;
var idddd='';     
     function Delete(){
//    var par = $(this).parent().parent(); //tr
//    par.remove();

  $('.item_amount'+this.id).each( function() {
        delenow=delenow+parseInt(this.value);
      }) ;
    var par = $('.btnDelete'+this.id); //tr
    par.remove();
    
       if(idddd!=this.id)
       {
        idddd=this.id
        
    getingtotal();
       }
};





     function delethis(idd)
     {
         
         alert(idd.id);
         
         $('tr .'+idd.id).remove();
         alert(idd.id);
     }
     
     
     
    $( document ).ready(function() {
   $('#restbtn').click();

       // $("#frm").get(0).reset();
      //  alert('askdjasd');
        
       $('.item_amount').keydown( function () {
           alert(this.value);
         });  
       
        
        
        
       $('#cus_branch').hide();
        
        
        <?php if(isset($_GET['cus']))  { 
            
           $sql=" SELECT * FROM  `0_debtors_master` where debtor_no = '".$_GET['cus']."' ";
               $command = Yii::app()->db->createCommand($sql);
                                $cusname= $command->queryRow();
                                
            
            ?>
                
                setcustomer(<?php echo $_GET['cus'] ?>,'<?php echo $cusname['name'] ?>','<?php echo $cusname['address'] ?>');
             //  setcustomer(<?php echo $_GET['cus'] ?>,'<?php echo $cusname['name'] ?>');
        <?php } ?>
                
            
        
        
        <?php if(isset($_GET['add'])) { ?>
            
            
            setcustomer(<?php echo $_GET['add'] ?>);
            
      <?php   } ?>
        
        $('#item').keyup(function() {
           // alert(this.value);
              $.ajax({
            
			   type: "POST",
			   url: "index.php?r=SalesOrder/Getitems&str="+this.value,
success: function(data){
    //alert(data);
       
 document.getElementById("time_code").innerHTML = data;
			   }
			 });
                         
        });
        
      
          $('#add').click(function() {
           // alert(this.value);
           var item=$('#time_code').val();
           var quantity=$('#quantity').val();
      //     alert(quantity); 
        if(!$.isNumeric(quantity))
        {
            alert('Set qunatity in numeric ');
            return;
        }
            
      //  return;
           var daig=$('#deigh').val();
           var remarks=$('#remarks').val();
           //alert(item);
              $.ajax({
            
			
                           type: "POST",
   // url: "customerfilter.php",
    dataType: 'json',
    cache: false,
			   url: "index.php?r=SalesOrder/get_item_kit&str="+item+"&qty="+quantity+"&daig="+daig+"&remarks="+remarks,
success: function(data){
    //alert(data.message2);
    //alert($('#item_total').html());
    $('#item_total').html(parseInt($('#item_total').html())+parseInt(data.message2));
 $('#lists').before(data.message1);
 $("#itemcost").val(parseInt($('#item_total').html()));
 
 getingtotal();
 //document.getElementById("time_code").innerHTML = data.message2;
 
 $(".btnDelete").bind("click", Delete);
 
 
			   }
			 });
                         
        });
        
        
        
    });
    
    
    
    function customer(val) {
        
    if(val.length>2)
        {
    
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    
    document.getElementById("custommers").innerHTML=xmlhttp.responseText
    
    }
  }
xmlhttp.open("GET","index.php?r=SalesOrder/findcustommer&val="+val,true);
xmlhttp.send();
        }
                         
    }        
    
 
 
 
    function setcustomer(id,name,add)
    {
//alert(name)

document.getElementById('custmername').value =name;
    document.getElementById('custmerid').value =id;
    document.getElementById('develry_address').value =add;
    
       document.getElementById("custommers").innerHTML='';
    }
    
    
    function showsearch()
    {
        if( $( "#newtb" ).hasClass( 'hide' ))
            {
        $( "#serchtb" ).addClass( 'hide' );
           $( "#newtb" ).removeClass( 'hide' );
           
           $('#togal').val("Search Customer");
           
           
            } else
                {
        $( "#serchtb" ).removeClass( 'hide' );
           $( "#newtb" ).addClass( 'hide' );
           
           $('#togal').val("Addnew Customer");
                }
    }
    
    
    var gst_type=0;
    function guesttr(val){
        
        //alert('as');
        if(val == 1){
           // alert('morein');
            $('#guest_tr').show();
            gst_type=1;
          
       }
       
       else{
             $('#guest_tr').hide();
             gst_type=0;
            
       }
       getingtotal();
    }
    
    
    function getingtotal(){
       // var a = $(this).attr("value");
        //alert('asd');
      // alert($(this).attr("value"));
       // if(!$.isNumeric(quantity))
        //{
       // }
        
        if(gst_type==1)
             {
        
        var no_guest = document.getElementById('guest').value;
        var guest_rate = document.getElementById('guest_rate').value;
        
        
        
        var per_head_rate_chk = parseInt(no_guest) * parseInt(guest_rate);
        $('#total_amount').val(per_head_rate_chk);
             }
             else
                 {
                     
                   var per_head_rate_chk=  $('#item_total').html();
                    per_head_rate_chk=per_head_rate_chk-delenow;
                    $('#item_total').html(per_head_rate_chk);
                 }
        
        var advance_chk = document.getElementById('advance').value;
        var discount_chk = document.getElementById('discount').value;
        
        var packing_chrg_chk = document.getElementById('packing_chrg').value;
        var service_chrg_chk = document.getElementById('service_chrg').value;
        var bbq_chrg_chk = document.getElementById('bbq_chrg').value;
        var fare_chrg_chk = document.getElementById('fare_chrg').value;
        
        var advance =0;
        var discount=0;
        var packing_chrg = 0;
        var service_chrg = 0;
        var fare_chrg =0;
        var bbq_chrg = 0;
        var per_head_rate = 0;
        var total = 0;
        var sub_total = 0;  
        
        
if(advance_chk != ''){ advance = advance_chk; 

}  
      
 if(discount_chk != ''){ discount = discount_chk; }
      
if(packing_chrg_chk != ''){ packing_chrg = packing_chrg_chk;}     

if(service_chrg_chk != ''){ service_chrg = service_chrg_chk; }     
        
if(bbq_chrg_chk != ''){ bbq_chrg = bbq_chrg_chk; }  
        
if(fare_chrg_chk != ''){ fare_chrg = fare_chrg_chk; } 

if(!isNaN(per_head_rate_chk)){ per_head_rate = per_head_rate_chk; }
        
        
var total_amt = parseInt(packing_chrg)+parseInt(service_chrg)+parseInt(bbq_chrg)+parseInt(fare_chrg)+parseInt(per_head_rate);
     //alert(total_amt)
var sub_total =       parseInt(total_amt)-parseInt(advance)-parseInt(discount);
//alert(sub_total);

if(total_amt != ''){ total = total_amt; }
if(sub_total != ''){ sub_total = sub_total; }


        document.getElementById('netbalance').value = sub_total;
        document.getElementById('total').value = total_amt; 
        
        numinwrd();
    }
    
    
    function lessitem(id)
    {
       // alert(id)
        if(($("#"+id).is(':checked')))
        {
        
        var res = id.split("_");
        var aomt= $('#amount_'+res[1]).val();
        
        
            $('#item_total').html(parseInt($('#item_total').html())-parseInt(aomt));
        }
        else
            {
                 var res = id.split("_");
        var aomt= $('#amount_'+res[1]).val();
        
        
            $('#item_total').html(parseInt($('#item_total').html())+parseInt(aomt));
                
            }
 $("#itemcost").val(parseInt($('#item_total').html()));
  getingtotal();
 
    }
    
   
</script>

<link rel="stylesheet" href="assets/js/timepicker.css" />

<div class="row-fluid">
    <table style="min-height:200px">
        <tr><td colspan="2" > <a href="javascript:" onclick="showsearch()" >
                    <input class="btn btn-info" id="togal" type="button" value="Addnew" /></a></td></tr>
        <tr><td  style="width: 360px; vertical-align: top;">
                
                
                <table id="serchtb" class="tablestyle2"><tr><td>Search Customer: </td></tr>
                    <tr><td ><input type="text" onkeyup="customer(this.value)" placeholder="type 3 later for searching" name="search"/></td></tr>
    <tr><td id="custommers"></td></tr>
    
    
</table></td>
        
<td>
    <form id="frm" action="index.php?r=SalesOrder/Createcustomer" method="POST">
 
    <table  id="newtb" class=" hide tablestyle2 table table-stripe table-bordered " ><tr><td>Create New Customer</td></tr>
        <tr><td>Name:</td><td><input type="text" required name="cus_name" /></td>     </tr>
        <tr><td>Phone:</td><td><input type="text" required name="cus_phone" /></td>     </tr>
        <tr><td>Address:</td><td><input type="text" required name="cus_address" /></td>     </tr>
        <tr><td>Email:</td><td><input type="text" required name="cus_email" /></td>     </tr>
        <tr><td colspan="2" style="text-align: right"><input  type="submit" class="btn btn-success" value="Add customer" name="submit" /></td>     </tr>
    
    </table></form></td>
     </tr></table>
         <form id="frm11"  action="" method="POST">
        <table class="table table-bordered" >
            <tr><td><label>Delivery Address:</label></td>
                <td><textarea name="develry_address" required id="develry_address" ></textarea></td>
               
                
                
                <td><label>Delivery Date:</label></td>
                <td><input type="text" required name="develry_date" id="dpd1" value="" ></td>
            
            </tr>
            
             <tr><td><label>Event:</label></td>
                <td><input type="text" name="event" id="event" value="" ></td>
            <td><label>Delivery Time:</label></td>
                <td><input type="text" required name="develry_time" id="timepicker1"  ></td>
            
             </tr></table>
       

    <?php 

    $sql="SELECT * FROM  `kits` ";
    
    
        $command = Yii::app()->db->createCommand($sql);
$items= $command->queryAll();
        
    
    ?>
   
        <button style="display:none" id="restbtn" type="reset">Reset</button>
        <table>
            
            <tr><td>Customer:</td><td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td>
                    <input type="hidden" name="customer" id="custmerid"  value="" />
<input type="text" readonly name="customername" id="custmername" value="" style="width:300px" />
                </td>
            <td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
                <td>Booking Type:</td>
                <td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
                <td>
                   
                    <select name="booking_type" id="booking_type" onchange="guesttr(this.value)">
                        <option value="0">PER KG</option>
                        <option value="1">Guest</option>
                    </select>
                </td>
            
            </tr>

            
<tr id="guest_tr" style="display:none">
    <td>Guest:</td><td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td>
                   
<input type="text" name="guest" id="guest" value="" style="width:300px" />
                </td>
            
<td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
<td>Rate PER Guest:</td><td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td>
                   
    <input type="text" name="rate" id="guest_rate" value="" style="width:100px" onkeyup="getingtotal()"/>
                </td>
                
                <td>Amount:</td><td>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td>
                   
    <input type="text" name="total_amount" id="total_amount" value="" style="width:100px" />
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
        <th>Remarks</th>
        <th>Add</th>
        
    
    
    </tr>

    <tr id="lists">
        <td><input type="text" name="item" id="item" /></td>
    <td><select name="time_code" id="time_code">
            <?php                foreach ($items as $item) { ?>
                
            <option value="<?php echo $item['code'] ?>" > <?php echo $item['description'] ?> </option>
            <?php } ?>
        </select>
        <td><input type="text"  name="quantity" id="quantity" /></td>
        <td><input type="text" name="deigh" value="0" id="deigh" /></td>
        <td></td>

        <td></td>
        <td><input type="text" name="remarks" id="remarks" /></td>
        <td><input type="button" name="Add" id="add" class="btn btn-success btn-small" value="ADD" /></td>
    </tr>
    <tr></td>
    <td>
        <td></td>
        <td></td>
        <td></td>

        <td></td>
        <td><lable id="item_total">0</lable></td>
        <td></td></tr>
    
</table>
        <table class="table table-bordered">
          
             <tr>
            <td><label>Type:</label></td>
                <td>
                    <select required name="lunch_dinner">
                        <option value="Lunch">Lunch</option>
                        <option value="dinner">Dinner</option>
                    </select>
                    
                    
                </td>
                      <td><label>Comments:</label></td>
                <td><textarea name="comments"> </textarea></td>
                
            </tr>
            <tr>
                <td><label>Service Charges:(RS)</label></td>
                <td><input type="text" name="service_charges"  id="service_chrg" value="" onkeyup="mytwoinone(this)"></td>
                
                <td><label>Discount:(RS)</label></td>
                <td><input type="text" name="discount" id="discount" value="" onkeyup="mytwoinone(this)" ></td>
                
            </tr>
            
            <tr><td><label>Packing Charges:(RS)</label></td>
                <td><input type="text" name="packing_charges" id="packing_chrg" onkeyup="mytwoinone(this)" ></td>
            
                
            <td><label>Advance:(RS)</label></td>
                <td><input type="text" name="advance" id="advance" value="" onkeyup="mytwoinone(this)" ></td>
            </tr>
            
            
            <tr><td><label>BBQ Charges:(RS)</label></td>
                <td><input type="text" name="bbq_charges" id="bbq_chrg" onkeyup="mytwoinone(this)" ></td>
           
                
               <td><label>Total:(RS)</label></td>
                <td><input type="text" name="total" required id="total" value="" ></td>
                
                
            </tr>
           
          
            <tr>
                 <td><label>Fare Charges:(RS)</label></td>
                <td><input type="text" name="fare_charges" id="fare_chrg" value="" onkeyup="mytwoinone(this)" ></td>
                
                
                <td><label>Net Balance:(RS)</label></td>
                <td><input type="text" name="nettotal" id="netbalance" value="0" ></td>
            <input type="hidden" name="itemcost" id="itemcost" value="0" />
            </tr>
            <tr>
               <td><label>Total In Words:</label></td>
                <td colspan="3">
                    <input style="width : 500px;" type="text" id="amt_words" name="amt_words" required value="" ></td>
                
            
            </tr>
            
        </table>
        <input type="submit" name="submit" onclick="return checkclient()" class="btn btn-success" value="submit Order" />
        <input type="button" onclick="print('frm11')" class="btn btn-success" value="Priview" />
</form>
</div>
	


 <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
 <script type="text/javascript">
      
                   
     
      $(document).ready(function() {
         //   $('#timepicker1').timepicker();
            
             $('#timepicker1').timepicker();
             
              });
        </script>
        
        
<script type="text/javascript">

//var nume=document.getElementById('num').value;
function mytwoinone(ele)

{
if(isNumeric(ele)) 
getingtotal();
}
       function isNumeric(ele)
      {
    //	var elem= $(this);
      //      alert(elem) return  
          var elem=ele.value;
         if(elem!="") 
          {
            var numericExpression = /^[0-9]+$/;
    	       if(elem.match(numericExpression))
              {
    		      return true;
            	}
             else
             {
    		    alert("Please Enter Only Number ");
    		  ele.value="";
    	 	   return false;
    	     }
        }
        else {
        ele.value=0;
           return true;
       }
    }


function numinwrd()
  {
     var numbr=document.getElementById('total').value;
     var str=new String(numbr)   
     var splt=str.split("");
     var rev=splt.reverse();
     var once=['Zero', ' One', 'Two', 'Three', 'Four',  'Five', 'Six', 'Seven', 'Eight', 'Nine'];
     var twos=['Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen', ' Seventeen', ' Eighteen', ' Nineteen'];
     var tens=[ '', 'Ten', ' Twenty', ' Thirty', ' Forty', ' Fifty', ' Sixty', ' Seventy', ' Eighty', ' Ninety' ];
     numlen=rev.length;
     var word=new Array();
     
      var j=0;   
     for(i=0;i<numlen;i++)
       {
          switch(i)
           {
            case 0:
                  if((rev[i]==0) || (rev[i+1]==1))
                   {
                      word[j]='';                    
                   }
                   else
                   {
                     word[j]=once[rev[i]];
                    }
                   word[j]=word[j] ;
                   
                   break;
            case 1:
                abovetens();  
                   break;
              case 2:
                if(rev[i]==0)
                {
                  word[j]='';
                } 
               else if((rev[i-1]==0) || (rev[i-2]==0) )
                {
                   word[j]=once[rev[i]]+"Hundred ";                
                }
                else 
                {
                    word[j]=once[rev[i]]+"Hundred and";
                } 
               break;
             case 3:
                    if(rev[i]==0 || rev[i+1]==1)
                   {
                      word[j]='';                    
                   } 
                   else
                   {
                     word[j]=once[rev[i]];
                   }
                if((rev[i+1]!=0) || (rev[i] > 0))
                {
	                 word[j]= word[j]+" Thousand";
	              }
                  break;  
             case 4:
                  abovetens(); 
                    break;  
           
              case 5:
                   if((rev[i]==0) || (rev[i+1]==1))
                   {
                      word[j]='';                    
                   } 
                   else
                   {
                     word[j]=once[rev[i]];
                   }
                word[j]=word[j]+"Lakhs";
                  break;  
          
           case 6:
                  abovetens(); 
                    break;
         
          case 7:
                   if((rev[i]==0) || (rev[i+1]==1))
                   {
                      word[j]='';                    
                   } 
                   else
                   {
                     word[j]=once[rev[i]];
                   }
              word[j]= word[j]+"Crore";
                    break;  
          
           case 8:
                  abovetens(); 
                    break;    
                 default:
	               break;
              }
       
          j++;  
       
       }   
  
 function abovetens()
{
     if(rev[i]==0)
        {
            word[j]='';
        } 
    else if(rev[i]==1)
        {
           word[j]=twos[rev[i-1]];
        }
       else
         {
             word[j]=tens[rev[i]];
         }
}

word.reverse();
var finalw='';
for(i=0;i<numlen;i++)
{

  finalw= finalw+word[i];

}
document.getElementById('amt_words').value=finalw;
}
/*
function ctck()
{
     var sds = document.getElementById("dum");
     if(sds == null){
        alert("You are using a free package.\n You are not allowed to remove the tag.\n");
     }
     var sdss = document.getElementById("dumdiv");
     if(sdss == null){
         alert("You are using a free package.\n You are not allowed to remove the tag.\n");
     }
}
document.onload ="ctck()";
*/




function doSubmit() {
var frm = document.getElementById("frm11");
alert(frm.action);
 frm.target="myNewWin";
 frm.action = "index.php?r=SalesOrder/vieworder";
 
window.open("","myNewWin","width=1200,height=985,toolbar=0,scrollbars=yes"); 

        


}

 function checkclient()
    {
        if($('#custmerid').val()=='')
        {    alert('Client must be selected');
        return false;
        }
        else{
           
           var frm = document.getElementById("frm11"); 
           frm.target="_self";
           frm.action = "index.php?r=SalesOrder/Addordersend";
        }
        
    }



</script>  

