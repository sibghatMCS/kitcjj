<?php

/**
 * This is the model class for table "assign_degh".
 *
 * The followings are the available columns in table 'assign_degh':
 * @property integer $id
 * @property integer $degh_id
 * @property integer $order_id
 * @property string $assign_date
 * @property integer $assign_by
 * @property integer $status
 * @property integer $kit_no
 */
class AssignDegh extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AssignDegh the static model class
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
		return 'assign_degh';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('degh_id, order_id, assign_date, assign_by, status, kit_no', 'required'),
			array('degh_id, order_id, assign_by, status, kit_no', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, degh_id, order_id, assign_date, assign_by, status, kit_no', 'safe', 'on'=>'search'),
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
			'degh_id' => 'Degh',
			'order_id' => 'Order',
			'assign_date' => 'Assign Date',
			'assign_by' => 'Assign By',
			'status' => 'Status',
			'kit_no' => 'Kit No',
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
		$criteria->compare('degh_id',$this->degh_id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('assign_date',$this->assign_date,true);
		$criteria->compare('assign_by',$this->assign_by);
		$criteria->compare('status',$this->status);
		$criteria->compare('kit_no',$this->kit_no);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}