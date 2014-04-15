<?php

class EmployeesController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','Advancepayment','Del'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','Del'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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




            public function actionAdvancepayment()
                 {
             
                if(isset($_POST['submitamt']))
                {
                    $model = new EmpTrans;
                    
                  
     $balance=EmpTrans::model()->findByAttributes(array('emap_id'=>$_POST['emp_id']),array(
        'order' => 'id desc',
        'limit' => '1',
    )); 
                        if(!isset($balance->balance))
   $balc=0;
else {
   $balc=$balance->balance;
}


                    
                    $model->balance=$balc-$_POST['amount'];
                    $model->date=date('y-m-d');
                    $model->emap_id=$_POST['emp_id'];
                    $model->paid=$_POST['amount'];
                    $model->due=0;
                    $model->save();
                  
                      if (!$model->save()) {
			$errors = array();
                        print_r($model->getErrors() );
                        exit;
			//foreach ($model_cusorder->getErrors() as $e) $errors = array_merge($errors, $e);
			//$this->sendResponse(500, implode("<br />", $errors));
		} 
                
                    
                          
                     
                    // $emp_t1->save();
                     $sql_max="SELECT MAX(`type_no`) as trsns FROM  `0_gl_trans` WHERE TYPE =0";
                           $command = Yii::app()->db->createCommand($sql_max);
                $trsns= $command->queryRow();
                $trsns=$trsns['trsns']+1;
                      
                $code='EMP'.$model->emap_id;
                
                
                $this->add_gl_trans(0,$trsns,$code,0,0,'Employee Payment Transaction',$model->paid);
                       
                         $this->add_gl_trans(0,$trsns,10011,0,0,'Employee Payment Transaction',-$model->paid);
             
                    
                }
                
          
             
             
           $this->render('advancepayment');
             
         } 

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
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
		$model=new Employees;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Employees']))
		{
			$model->attributes=$_POST['Employees'];
                        $model->status=1;
			if($model->save())
                        {
                           $sql= "INSERT INTO `0_chart_master` (`account_code`, `account_name`, `account_type`) 
                                    VALUES ('EMP$model->id', '$model->name', '11')";
                            $command = Yii::app()->db->createCommand($sql)->execute(); 
				$this->redirect(array('view','id'=>$model->id));
                        }
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
        
             public function actionDel()
	{
		$model = $this->loadModel($_GET['id']);
                $model->status=0;
                $model->save();
                
                $this->redirect(array('admin'));
                
        }
        
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Employees']))
		{
			$model->attributes=$_POST['Employees'];
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
             $this->redirect(array('admin'));
             
		$dataProvider=new CActiveDataProvider('Employees');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Employees('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Employees']))
			$model->attributes=$_GET['Employees'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Employees the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Employees::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Employees $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='employees-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
