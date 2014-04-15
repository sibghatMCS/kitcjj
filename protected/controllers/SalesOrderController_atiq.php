<?php

class SalesOrderController extends Controller
{
	public function actionIndex()
	{
            
            $sql="select * from 0_sales_orders where delivery_date <= CURDATE() and    trans_type =30 and order_status != 1";
            $command = Yii::app()->db->createCommand($sql);
$orders= $command->queryAll();
            
            
            
            
		$this->render('index',array('orders'=>$orders));
	}
        
        public function actionAssigndegh()
	{
        
            
            if(isset($_POST['cook']))
            {
                $cooks=$_POST['cook'];
                for($i=0; $i<=count($cooks); $i++)
                {
                
                    
                    
            $sql="INSERT INTO `cook_work` (`cook_id`, `order_id`, `date_assign`, `assign_by`) 
                VALUES ($cooks[$i], '1', '1', '1')";
            
            
               $command = Yii::app()->db->createCommand($sql)->execute(); 
            
                }
            }
            $this->render('assigndegh');
        }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}