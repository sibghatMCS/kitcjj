<?php /* @var $this Controller */

 if(Yii::app()->session['type']==1)
 $this->beginContent('//layouts/emp_main');
else
    $this->beginContent('//layouts/main'); 

?>
<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>
