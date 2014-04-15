<?php

class SalesOrderController extends Controller
{
    
    public $layout='//layouts/column1';
    
                  public function __construct($id, $module = null) 
{
                parent::__construct($id, $module);
            if(!isset(Yii::app()->session['admin']))
            {
                $this->redirect('index.php?r=site/Login');
               // echo 'inif '; exit;
            }
            
            
        }
        
        public function actionGetitems()
        {
            $str=$_REQUEST['str'];
            
             $sql="SELECT * FROM  `kits` WHERE  `description` LIKE  '$str%' ";
    
    
        $command = Yii::app()->db->createCommand($sql);
$items= $command->queryAll();
        


            
                          foreach ($items as $item) { 
                $item1=$item['code'];
                $desc=$item['description'];
            echo '<option value="'.$item1.'" >'. $desc.'</option>';
             } 
            
        }

        
        
        function actionget_item_kit()
{ 
            $item_code=$_REQUEST['str'];
            $qty=$_REQUEST['qty'];
    $daig=$_REQUEST['daig'];
$remarks=$_REQUEST['remarks'];
	$sql="SELECT DISTINCT kit.*, item.units, comp.description as comp_name 
		FROM 0_item_codes kit, 0_item_codes comp
		LEFT JOIN 0_stock_master item
		ON 
			item.stock_id=comp.item_code
		WHERE
			kit.stock_id=comp.item_code
			AND kit.item_code='$item_code'";
                      //  AND kit.editable=1

        
        $command = Yii::app()->db->createCommand($sql);
$itemsa= $command->queryAll();
//	echo '<pre>'; print_r( $itemsa);
//        echo '</pre>';
//        exit;
 $row1='';
 $row='';
  $amt=0;
        foreach ($itemsa as $items) {
            
            $qty_tiem=$items['quantity']*$qty;
            if($items['editable']==1)
            {
                $class='showit';
                $ed=1;
            }
            else
            { $class='hideit';
            $ed=0;
            }
           
            $stk_id=$items['stock_id'];
	//$result = db_query($sql,"item kit could not be retrieved");
$sql = "SELECT * FROM  `0_prices` where stock_id ='$stk_id' ";
$command = Yii::app()->db->createCommand($sql);
$price = $command->queryRow();
$price=$price['price'];

$amt+=$qty*$price;


      //  echo $items['item_code'].'_service ======='.$items['stock_id'];
            if($items['item_code'].'_service'==$items['stock_id'])
            {

 $row=   '<tr class="btnDelete'.$items['item_code'].'" ><td>'.$item_code.'</td>
    <td>'.$items['item_code'].'<input type="hidden" name="stock_item[]" value="'.$items['stock_id'].'" />
        <input type="hidden" name="amt_price[]"    value="'.$qty*$price.'" />
        <input type="hidden" name="item_code[]" value="'.$items['item_code'].'" />
        <input type="hidden" name="sub_qty[]" id="sub_qty" value="'.$qty_tiem.'" />
            <input type="hidden" name="editable[]" value="'.$ed.'" /> 
                   <input type="hidden" name="daighs[]" value="'.$daig.'" /> 
            <input type="hidden" name="remak[]" id="rem" value="'.$remarks.'" /></td>
        <td>'.$qty_tiem.'</td>
        <td>'.$daig.'</td>
        <td>'.$price.'</td>

        <td class="item_amount">'.$qty*$price.'</td>
            <td>'.$remarks.'</td>
        <td><a href="javascript:" id="'.$items['item_code'].'" class="btnDelete" > Delete </a><input type="hidden" class="item_amount'.$items['item_code'].'" id="amount_'.$items['stock_id'].'" value="'.$qty*$price.'" /></td></tr>';
    // echo $row;
 
            }
            else
            {
                $row1.=   '<tr class="btnDelete'.$items['item_code'].' '.$class.'"><td></td>
    <td>'.$items['stock_id'].'('.$items["comp_name"].')<input type="hidden" name="stock_item[]" value="'.$items['stock_id'].'" />
             
<input type="hidden" name="item_code[]" value="'.$items['item_code'].'" /> 
    <input type="hidden" name="editable[]" value="'.$ed.'" /> 
        <input type="hidden" name="daighs[]" value="'.$daig.'" /> 
</td>
        <td><input type="text" name="sub_qty[]" id="sub_qty" value="'.$qty_tiem.'" /> 
<input type="hidden" name="remak[]" id="rem" value="'.$remarks.'" />            
</td>
        <td></td>
        <td><td><input type="text"  onblur="setamountcus(this)" class="item_amount" name="amount[]" id="_'.$items['stock_id'].'" value="'.$qty*$price.'" /> </td>

        <td></td>
            
        <td><input type="checkbox" onclick="lessitem(this.id)" value=1 name="byparty['.$items['stock_id'].']" id="byparty_'.$items['stock_id'].'" />
        By Party <input type="hidden" name="amt_price[]"  class="item_amount'.$items['item_code'].'" id="amount_'.$items['stock_id'].'" value="'.$qty*$price.'" />         </td>

</tr>';   
                
            }
            
           
        }
    //    echo $row;
      // echo $row1;
       
       echo json_encode(
      array("message1" => $row.$row1, 
      "message2" => $amt));
}

public function actionDelivery() {
    
     $id=$_GET['id'];
            
            $sql="update customer_order set deliverd=1 where id =  $id ";
              $command = Yii::app()->db->createCommand($sql)->execute(); 
              
               $this->redirect('index.php?r=SalesOrder');
               
    
}

