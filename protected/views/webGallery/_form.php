<?php
/* @var $this WebGalleryController */
/* @var $model WebGallery */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'web-gallery-form',
	'enableAjaxValidation'=>false,
       'htmlOptions' => array('enctype' => 'multipart/form-data'),
     
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
            <?php 
            
  echo $form->labelEx($model, 'image');
echo $form->fileField($model, 'image');
echo $form->error($model, 'image');

?>
		<?php //echo $form->labelEx($model,'image'); ?>
		<?php //echo $form->textField($model,'image',array('size'=>60,'maxlength'=>500)); ?>
		<?php //echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
            	<?php echo $form->labelEx($model,'cate'); ?>
    <?php           $list = CHtml::listData(WebGalleryCate::model()->findAll(), 'id', 'name');
    echo $form->dropDownList($model, 'cate', $list);
    ?>
	
		<?php //echo $form->textField($model,'cate'); ?>
		<?php echo $form->error($model,'cate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->