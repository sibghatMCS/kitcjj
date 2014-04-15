<?php

/**
 * This is the model class for table "employees".
 *
 * The followings are the available columns in table 'employees':
 * @property integer $id
 * @property string $name
 * @property integer $cat_id
 * @property integer $status
 * @property double $salary
 * @property string $cnic
 * @property string $contanct_no
 */
class Employees extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Employees the static model class
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
		return 'employees';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, cat_id, status, salary, cnic, contanct_no', 'required'),
			array('cat_id, status', 'numerical', 'integerOnly'=>true),
			array('salary', 'numerical'),
			array('name, cnic, contanct_no', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, cat_id, status, salary, cnic, contanct_no', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'cat_id' => 'Cat',
			'status' => 'Status',
			'salary' => 'Salary',
			'cnic' => 'Cnic',
			'contanct_no' => 'Contanct No',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('salary',$this->salary);
		$criteria->compare('cnic',$this->cnic,true);
		$criteria->compare('contanct_no',$this->contanct_no,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}