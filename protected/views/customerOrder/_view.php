<?php
/* @var $this CustomerOrderController */
/* @var $data CustomerOrder */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_address')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_time')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_date')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event')); ?>:</b>
	<?php echo CHtml::encode($data->event); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount')); ?>:</b>
	<?php echo CHtml::encode($data->discount); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('advance')); ?>:</b>
	<?php echo CHtml::encode($data->advance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fare_charges')); ?>:</b>
	<?php echo CHtml::encode($data->fare_charges); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bbq_charges')); ?>:</b>
	<?php echo CHtml::encode($data->bbq_charges); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_charges')); ?>:</b>
	<?php echo CHtml::encode($data->service_charges); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('packing_charges')); ?>:</b>
	<?php echo CHtml::encode($data->packing_charges); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lunch_dinner')); ?>:</b>
	<?php echo CHtml::encode($data->lunch_dinner); ?>
	<br />

	*/ ?>

</div>