                public function actionClose()
	{
            $id=$_GET['id'];
            
            $sql="update 0_sales_orders set order_status=1 where order_no =  $id ";
              $command = Yii::app()->db->createCommand($sql)->execute(); 
              
               $this->redirect('index.php?r=SalesOrder');
            
        }
        
        
        
   public function actionfindcustommer()
{
    $srt=$_REQUEST['val'];
    $srt= $srt.'%';
    $sql1="SELECT * FROM  `0_crm_persons` WHERE  `ref` LIKE  '$srt' OR `phone` LIKE  '$srt' OR `address` LIKE  '$srt' ";
       $command = Yii::app()->db->createCommand($sql1);
$orderss= $command->queryAll();
            
//echo count($orderss);
//  $query1=  mysql_query($sql1);
  echo '<table class="table table-stripe table-bordered">
      <tr><td></td><td>NAME</td><td>PHONE</td><td>ADDRESS</td></tr>';
  
  if(count($orderss) == 0)echo '<tr><td colspan=4><label class=label-danger>NO RECORDS MATCHING THIS WORDS</label></td></tr>';
  else {
  foreach ($orderss as $orders) {
      
  
        
        $sql="select debtor_no,name from 0_debtors_master where name = '".$orders['ref']."' ";
       
         $command = Yii::app()->db->createCommand($sql);
$id= $command->queryRow();
//print_r($id);
        $id1=$id['debtor_no'];
        $name=$id['name'];
        $add = $orders['address'];


//        
      echo '<tr><td><a href="javascript:" onclick="setcustomer('.$id1.', \' '.$name.' \', \' '.$add.' \' )">Select</a></td><td>'.$orders['ref'].'</td>';
       echo '<td>'.$orders['phone'].'</td>';
       echo '<td>'.$orders['address'].'</td></tr>';
        
  }
    }
    
    
  echo  '<table>';
  
  //echo $daet;
}


