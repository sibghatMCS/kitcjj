<?php

/**
 * This is the model class for table "attandance".
 *
 * The followings are the available columns in table 'attandance':
 * @property integer $id
 * @property integer $emp_id
 * @property string $date
 * @property double $overtime_amount
 * @property integer $attd_status
 * @property double $fine_amount
 * @property string $remarks
 * @property string $service
 */
class Attandance extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attandance the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'attandance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
array('emp_id, date,  attd_status', 'required'),
array('emp_id, attd_status', 'numerical', 'integerOnly'=>true),
array('overtime_amount, fine_amount, service', 'numerical'),
			array('remarks', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, emp_id, date, overtime_amount, attd_status, fine_amount, remarks, service', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'emp_id' => 'Emp',
			'date' => 'Date',
			'overtime_amount' => 'Overtime Amount',
			'attd_status' => 'Attd Status',
			'fine_amount' => 'Fine Amount',
			'remarks' => 'Remarks',
			'service' => 'Service',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('emp_id',$this->emp_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('overtime_amount',$this->overtime_amount);
		$criteria->compare('attd_status',$this->attd_status);
		$criteria->compare('fine_amount',$this->fine_amount);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('service',$this->service,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}