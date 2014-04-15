<?php
/* @var $this CookController */
/* @var $model Cook */
/* @var $form CActiveForm */
?>

<div class="form" STYLE="padding-left: 34px;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cook-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cnic'); ?>
		<?php echo $form->textField($model,'cnic',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'cnic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shift'); ?>
		<?php echo $form->textField($model,'shift',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'shift'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

