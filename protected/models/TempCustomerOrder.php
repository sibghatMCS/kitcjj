<?php

/**
 * This is the model class for table "temp_customer_order".
 *
 * The followings are the available columns in table 'temp_customer_order':
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
 * @property integer $kg
 * @property integer $guest
 * @property double $rate
 * @property integer $sale_order
 * @property double $itemcost
 * @property integer $booked_by
 * @property string $booking_date
 * @property string $booking_time
 * @property string $amt_word
 * @property integer $closed
 * @property integer $deliverd
 */
class TempCustomerOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TempCustomerOrder the static model class
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
		return 'temp_customer_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_id, delivery_address, delivery_time, delivery_date, event, discount, advance, total, fare_charges, bbq_charges, service_charges, packing_charges, comments, lunch_dinner, kg, guest, rate, sale_order, itemcost, booked_by, booking_date, booking_time, amt_word', 'required'),
			array('customer_id, kg, guest, sale_order, booked_by, closed, deliverd', 'numerical', 'integerOnly'=>true),
			array('discount, advance, total, fare_charges, bbq_charges, service_charges, packing_charges, rate, itemcost', 'numerical'),
			array('event, comments, lunch_dinner, amt_word', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, customer_id, delivery_address, delivery_time, delivery_date, event, discount, advance, total, fare_charges, bbq_charges, service_charges, packing_charges, comments, lunch_dinner, kg, guest, rate, sale_order, itemcost, booked_by, booking_date, booking_time, amt_word, closed, deliverd', 'safe', 'on'=>'search'),
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
			'kg' => 'Kg',
			'guest' => 'Guest',
			'rate' => 'Rate',
			'sale_order' => 'Sale Order',
			'itemcost' => 'Itemcost',
			'booked_by' => 'Booked By',
			'booking_date' => 'Booking Date',
			'booking_time' => 'Booking Time',
			'amt_word' => 'Amt Word',
			'closed' => 'Closed',
			'deliverd' => 'Deliverd',
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
		$criteria->compare('kg',$this->kg);
		$criteria->compare('guest',$this->guest);
		$criteria->compare('rate',$this->rate);
		$criteria->compare('sale_order',$this->sale_order);
		$criteria->compare('itemcost',$this->itemcost);
		$criteria->compare('booked_by',$this->booked_by);
		$criteria->compare('booking_date',$this->booking_date,true);
		$criteria->compare('booking_time',$this->booking_time,true);
		$criteria->compare('amt_word',$this->amt_word,true);
		$criteria->compare('closed',$this->closed);
		$criteria->compare('deliverd',$this->deliverd);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}