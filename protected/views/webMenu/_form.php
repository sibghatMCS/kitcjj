<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
    <script type="text/javascript" src="css/bootstrap-select.js"></script>
  <script type="text/javascript">
        $(window).on('load', function () {

            $('.selectpicker').selectpicker({
                'selectedText': 'cat'
            });

            // $('.selectpicker').selectpicker('hide');
        });
    </script>
    
<?php
/* @var $this WebMenuController */
/* @var $model WebMenu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'web-menu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	
  <select id="sele"  name="item[]" class="selectpicker" multiple title='Choose  Items'>
     <?php      $sql="select * from web_items ";
        $command = Yii::app()->db->createCommand($sql);
                $kits= $command->queryAll();
                
                
                
                foreach ($kits as $kit) { ?>
                              
          <option value="<?php echo $kit['id'] ?>"><?php echo $kit['name'] ?></option>
     
      
     <?php } ?>
  </select>
        <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn')); ?>
	</div>
        
        
<?php $this->endWidget(); ?>

</div><!-- form -->