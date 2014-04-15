<?php
/* @var $this EmpTransController */
/* @var $model EmpTrans */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'emp-trans-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'emap_id'); ?>
		<?php echo $form->textField($model,'emap_id'); ?>
		<?php echo $form->error($model,'emap_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paid'); ?>
		<?php echo $form->textField($model,'paid'); ?>
		<?php echo $form->error($model,'paid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'balance'); ?>
		<?php echo $form->textField($model,'balance'); ?>
		<?php echo $form->error($model,'balance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'due'); ?>
		<?php echo $form->textField($model,'due'); ?>
		<?php echo $form->error($model,'due'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->