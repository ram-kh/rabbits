<?php
/* @var $this OkrolyController */
/* @var $model Okroly */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ido'); ?>
		<?php echo $form->textField($model,'ido'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idco'); ?>
		<?php echo $form->textField($model,'idco'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idr_m'); ?>
		<?php echo $form->textField($model,'idr_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idr_f'); ?>
		<?php echo $form->textField($model,'idr_f'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jigging'); ?>
		<?php echo $form->textField($model,'jigging'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'born'); ?>
		<?php echo $form->textField($model,'born'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'died'); ?>
		<?php echo $form->textField($model,'died'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reared'); ?>
		<?php echo $form->textField($model,'reared'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->