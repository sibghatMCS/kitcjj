<?php
/* @var $this CustomerOrderController */
/* @var $model CustomerOrder */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_id'); ?>
		<?php echo $form->textField($model,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_address'); ?>
		<?php echo $form->textArea($model,'delivery_address',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_time'); ?>
		<?php echo $form->textField($model,'delivery_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_date'); ?>
		<?php echo $form->textField($model,'delivery_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'event'); ?>
		<?php echo $form->textField($model,'event',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount'); ?>
		<?php echo $form->textField($model,'discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'advance'); ?>
		<?php echo $form->textField($model,'advance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fare_charges'); ?>
		<?php echo $form->textField($model,'fare_charges'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bbq_charges'); ?>
		<?php echo $form->textField($model,'bbq_charges'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_charges'); ?>
		<?php echo $form->textField($model,'service_charges'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'packing_charges'); ?>
		<?php echo $form->textField($model,'packing_charges'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textField($model,'comments',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lunch_dinner'); ?>
		<?php echo $form->textField($model,'lunch_dinner',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->