 	public function actionAddordersend()
	{
            
            
            
               $data=array();
        
////              $data['customer']=$_POST['customer'];
////         $data['branch']=$branch;
////         $data['amount']=$_POST['advance'];
//   
//               $data['customer']=15;//$_POST['customer'];
//         $data['branch']=32;//$branch;
//         $data['amount']=658;//$_POST['advance'];
//   
//        
//         
//         
//           $this->render('addorderreturn',array('data'=>$data)); 
//           exit;
//                   $data['customer']=$_POST['customer'];
//         $data['branch']=1;
//         $data['amount']=$_POST['advance'];
//         $data['id']=43;
//   $last_rec=43;
//        
//         
//          $sql_order="SELECT * FROM  `customer_order` where id ='$last_rec' ";
//$sql_order = Yii::app()->db->createCommand($sql_order);
//$sql_order= $sql_order->queryRow();
//
//                
//$sql_main="SELECT * FROM  `customer_order_detail` where customer_order_id='$last_rec' and main_order = 1";
//$sql_main = Yii::app()->db->createCommand($sql_main);
//$sql_main= $sql_main->queryAll();
//   $this->render('addorderreturn',array('data'=>$data,'order' =>$sql_order , 'orderdetail'=>$sql_main)); 
//           exit;
         
             
             $sql_id="select max(order_no) from 0_sales_orders";
              $command = Yii::app()->db->createCommand($sql_id);
                $orderid= $command->queryRow();
                $orderid=$orderid['max(order_no)']+1;
                
$sql_id="select branch_code from 0_cust_branch where debtor_no = '".$_POST['customer']."' ";
              $command = Yii::app()->db->createCommand($sql_id);
                $branch= $command->queryRow();
                $branch=$branch['branch_code'];
                
                $sql="SELECT * FROM  `0_debtors_master` where debtor_no = '".$_POST['customer']."' ";
                  $command = Yii::app()->db->createCommand($sql);
                $cus_name= $command->queryRow();
                $cus_name=$cus_name['name'];
                
                  $sql_id="select max(reference) from 0_sales_orders";
              $command = Yii::app()->db->createCommand($sql_id);
                $ordref= $command->queryRow();
                $ref=$ordref['max(reference)']+1;
                
$commernty=$_POST['comments'];
//$cus_name="''";
$deliry_add=$_POST['develry_address'];
$pohone="";

$ship=0;
$payment=3;
$delry_date=date('Y-m-d' ,strtotime($_POST['develry_date']));
             	$sql = "INSERT INTO 0_sales_orders (order_no, type, debtor_no, trans_type, branch_code, 
                    customer_ref, reference, comments, ord_date,
		order_type, ship_via, deliver_to, delivery_address, contact_phone,
		freight_cost, from_stk_loc, delivery_date, payment_terms, total)
		VALUES (" .$orderid . ",0," . $_POST['customer'] .
		 ",  30 ,'" .$branch . "','' ,'". 
			$ref ."','". 
			$commernty ."','" . Date('Y-m-d') . "', 1, 1,'" . 
			$cus_name . "','" .
			$deliry_add . "', '" .
			$pohone . "', '" . 
			$ship ."', 'DEF' , '" .
			$delry_date . "','" .
			$payment . "',0 )" ;
                
                    $command = Yii::app()->db->createCommand($sql)->execute(); 
                ///////////////////////////////// sale order detail entery
                $scocks=$_POST['stock_item'];
                $i=0;
                $remarks='';
                
                
                ////atiq work inserting parent table//
                
                $model_cusorder = new CustomerOrder;
                
                $model_cusorder->customer_id = $_POST['customer'];
                $model_cusorder->booked_by = Yii::app()->session['admin'];
                $model_cusorder->delivery_address = $deliry_add;
                $model_cusorder->delivery_date = $delry_date;
                $model_cusorder->delivery_time = date("H:i:s", strtotime($_POST['develry_time']));
                $model_cusorder->event = $_POST['event'];
                $model_cusorder->lunch_dinner =$_POST['lunch_dinner'];
                $model_cusorder->comments = $commernty;
                $model_cusorder->packing_charges = $_POST['packing_charges'];
                $model_cusorder->service_charges = $_POST['service_charges'];
                $model_cusorder->fare_charges = $_POST['fare_charges'];
                $model_cusorder->bbq_charges = $_POST['bbq_charges'];
                $model_cusorder->advance = $_POST['advance'];
                $model_cusorder->discount = $_POST['discount'];
                $model_cusorder->total = $_POST['total'];
                $model_cusorder->kg = $_POST['booking_type'];
                
                if($_POST['booking_type'] == 1){
                  
                $model_cusorder->guest = $_POST['guest'];
                $model_cusorder->rate = $_POST['rate'];
                                
                $model_cusorder->itemcost=$_POST['total_amount'];
                }
                else{
                $model_cusorder->guest = 0;
                $model_cusorder->rate = 0;
               $model_cusorder->itemcost=$_POST['itemcost'];
                }
                
               $model_cusorder->sale_order= $orderid;
                   $model_cusorder->booking_date= date('Y-m-d');
                $model_cusorder->booking_time= date('H:i:s');
                $model_cusorder->amt_word= $_POST['amt_words'];
                
                
                if (!$model_cusorder->save()) {
			$errors = array();
                        print_r($model_cusorder->getErrors() );
                        exit;
			//foreach ($model_cusorder->getErrors() as $e) $errors = array_merge($errors, $e);
			//$this->sendResponse(500, implode("<br />", $errors));
		} 
                //if($model_cusorder->save())
                //{
                  //  echo $form->errorSummary($model_cusorder);
               // }
                
                $last_rec =  Yii::app()->db->getLastInsertID();
                ///end atiq paten work//
                $kit_id=0;
                foreach ($scocks as $stock) {
                    
                    $qty= $_POST['sub_qty'][$i];
                    $remarks= $_POST['remak'][$i];
                    
                    $item_code_a = $_POST['item_code'][$i];
                    $stock_tem_a = $_POST['stock_item'][$i];
                    $edit = $_POST['editable'][$i];
                    $item_price=$_POST['amt_price'][$i];
                     $digh=$_POST['daighs'][$i];
                    $item_price=$item_price/$qty;
//$by_party_a = $_POST['byparty'][$i];
                    
                    $i++;
                    
                    if(isset($_POST['byparty'][$stock]))
                        $part=1;
                    else {
                            $part=0;
                    }
                    $sql="SELECT * FROM  `0_stock_master` where stock_id ='$stock' ";
                        $command = Yii::app()->db->createCommand($sql);
                $stk_desp= $command->queryRow();
                $desp=$stk_desp['description'];
                $sql="SELECT * FROM  `0_prices` where stock_id='$stock'";
                 $command = Yii::app()->db->createCommand($sql);
                $price= $command->queryRow();
                $price=$price['price'];
                
		$sql = "INSERT INTO 0_sales_order_details (order_no, trans_type, stk_code, description, unit_price, quantity, discount_percent,remarks,party) VALUES (";
		$sql .= $orderid . ",30
				,'".$stock."', '"
				.$desp."', '$item_price',
				'$qty',
				0,'$remarks','$part')";
		 $command = Yii::app()->db->createCommand($sql)->execute(); 
                     $detail_id =  Yii::app()->db->getLastInsertID();
                 
                 $sql = "INSERT INTO 0_audit_trail"
		. " (type, trans_no, user, fiscal_year, gl_date, description, gl_seq)
			VALUES(30, $orderid,1,7,'CURDATE()','', 0)";

	//db_query($sql, "Cannot add audit info");
                 	 $command = Yii::app()->db->createCommand($sql)->execute(); 
	
                         
                         $sql="SELECT max(id) FROM  `0_audit_trail` ";
                          $command = Yii::app()->db->createCommand($sql);
                        $lid= $command->queryRow();
                        $lid=$lid['max(id)'] ;
                        
	// all audit records beside latest one should have gl_seq set to NULL
	// to avoid need for subqueries (not existing in MySQL 3) all over the code
	$sql = "UPDATE 0_audit_trail SET gl_seq = NULL  WHERE type=30 AND trans_no=$orderid AND id!=".$lid;
        
        $command = Yii::app()->db->createCommand($sql)->execute(); 
                
                
         ////atiq work inserting deatil table//
        
  $model_cusorder_del = new CustomerOrderDetail;
                
               $model_cusorder_del->customer_order_id = $last_rec ;
               $model_cusorder_del->item = $stock;
               $model_cusorder_del->desp =$desp ;

                 if($item_code_a.'_service' == $stock_tem_a)
            {
               $model_cusorder_del->main_order = 1;
               $model_cusorder_del->daigh = $digh;
               $model_cusorder_del->qty =$qty;
               $model_cusorder_del->party = 0;
               $model_cusorder_del->amount = $item_price;
               $model_cusorder_del->total = $item_price * $qty;
                   $model_cusorder_del->kit_id=0;
}
            else{
                
               $model_cusorder_del->main_order = 0;
               $model_cusorder_del->daigh = 0;
               $model_cusorder_del->qty =$qty;
               $model_cusorder_del->party = $part;
               $model_cusorder_del->amount = $item_price;
               $model_cusorder_del->total = $item_price * $qty;
               $model_cusorder_del->kit_id=$kit_id;
             
            }
              $model_cusorder_del->sale_detail_id=$detail_id;
              $model_cusorder_del->editable=$edit;
              
              
           // $model_cusorder_del->save();
              if (!$model_cusorder_del->save()) {
			$errors = array();
                        print_r($model_cusorder_del->getErrors() );
                        exit;
			//foreach ($model_cusorder->getErrors() as $e) $errors = array_merge($errors, $e);
			//$this->sendResponse(500, implode("<br />", $errors));
		} 
                
            if( $model_cusorder_del->main_order==1)
                    $kit_id =  Yii::app()->db->getLastInsertID();
       
   }
                ///////////////////////////////////
               
