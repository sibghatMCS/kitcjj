<?php
/* @var $this EmployeesController */
/* @var $data Employees */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->cat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salary')); ?>:</b>
	<?php echo CHtml::encode($data->salary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cnic')); ?>:</b>
	<?php echo CHtml::encode($data->cnic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contanct_no')); ?>:</b>
	<?php echo CHtml::encode($data->contanct_no); ?>
	<br />


</div>