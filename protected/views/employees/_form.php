<?php
/* @var $this EmployeesController */
/* @var $model Employees */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employees-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cat_id'); ?>
		<?php 
                    $list = CHtml::listData(EmpCat::model()->findAll(), 'id', 'name');
    echo $form->dropDownList($model, 'cat_id', $list);
    
  //              echo $form->textField($model,'cat_id'); ?>
		<?php echo $form->error($model,'cat_id'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'salary'); ?>
		<?php echo $form->textField($model,'salary'); ?>
		<?php echo $form->error($model,'salary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cnic'); ?>
		<?php echo $form->textField($model,'cnic',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'cnic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contanct_no'); ?>
		<?php echo $form->textField($model,'contanct_no',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'contanct_no'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->