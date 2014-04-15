<?php

/**
 * This is the model class for table "loan".
 *
 * The followings are the available columns in table 'loan':
 * @property integer $id
 * @property integer $emp_id
 * @property double $amount
 * @property integer $type
 * @property double $installment
 */
class Loan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Loan the static model class
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
		return 'loan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('emp_id, amount,date, type, installment', 'required'),
			array('emp_id, type', 'numerical', 'integerOnly'=>true),
			array('amount, installment', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, emp_id, amount, type, installment', 'safe', 'on'=>'search'),
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
			'amount' => 'Amount',
			'type' => 'Type',
			'installment' => 'Installment',
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
		$criteria->compare('amount',$this->amount);
		$criteria->compare('type',$this->type);
		$criteria->compare('installment',$this->installment);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}