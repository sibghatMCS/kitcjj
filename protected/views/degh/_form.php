<?php
/* @var $this DeghController */
/* @var $model Degh */
/* @var $form CActiveForm */
?>

<div class="form" style="padding: 34px;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'degh-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->