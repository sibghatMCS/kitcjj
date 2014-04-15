<?php
/* @var $this AttandanceController */
/* @var $model Attandance */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attandance-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'emp_id'); ?>
		<?php echo $form->textField($model,'emp_id'); ?>
		<?php echo $form->error($model,'emp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_in'); ?>
		<?php echo $form->textField($model,'time_in'); ?>
		<?php echo $form->error($model,'time_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_out'); ?>
		<?php echo $form->textField($model,'time_out'); ?>
		<?php echo $form->error($model,'time_out'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hours'); ?>
		<?php echo $form->textField($model,'hours'); ?>
		<?php echo $form->error($model,'hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'over_time'); ?>
		<?php echo $form->textField($model,'over_time'); ?>
		<?php echo $form->error($model,'over_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'half_day'); ?>
		<?php echo $form->textField($model,'half_day'); ?>
		<?php echo $form->error($model,'half_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->