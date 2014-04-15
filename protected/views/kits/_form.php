<?php
/* @var $this KitsController */
/* @var $model Kits */
/* @var $form CActiveForm */
?>
   <style type="text/css">

      #tasktext {
        margin: 0px auto;
        width: 20%;
        font-family: "Urdu Naskh Asiatype", Tahoma, verdana, geneva, lucida, 'lucida grande', arial, helvetica, sans-serif;
      }

    </style>
       <script src="assets/js/UrduEditor.js" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript">
      initUrduEditor();
    </script>
    
    
    
    
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kits-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
        
        	<div class="row">
		<?php echo $form->labelEx($model,'urdu_name'); ?>
		<?php echo $form->textField($model,'urdu_name',array('id'=>'tasktext', 'size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'urdu_name'); ?>
	</div>
        
        
        
        <div class="row">
		<?php echo $form->labelEx($model,'cate'); ?>
		<?php 
                    $list = CHtml::listData(KitsCate::model()->findAll(), 'id', 'name');
    echo $form->dropDownList($model, 'cate', $list, array('options' => array($model->cate=>array('selected'=>true))));
    
  //              echo $form->textField($model,'cat_id'); ?>
		<?php echo $form->error($model,'cate'); ?>
	</div>
        
        

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

      <script language="javascript" type="text/javascript">
        makeUrduEditorsById({"tasktext":22});
      </script>
  
<?php $this->endWidget(); ?>

</div><!-- form -->