 	//write_customer_payment(0, 13, 30,2, Date('Y-m-d'), 'A12',$_POST['discount'], 0, 'fj ldskjf l ', 0, 0,$_POST['discount'] );

      $data['customer']=$_POST['customer'];
         $data['branch']=$branch;
         $data['amount']=$_POST['advance'];
         $data['id']=$last_rec;
   
        
         
          $sql_order="SELECT * FROM  `customer_order` where id ='$last_rec' ";
$sql_order = Yii::app()->db->createCommand($sql_order);
$sql_order= $sql_order->queryRow();

                
$sql_main="SELECT * FROM  `customer_order_detail` where customer_order_id='$last_rec' and main_order = 1";
$sql_main = Yii::app()->db->createCommand($sql_main);
$sql_main= $sql_main->queryAll();
   $this->render('addorderreturn',array('data'=>$data,'order' =>$sql_order , 'orderdetail'=>$sql_main)); 
           exit;
         
                
        }

        	public function actionAddorder()
	{
                    $this->render('addorder');
                }
                
	public function actionIndex()
	{
               

            $sql="select * from customer_order,0_sales_orders where customer_order.delivery_date = CURDATE() and  0_sales_orders.order_no=customer_order.sale_order and order_status != 1";
            
                     $command = Yii::app()->db->createCommand($sql);
$orders= $command->queryAll();
            
		$this->render('index',array('orders'=>$orders));
	}
        
        public function actionScreen()
	{
          //  print_r($_GET);
           $sdate=$_GET["sdate"];
            $sdate=date('Y-m-d',  strtotime($sdate));
            
            $edate=$_GET["edate"];
            $edate=date('Y-m-d',  strtotime($edate));
            
            
       //     echo $sdate;
         //   exit;
           //  $this->render('screen1');
           //  exit;
            $ordno='';
            $itmess='';
          //  print_r($_REQUEST);
            $id=$_REQUEST['item'];
            $items=Kits::model()->findAllByAttributes(array('cate'=>$id));
          //  echo '<br/>';
            //  print_r($items);
           
            
            $itmes=$_GET['item'];
            $service='_service';
 foreach ($items as $itme) {
     $it=$itme['code'];
      $itmess.= "'$it$service',";
     
 }
    $itmess=rtrim($itmess, ",");
 // echo $itmess; exit;
         //   print_r($_GET); exit;
            $sql="select * from customer_order,0_sales_orders where customer_order.delivery_date  between '$sdate' and '$edate' and  0_sales_orders.order_no=customer_order.sale_order ";
            
                     $command = Yii::app()->db->createCommand($sql);
$orders= $command->queryAll();


if(empty($orders))
{
     $this->redirect('index.php?frm=1');
   // $this->render('screen1');
//exit;

}
else
{
//print_r($orders); exit;
foreach ($orders as $value) {
    $ordno.= $value['id'].',';
}
            $ordno=rtrim($ordno, ",");

            
                $sql="SELECT * FROM  `customer_order_detail` where customer_order_id in ($ordno) and main_order =1 and item in ($itmess)  order by item";
  
            $command = Yii::app()->db->createCommand($sql);
            $kits= $command->queryAll();
//echo '<br/>'.$sql;
//echo '<br/>';
         //   print_r($kits);
		$this->render('screen',array('orders'=>$orders,'kits'=>$kits));
}
	}
        
        
        
            public function actionReceivedegh()
	{
        
                
                if(isset($_POST['deghs']))
                {
                  $deghs=$_POST['deghs'];
                  //print_r($deghs); exit;
                  
                $orderid=$_POST["orderid"];
                for($i=0; $i<count($deghs); $i++)
                { 
                    
                    $sql="update assign_degh set status = 0 where id = $deghs[$i]";
                    $command = Yii::app()->db->createCommand($sql)->execute(); 
                    
                    $sql="update degh set status = 0 where  id= ( select degh_id from assign_degh where id= $deghs[$i] ) ";
                    $command = Yii::app()->db->createCommand($sql)->execute(); 
                    
                    
                }  
                    
                    $this->redirect('index.php?r=SalesOrder');
                }
                
                 $this->render('receivedegh');
            }
                
        public function actionAssigndegh()
	{
        
            $user=Yii::app()->session['admin'];
            
            if(isset($_POST['cook']) )
            {
                
         //     print_r($_POST);
         //      exit;
                $cooks=$_POST['cook'];
                $orderid=$_POST["orderid"];
                    $kit=$_POST['kitid'];
                for($i=0; $i<count($cooks); $i++)
                {
                $sql="INSERT INTO `cook_work` (`cook_id`, `order_id`, `date_assign`, `assign_by`,kit) 
                VALUES ($cooks[$i], '$orderid', CURDATE() , $user,$kit)";
               $command = Yii::app()->db->createCommand($sql)->execute(); 
                }
                
            }
            if(isset($_POST['degh']))
            {
                
                $deghs=$_POST['degh'];
                  $orderid=$_POST["orderid"];
                  
                  $kit=$_POST['kitid'];
                for($i=0; $i<count($deghs) ; $i++)
                {
                    
                  $sql=  "INSERT INTO `assign_degh` (`degh_id`, `order_id`, `assign_date`, `assign_by`,kit_no, `status`)
                        VALUES ( $deghs[$i], '$orderid', CURDATE(), $user ,$kit, '1' )";
                                  $command = Yii::app()->db->createCommand($sql)->execute();
                                  //echo $sql;
                                  
                   $sql="update degh set status=1 where id = $deghs[$i]";                
                  $command = Yii::app()->db->createCommand($sql)->execute();
                }
                    
                
             
                
            }
              // if(isset($_POST['degh']) || isset($_POST['cook']))
                //{$this->redirect('index.php?r=SalesOrder/assign_degh_kit');
                
               // exit;
               // }
            $this->render('assign_degh_kit');
        }
        
      public  function add_customer($CustName, $cust_ref, $address, $tax_id, $curr_code,
	$dimension_id, $dimension2_id, $credit_status, $payment_terms, $discount, $pymt_discount, 
	$credit_limit, $sales_type, $notes)
{
	$sql = "INSERT INTO 0_debtors_master (name, debtor_ref, address, tax_id,
		dimension_id, dimension2_id, curr_code, credit_status, payment_terms, discount, 
		pymt_discount,credit_limit, sales_type, notes) VALUES ('"
		.$CustName ."', '" .$cust_ref ."', '"
		.$address . "', '" . $tax_id . "','"
		.$dimension_id . "',' " 
		.$dimension2_id . "', '".$curr_code . "', 
		'" . $credit_status . "', '".$payment_terms . "',' " . $discount . "', 
		'" . $pymt_discount . "',' " . $credit_limit 
		 ."', '".$sales_type."', '".$notes . "')";

          $command = Yii::app()->db->createCommand($sql)->execute();
          
	//db_query($sql,"The customer could not be added");
}


