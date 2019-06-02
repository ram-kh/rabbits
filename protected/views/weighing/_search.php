<?php
/* @var $this WeighingController */
/* @var $model Weighing */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idw'); ?>
		<?php echo $form->textField($model,'idw'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idr'); ?>
		<?php echo $form->textField($model,'idr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_w'); ?>
		<?php echo $form->textField($model,'date_w'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weight'); ?>
		<?php echo $form->textField($model,'weight'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->