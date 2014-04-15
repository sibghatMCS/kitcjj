<?php
/* @var $this CustomerOrderController */
/* @var $model CustomerOrder */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-order-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_id'); ?>
		<?php echo $form->textField($model,'customer_id'); ?>
		<?php echo $form->error($model,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_address'); ?>
		<?php echo $form->textArea($model,'delivery_address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'delivery_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_time'); ?>
		<?php echo $form->textField($model,'delivery_time'); ?>
		<?php echo $form->error($model,'delivery_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delivery_date'); ?>
		<?php echo $form->textField($model,'delivery_date'); ?>
		<?php echo $form->error($model,'delivery_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event'); ?>
		<?php echo $form->textField($model,'event',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'event'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount'); ?>
		<?php echo $form->textField($model,'discount'); ?>
		<?php echo $form->error($model,'discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'advance'); ?>
		<?php echo $form->textField($model,'advance'); ?>
		<?php echo $form->error($model,'advance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fare_charges'); ?>
		<?php echo $form->textField($model,'fare_charges'); ?>
		<?php echo $form->error($model,'fare_charges'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bbq_charges'); ?>
		<?php echo $form->textField($model,'bbq_charges'); ?>
		<?php echo $form->error($model,'bbq_charges'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_charges'); ?>
		<?php echo $form->textField($model,'service_charges'); ?>
		<?php echo $form->error($model,'service_charges'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'packing_charges'); ?>
		<?php echo $form->textField($model,'packing_charges'); ?>
		<?php echo $form->error($model,'packing_charges'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textField($model,'comments',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lunch_dinner'); ?>
		<?php echo $form->textField($model,'lunch_dinner',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'lunch_dinner'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->