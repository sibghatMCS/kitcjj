<?php

/**
 * This is the model class for table "customer_order".
 *
 * The followings are the available columns in table 'customer_order':
 * @property integer $id
 * @property integer $customer_id
 * @property string $delivery_address
 * @property string $delivery_time
 * @property string $delivery_date
 * @property string $event
 * @property double $discount
 * @property double $advance
 * @property double $total
 * @property double $fare_charges
 * @property double $bbq_charges
 * @property double $service_charges
 * @property double $packing_charges
 * @property string $comments
 * @property string $lunch_dinner
 */
class CustomerOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CustomerOrder the static model class
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
		return 'customer_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
array('customer_id, delivery_address, delivery_time, delivery_date,sale_order,itemcost,  total,  lunch_dinner', 'required'),
array('customer_id, kg', 'numerical', 'integerOnly'=>true),
array('discount, advance, total, fare_charges, bbq_charges, service_charges, packing_charges,guest,rate', 'numerical'),
			array('event, comments, lunch_dinner', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, customer_id, delivery_address, delivery_time, delivery_date, event, discount, advance, total, fare_charges, bbq_charges, service_charges, packing_charges, comments, lunch_dinner', 'safe', 'on'=>'search'),
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
			'customer_id' => 'Customer',
			'delivery_address' => 'Delivery Address',
			'delivery_time' => 'Delivery Time',
			'delivery_date' => 'Delivery Date',
			'event' => 'Event',
			'discount' => 'Discount',
			'advance' => 'Advance',
			'total' => 'Total',
			'fare_charges' => 'Fare Charges',
			'bbq_charges' => 'Bbq Charges',
			'service_charges' => 'Service Charges',
			'packing_charges' => 'Packing Charges',
			'comments' => 'Comments',
			'lunch_dinner' => 'Lunch Dinner',
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
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('delivery_address',$this->delivery_address,true);
		$criteria->compare('delivery_time',$this->delivery_time,true);
		$criteria->compare('delivery_date',$this->delivery_date,true);
		$criteria->compare('event',$this->event,true);
		$criteria->compare('discount',$this->discount);
		$criteria->compare('advance',$this->advance);
		$criteria->compare('total',$this->total);
		$criteria->compare('fare_charges',$this->fare_charges);
		$criteria->compare('bbq_charges',$this->bbq_charges);
		$criteria->compare('service_charges',$this->service_charges);
		$criteria->compare('packing_charges',$this->packing_charges);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('lunch_dinner',$this->lunch_dinner,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}