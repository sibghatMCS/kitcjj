<?php
/* @var $this AttandanceController */
/* @var $data Attandance */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emp_id')); ?>:</b>
	<?php echo CHtml::encode($data->emp_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_in')); ?>:</b>
	<?php echo CHtml::encode($data->time_in); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_out')); ?>:</b>
	<?php echo CHtml::encode($data->time_out); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hours')); ?>:</b>
	<?php echo CHtml::encode($data->hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('over_time')); ?>:</b>
	<?php echo CHtml::encode($data->over_time); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('half_day')); ?>:</b>
	<?php echo CHtml::encode($data->half_day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>