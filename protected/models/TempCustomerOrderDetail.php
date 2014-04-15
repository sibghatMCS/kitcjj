<?php

/**
 * This is the model class for table "temp_customer_order_detail".
 *
 * The followings are the available columns in table 'temp_customer_order_detail':
 * @property integer $id
 * @property string $item
 * @property string $desp
 * @property double $qty
 * @property integer $daigh
 * @property integer $amount
 * @property integer $total
 * @property integer $main_order
 * @property integer $party
 * @property integer $temp_customer_order_id
 * @property integer $sale_detail_id
 * @property integer $editable
 * @property integer $kit_id
 */
class TempCustomerOrderDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TempCustomerOrderDetail the static model class
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
		return 'temp_customer_order_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item, desp, qty, daigh, amount, total, main_order, party, temp_customer_order_id, sale_detail_id, editable, kit_id', 'required'),
			array('daigh, amount, total, main_order, party, temp_customer_order_id, sale_detail_id, editable, kit_id', 'numerical', 'integerOnly'=>true),
			array('qty', 'numerical'),
			array('item', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, item, desp, qty, daigh, amount, total, main_order, party, temp_customer_order_id, sale_detail_id, editable, kit_id', 'safe', 'on'=>'search'),
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
			'item' => 'Item',
			'desp' => 'Desp',
			'qty' => 'Qty',
			'daigh' => 'Daigh',
			'amount' => 'Amount',
			'total' => 'Total',
			'main_order' => 'Main Order',
			'party' => 'Party',
			'temp_customer_order_id' => 'Temp Customer Order',
			'sale_detail_id' => 'Sale Detail',
			'editable' => 'Editable',
			'kit_id' => 'Kit',
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
		$criteria->compare('item',$this->item,true);
		$criteria->compare('desp',$this->desp,true);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('daigh',$this->daigh);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('total',$this->total);
		$criteria->compare('main_order',$this->main_order);
		$criteria->compare('party',$this->party);
		$criteria->compare('temp_customer_order_id',$this->temp_customer_order_id);
		$criteria->compare('sale_detail_id',$this->sale_detail_id);
		$criteria->compare('editable',$this->editable);
		$criteria->compare('kit_id',$this->kit_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}