<?php
/* @var $this LoanController */
/* @var $model Loan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'loan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'emp_id'); ?>
		<?php 
                
                 $list = CHtml::listData(Employees::model()->findAll(), 'id', 'name');
                      echo $form->dropDownList($model, 'emp_id', $list);
    
                //echo $form->textField($model,'emp_id'); ?>
		<?php echo $form->error($model,'emp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>
        
      

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
            
		<?php 
                      echo $form->dropDownList($model, 'type', array('1'=>'Monthly','2'=>'Custom'));
               // echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'installment'); ?>
		<?php echo $form->textField($model,'installment'); ?>
		<?php echo $form->error($model,'installment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->