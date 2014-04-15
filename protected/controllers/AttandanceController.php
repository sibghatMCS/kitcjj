<?php

class AttandanceController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
        
                      public function __construct($id, $module = null) 
{
                parent::__construct($id, $module);
            if(!isset(Yii::app()->session['admin']))
            {
                $this->redirect('index.php?r=site/Login');
               // echo 'inif '; exit;
            }
            
            
        }
        
        

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
        
        
//	public function accessRules()
//	{
//		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view','markattandance'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update','markattandance'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete','markattandance'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
//		);
//	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
        
        
           public function actiongetattendance(){
            
               
               $_GET['year']=date('Y');
               
$sql="SELECT * FROM attandance a where emp_id = '".$_GET['id']."' and MONTH(date) = '".$_GET['month']."' and year(date) = '".$_GET['year']."' order by date  ";
//echo $sql;exit; 
$sql= Yii::app()->db->createCommand($sql);
$sql= $sql->queryAll();



$sql_sum="SELECT sum(overtime_amount),sum(fine_amount) FROM attandance a where emp_id = '".$_GET['id']."' and MONTH(date) = '".$_GET['month']."' and year(date) = '".$_GET['year']."' order by date  ";
//echo $sql;exit; 
$sql_sum= Yii::app()->db->createCommand($sql_sum);
$sql_sum= $sql_sum->queryRow();



$sql_count_worked="SELECT count(*) FROM attandance where emp_id = '".$_GET['id']."' and MONTH(date) = '".$_GET['month']."' and year(date) = '".$_GET['year']."' and attd_status = 1";
//echo $sql;exit; 
$sql_count_worked= Yii::app()->db->createCommand($sql_count_worked);
$sql_count_worked= $sql_count_worked->queryRow();
//print_r ($sql);

$sql_count_abs="SELECT count(*) FROM attandance where emp_id = '".$_GET['id']."' and MONTH(date) = '".$_GET['month']."' and year(date) = '".$_GET['year']."' and attd_status = 0";
//echo $sql;exit; 
$sql_count_abs= Yii::app()->db->createCommand($sql_count_abs);
$sql_count_abs= $sql_count_abs->queryRow();

$this->render('emp_attend',array('data' =>$sql,'sum'=>$sql_sum,'work'=>$sql_count_worked,'absent'=>$sql_count_abs));
            
        }
        
        
        public function actiongetbalance()
        {
            
            $id=$_REQUEST['id'];
                 $balance=EmpTrans::model()->findByAttributes(array('emap_id'=>$id),array(
        'order' => 'id desc',
        'limit' => '1',
    )); 
                 if($balance)
       echo $balance->balance;     
                 else
                     echo 0;
        }

        
          function add_gl_trans($type, $trans_id,  $account, $dimension, $dimension2, $memo_,
	$amount, $currency=null, $person_type_id=null, $person_id=null,	$err_msg="", $rate=0)
{
	global $use_audit_trail;

	$date = date('Y-m-d');
        
		$amount_in_home_currency = $amount;
	
                if ($dimension == null || $dimension < 0)
		$dimension = 0;
	if ($dimension2 == null || $dimension2 < 0)
		$dimension2 = 0;
	
	$sql = "INSERT INTO 0_gl_trans ( type, type_no, tran_date,
		account, dimension_id, dimension2_id, memo_, amount";

	$sql .= ")";

	$sql .= "VALUES (".$type.", ".$trans_id.", '$date',
		'".$account."', ".$dimension.", "
		.$dimension2.", '".$memo_."', "
		.$amount_in_home_currency;

	
	$sql .= ")";

	$command = Yii::app()->db->createCommand($sql)->execute(); 
	//db_query($sql, $err_msg);
	//return $amount_in_home_currency;
}




        public function actionGeneratepayslip()
                    {
                
                 $_GET['year']=date('Y');
               
$sql="SELECT * FROM attandance a where emp_id = '".$_GET['id']."' and MONTH(date) = '".$_GET['month']."' and year(date) = '".$_GET['year']."' order by date  ";
//echo $sql;exit; 
$sql= Yii::app()->db->createCommand($sql);
$sql= $sql->queryAll();



$sql_sum="SELECT sum(service),sum(overtime_amount),sum(fine_amount) FROM attandance a where emp_id = '".$_GET['id']."' and MONTH(date) = '".$_GET['month']."' and year(date) = '".$_GET['year']."' order by date  ";
//echo $sql;exit; 
$sql_sum= Yii::app()->db->createCommand($sql_sum);
$sql_sum= $sql_sum->queryRow();



$sql_count_worked="SELECT count(*) FROM attandance where emp_id = '".$_GET['id']."' and MONTH(date) = '".$_GET['month']."' and year(date) = '".$_GET['year']."' and attd_status = 1";
//echo $sql;exit; 
$sql_count_worked= Yii::app()->db->createCommand($sql_count_worked);
$sql_count_worked= $sql_count_worked->queryRow();
//print_r ($sql);

$sql_count_abs="SELECT count(*) FROM attandance where emp_id = '".$_GET['id']."' and MONTH(date) = '".$_GET['month']."' and year(date) = '".$_GET['year']."' and attd_status = 0";
//echo $sql;exit; 
$sql_count_abs= Yii::app()->db->createCommand($sql_count_abs);
$sql_count_abs= $sql_count_abs->queryRow();


                $emp_id=$_GET['id'];
       $mon=$_GET['month'];
            $rec=  PayslipMonth::model()->findByAttributes(array('emp_id'=>$emp_id,'month'=>$mon));
            
                   if(isset($rec))
                {                    
       $emp_id=$_GET['id'];
       $mon=$_GET['month'];
       //$rec=  PayslipMonth::model()->findByAtributes(array('emp_id'=>$emp_id,'month'=>$mon));
       
       $payed[0]=$rec->paid;
                                      $payed[1]=$rec->loan;
                    
$this->render('payslipprint',array('paid'=>$payed,'data' =>$sql,'sum'=>$sql_sum,'work'=>$sql_count_worked,'absent'=>$sql_count_abs));
exit;             
}


                if(isset($_POST['amount']))
                {
                    
                    
                    $emp_trans= new EmpTrans;
                    $emp_trans->date=date('Y-m-d');
                    $emp_trans->emap_id=$_POST['emp_id'];
                    
                        $balance=EmpTrans::model()->findByAttributes(array('emap_id'=>$_POST['emp_id']),array(
        'order' => 'id desc',
        'limit' => '1',
    )); 
                        if(!isset($balance->balance))
   $balc=0;
else {
   $balc=$balance->balance;
}
                     $emp_trans->due=$_POST['salary'];
                     $emp_trans->balance=$balc+$emp_trans->due;
                     $emp_trans->paid=0;
                     $emp_trans->save();
                    
                               
                               
                     
                           $emp_t1= new EmpTrans;
                    $emp_t1->date=date('Y-m-d');
                    $emp_t1->emap_id=$_POST['emp_id'];
                    
                        $balance=EmpTrans::model()->findByAttributes(array('emap_id'=>$_POST['emp_id']),array(
        'order' => 'id desc',
        'limit' => '1',
    )); 
                        if(!isset($balance->balance))
   $balc=0;
else {
   $balc=$balance->balance;
}
                     $emp_t1->due=0;
                     $emp_t1->paid=$_POST['amount'];
                     $emp_t1->balance=$balc-$emp_t1->paid;
                     
                     
                     
                     
                     
                     $emp_t1->save();
                     $sql_max="SELECT MAX(`type_no`) as trsns FROM  `0_gl_trans` WHERE TYPE =0";
                           $command = Yii::app()->db->createCommand($sql_max);
                $trsns= $command->queryRow();
                $trsns=$trsns['trsns']+1;
                      
                $code='EMP'.$emp_t1->emap_id;
                
                       $this->add_gl_trans(0,$trsns,$code,0,0,'Employee Payment Transaction',$emp_t1->paid);
                       
                         $this->add_gl_trans(0,$trsns,10011,0,0,'Employee Payment Transaction',-$emp_t1->paid);
             
                     if(isset($_POST['loan_id']))
                     {
                     $loan_re = new LoanReceive;
                     $loan_re->date=Date('Y-m-d');
                     $loan_re->loan_id =$_POST['loan_id'];
                     $loan_re->amount=$_POST['installment'];
                     $loan_re->save();
                     
                        $emp_t2= new EmpTrans;
                    $emp_t2->date=date('Y-m-d');
                    $emp_t2->emap_id=$_POST['emp_id'];
                    
                        $balance=EmpTrans::model()->findByAttributes(array('emap_id'=>$_POST['emp_id']),array(
        'order' => 'id desc',
        'limit' => '1',
    )); 
                        
                     $emp_t2->due=0;
                     $emp_t2->paid=0;
                     $emp_t2->balance=$balance->balance-$_POST['installment'];
                     $emp_t2->loan=$_POST['installment'];
                     
                     $emp_t2->save();
                  
                     $sql_max="SELECT MAX(`type_no`) as trsns FROM  `0_gl_trans` WHERE TYPE =0";
                           $command = Yii::app()->db->createCommand($sql_max);
                $trsns= $command->queryRow();
                $trsns=$trsns['trsns']+1;
                     
                        $this->add_gl_trans(0,$trsns,$code,0,0,'Loan Transaction',-$emp_t2->loan);
                       
                         $this->add_gl_trans(0,$trsns,1200,0,0,'Loan Transaction',$emp_t2->loan);
             
                         
                         
                        
                     
                     }
                    
                     
                     $paymonth= new PayslipMonth;
                     
                     $paymonth->emp_id=$emp_t1->emap_id;
                     $paymonth->month=$_GET['month'];
                      if(isset($_POST['loan_id']))
                     $paymonth->loan=$_POST['installment'];
                      
                      $paymonth->paid=$_POST['amount'];
                     $paymonth->save();
                     
                     
                }
            
               
          

   if(isset($_POST['amount']))
                {                    
       $emp_id=$_GET['id'];
       $mon=$_GET['month'];
       $rec=  PayslipMonth::model()->findByAttributes(array('emp_id'=>$emp_id,'month'=>$mon));
       
       $payed[0]=$rec->paid;
                                      $payed[1]=$rec->loan;
                    
$this->render('payslipprint',array('paid'=>$payed,'data' =>$sql,'sum'=>$sql_sum,'work'=>$sql_count_worked,'absent'=>$sql_count_abs));
exit;             
}



$this->render('generatepayslip',array('data' =>$sql,'sum'=>$sql_sum,'work'=>$sql_count_worked,'absent'=>$sql_count_abs));
            
        }
        
     
        
         public function actiongetattendyearly(){
             
            
              
                       
$sql="SELECT * FROM attandance a where emp_id = '".$_GET['id']."' and year(date) = '".$_GET['year']."' order by date  ";
//echo $sql;exit; 
$sql= Yii::app()->db->createCommand($sql);
$sql= $sql->queryAll();



$sql_sum="SELECT sum(overtime_amount),sum(fine_amount) FROM attandance a where emp_id = '".$_GET['id']."' and year(date) = '".$_GET['year']."' order by date  ";
//echo $sql;exit; 
$sql_sum= Yii::app()->db->createCommand($sql_sum);
$sql_sum= $sql_sum->queryRow();



$sql_count_worked="SELECT count(*) FROM attandance where emp_id = '".$_GET['id']."' and year(date) = '".$_GET['year']."' and attd_status = 1";
//echo $sql;exit; 
$sql_count_worked= Yii::app()->db->createCommand($sql_count_worked);
$sql_count_worked= $sql_count_worked->queryRow();
//print_r ($sql);

$sql_count_abs="SELECT count(*) FROM attandance where emp_id = '".$_GET['id']."' and year(date) = '".$_GET['year']."' and attd_status = 0";
//echo $sql;exit; 
$sql_count_abs= Yii::app()->db->createCommand($sql_count_abs);
$sql_count_abs= $sql_count_abs->queryRow();

$this->render('yearlyattendence',array('data' =>$sql,'sum'=>$sql_sum,'work'=>$sql_count_worked,'absent'=>$sql_count_abs));
              
             
         }
        
        
         public function actiongetmonattendance(){
            
              $this->render('getmonthly');
             
         }
        
        public function actionmarkAttden()
        {
            
             $model=new Attandance;
             
             $model->date = date('Y-m-d');
             $model->emp_id = $_GET['id'];
             $model->overtime_amount = $_GET['overtime'];
             $model->fine_amount = $_GET['fine'];
             $model->remarks = $_GET['remkars'];
             $model->service = $_GET['service'];
             $model->attd_status = 1;
             
             
             //print_r($model);exit;
                if (!$model->save()) {
			$errors = array();
                        print_r($model->getErrors() );
                        exit;
				}
             else {
             echo 'Attendacne Marked';
             }
             
        }
        
        
         public function actionmarkAbsent()
        {
            
             $model=new Attandance;
             
             $model->date = date('Y-m-d');
             $model->emp_id = $_GET['id'];
             $model->overtime_amount = 0;
             $model->fine_amount = 0;
             $model->remarks = 0;
             $model->service = 0;
             $model->attd_status = 0;
             
             
             //print_r($model);exit;
             if($model->save())
             
             echo 'Marked Absent';
      
        }
        public function actionMarkAttandance()
	{
            
            $this->render('markattandance');
        }
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Attandance;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Attandance']))
		{
			$model->attributes=$_POST['Attandance'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Attandance']))
		{
			$model->attributes=$_POST['Attandance'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Attandance');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Attandance('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Attandance']))
			$model->attributes=$_GET['Attandance'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Attandance the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Attandance::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Attandance $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='attandance-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
        
        
        
        
     
}