public function add_crm_person($ref, $name, $name2, $address, $phone, $phone2, $fax, $email, $lang, $notes,
	$cat_ids=null, $entity=null)
{
	$sql = "INSERT INTO 0_crm_persons (ref, name, name2, address,
		phone, phone2, fax, email, lang, notes)
		VALUES ('"
		  .$ref . "', '".$name."','".$name2."', '".$address."', '".$phone. "',' ".$phone2 . "', 
                      '".$fax . "', '".$email . "', '".$lang . "', '" .$notes."' )";

	  $command = Yii::app()->db->createCommand($sql)->execute();
}


public function add_branch($customer_id, $br_name, $br_ref, $br_address, $salesman, $area, 
	$tax_group_id, $sales_account, $sales_discount_account, $receivables_account, 
	$payment_discount_account, $default_location, $br_post_address, $disable_trans, $group_no,
	$default_ship_via, $notes)
{
	$sql = "INSERT INTO 0_cust_branch (debtor_no, br_name, branch_ref, br_address,
		salesman, area, tax_group_id, receivables_account, payment_discount_account, 
		sales_discount_account, default_location,
		br_post_address, disable_trans, group_no, default_ship_via, notes)
		VALUES ('".$customer_id. "','".$br_name . "',' "
			.$br_ref . "', '"
			.$br_address . "', '".$salesman . "',' "
			.$area . "','"
			.$tax_group_id . "','"
			
			.$receivables_account."','".$payment_discount_account."','".$sales_discount_account."',' "
			.$default_location . "',' "
			.$br_post_address . "','"
			.$disable_trans . "',' "
			.$group_no . "',' "
			.$default_ship_via. "', '"
			.$notes."' )";
        $command = Yii::app()->db->createCommand($sql)->execute();
	
}




public function add_crm_contact($type, $action, $entity_id, $person_id)
{
	$sql = "INSERT INTO 0_crm_contacts (person_id, type, action, entity_id) VALUES (
            '".$person_id . "','"
		.$type . "','"
		.$action . "','"
		.$entity_id . "')";
        $command = Yii::app()->db->createCommand($sql)->execute();
	//return db_query($sql, "Can't insert crm contact");
}



        public function actionCreatecustomer()
        {
            
             $this->add_customer($_POST['cus_name'], $_POST['cus_name'], $_POST['cus_address'],
			'00', 'PKR', '', '',
			'1', '4', 0, 0,
			'10000', 1, '');

            
            
                 $selected_id = $_POST['customer_id'] = Yii::app()->db->getLastInsertID();
                
                
                $this->add_branch($selected_id, $_POST['cus_name'], $_POST['cus_name'],
                $_POST['cus_address'], '1', 1, 2, '4010',
                '4510', '1200', '4500',
                'DEF', $_POST['cus_address'], 0, 0, 1, '');
                
                $selected_branch = Yii::app()->db->getLastInsertID();
                
                $this->add_crm_person($_POST['cus_name'], $_POST['cus_name'], '', $_POST['cus_address'], 
				$_POST['cus_phone'], '', '', $_POST['cus_email'], '', '');
                
                $pers_id = Yii::app()->db->getLastInsertID();
                
                $this->add_crm_contact('cust_branch', 'general', $selected_branch, $pers_id);

		$this->add_crm_contact('customer', 'general', $selected_id, $pers_id);
                        
                        $this->redirect('index.php?r=SalesOrder/Addorder&cus='.$selected_id);
           
        
        }

        

        public function actionGetrecipe()
        {
            $id=$_GET['id'];
            $sql="select * from customer_order_detail where customer_order_id = $id  and editable=1";
            
              $command = Yii::app()->db->createCommand($sql);
                                $recipes= $command->queryAll();
                         //  echo $sql;    
            echo '<table width="100%">
                
<tr><th style="text-align:left">Item </th><th>Quantity </th><th>Unit</th>';
            
            foreach ($recipes as $value) {
                
           $sql1="     SELECT * FROM  0_stock_master where stock_id ='".$value['item']."' ";
           $command = Yii::app()->db->createCommand($sql1);
                                $itemunit= $command->queryRow();
                         //   echo $sql;    
           
                echo "<tr><td style='text-align:left'>".$value['desp']."</td><td>".$value['qty']."</td><td>".$itemunit['units']."</td></tr>";
                
            }
            echo "</table>";
            
            exit;
                                
        }
        
    

       public function actionvieworder(){
            
          //  print_r($_POST);exit;
            
            $data=array();
           
             
             $sql_id="select max(order_no) from 0_sales_orders";
              $command = Yii::app()->db->createCommand($sql_id);
                $orderid= $command->queryRow();
                $orderid=$orderid['max(order_no)']+1;
                
$sql_id="select branch_code from 0_cust_branch where debtor_no = '".$_POST['customer']."' ";
              $command = Yii::app()->db->createCommand($sql_id);
                $branch= $command->queryRow();
                $branch=$branch['branch_code'];
                
                $sql="SELECT * FROM  `0_debtors_master` where debtor_no = '".$_POST['customer']."' ";
                  $command = Yii::app()->db->createCommand($sql);
                $cus_name= $command->queryRow();
                $cus_name=$cus_name['name'];
                
                  $sql_id="select max(reference) from 0_sales_orders";
              $command = Yii::app()->db->createCommand($sql_id);
                $ordref= $command->queryRow();
                $ref=$ordref['max(reference)']+1;
                
$commernty=$_POST['comments'];
//$cus_name="''";
$deliry_add=$_POST['develry_address'];
$pohone="";

$ship=0;
$payment=3;
$delry_date=date('Y-m-d' ,strtotime($_POST['develry_date']));
             	
                ///////////////////////////////// sale order detail entery
                $scocks=$_POST['stock_item'];
                $i=0;
                $remarks='';
                
                
                ////atiq work inserting parent table//
                
                $model_cusorder = new TempCustomerOrder;
                
                $model_cusorder->customer_id = $_POST['customer'];
                $model_cusorder->booked_by = Yii::app()->session['admin'];
                $model_cusorder->delivery_address = $deliry_add;
                $model_cusorder->delivery_date = $delry_date;
                $model_cusorder->delivery_time = $_POST['develry_time'];
                $model_cusorder->event = $_POST['event'];
                $model_cusorder->lunch_dinner =$_POST['lunch_dinner'];
                $model_cusorder->comments = $commernty;
                $model_cusorder->packing_charges = $_POST['packing_charges'];
                $model_cusorder->service_charges = $_POST['service_charges'];
                $model_cusorder->fare_charges = $_POST['fare_charges'];
                $model_cusorder->bbq_charges = $_POST['bbq_charges'];
                $model_cusorder->advance = $_POST['advance'];
                $model_cusorder->discount = $_POST['discount'];
                $model_cusorder->total = $_POST['total'];
                $model_cusorder->kg = $_POST['booking_type'];
                
                if($_POST['booking_type'] == 1){
                  
                $model_cusorder->guest = $_POST['guest'];
                $model_cusorder->rate = $_POST['rate'];
                                
                $model_cusorder->itemcost=$_POST['total_amount'];
                }
                else{
                $model_cusorder->guest = 0;
                $model_cusorder->rate = 0;
               $model_cusorder->itemcost=$_POST['itemcost'];
                }
                
               $model_cusorder->sale_order= $orderid;
                   $model_cusorder->booking_date= date('Y-m-d');
                $model_cusorder->booking_time= date('H:i:s');
                $model_cusorder->amt_word= $_POST['amt_words'];
                
                
                if (!$model_cusorder->save()) {
			$errors = array();
                        print_r($model_cusorder->getErrors() );
                        exit;
			//foreach ($model_cusorder->getErrors() as $e) $errors = array_merge($errors, $e);
			//$this->sendResponse(500, implode("<br />", $errors));
		} 
                //if($model_cusorder->save())
                //{
                  //  echo $form->errorSummary($model_cusorder);
               // }
                
                $last_rec =  Yii::app()->db->getLastInsertID();
                ///end atiq paten work//
                $kit_id=0;
                foreach ($scocks as $stock) {
                    
                    $qty= $_POST['sub_qty'][$i];
                    $remarks= $_POST['remak'][$i];
                    
                    $item_code_a = $_POST['item_code'][$i];
                    $stock_tem_a = $_POST['stock_item'][$i];
                    $edit = $_POST['editable'][$i];
                    $item_price=$_POST['amt_price'][$i];
                     
                    $item_price=$item_price/$qty;
//$by_party_a = $_POST['byparty'][$i];
                    
                    $i++;
                    
                    if(isset($_POST['byparty'][$stock]))
                        $part=1;
                    else {
                            $part=0;
                    }
                    $sql="SELECT * FROM  `0_stock_master` where stock_id ='$stock' ";
                        $command = Yii::app()->db->createCommand($sql);
                $stk_desp= $command->queryRow();
                $desp=$stk_desp['description'];
                $sql="SELECT * FROM  `0_prices` where stock_id='$stock'";
                 $command = Yii::app()->db->createCommand($sql);
                $price= $command->queryRow();
                $price=$price['price'];
                


//		$sql = "INSERT INTO 0_sales_order_details (order_no, trans_type, stk_code, description, unit_price, quantity, discount_percent,remarks,party) VALUES (";
//		$sql .= $orderid . ",30
//				,'".$stock."', '"
//				.$desp."', '$item_price',
//				'$qty',
//				0,'$remarks','$part')";
//		 $command = Yii::app()->db->createCommand($sql)->execute(); 
//                     $detail_id =  Yii::app()->db->getLastInsertID();
                 
              $sql_id="select max(id) from 0_sales_order_details";
              $command = Yii::app()->db->createCommand($sql_id);
              $detail_id= $command->queryRow();
              $detail_id=$orderid['max(order_no)']+1;
                     
                     
               
                       
                
         ////atiq work inserting deatil table//
        
  $model_cusorder_del = new TempCustomerOrderDetail;
                
               $model_cusorder_del->temp_customer_order_id = $last_rec ;
               $model_cusorder_del->item = $stock;
               $model_cusorder_del->desp =$desp ;

                 if($item_code_a.'_service' == $stock_tem_a)
            {
               $model_cusorder_del->main_order = 1;
               $model_cusorder_del->daigh = $_POST['deigh'];
               $model_cusorder_del->qty =$qty;
               $model_cusorder_del->party = 0;
               $model_cusorder_del->amount = $item_price;
               $model_cusorder_del->total = $item_price * $qty;
                   $model_cusorder_del->kit_id=0;
}
            else{
                
               $model_cusorder_del->main_order = 0;
               $model_cusorder_del->daigh = 0;
               $model_cusorder_del->qty =$qty;
               $model_cusorder_del->party = $part;
               $model_cusorder_del->amount = $item_price;;
               $model_cusorder_del->total = $item_price * $qty;
               $model_cusorder_del->kit_id=$kit_id;
             
            }
              $model_cusorder_del->sale_detail_id=$detail_id;
              $model_cusorder_del->editable=$edit;
              
              
           // $model_cusorder_del->save();
              if (!$model_cusorder_del->save()) {
			$errors = array();
                        print_r($model_cusorder_del->getErrors() );
                        exit;
			//foreach ($model_cusorder->getErrors() as $e) $errors = array_merge($errors, $e);
			//$this->sendResponse(500, implode("<br />", $errors));
		} 
                
            if( $model_cusorder_del->main_order==1)
                    $kit_id =  Yii::app()->db->getLastInsertID();
       
   }
                ///////////////////////////////////
               
 	//write_customer_payment(0, 13, 30,2, Date('Y-m-d'), 'A12',$_POST['discount'], 0, 'fj ldskjf l ', 0, 0,$_POST['discount'] );

      $data['customer']=$_POST['customer'];
         $data['branch']=$branch;
         $data['amount']=$_POST['advance'];
         $data['id']=$last_rec;
   
        
         
          $sql_order="SELECT * FROM  `customer_order` where id ='$last_rec' ";
$sql_order = Yii::app()->db->createCommand($sql_order);
$sql_order= $sql_order->queryRow();

                
$sql_main="SELECT * FROM  `customer_order_detail` where customer_order_id='$last_rec' and main_order = 1";
$sql_main = Yii::app()->db->createCommand($sql_main);
$sql_main= $sql_main->queryAll();
   $this->render('tempview',array('data'=>$data,'order' =>$sql_order , 'orderdetail'=>$sql_main,'id'=>$last_rec)); 
           exit;
         
                
       
        }
}