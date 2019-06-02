<?php
/* @var $this CopulationsController */
/* @var $model Copulations */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

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
		<?php echo $form->label($model,'morning'); ?>
		<?php echo $form->textField($model,'morning'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'evening'); ?>
		<?php echo $form->textField($model,'evening'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meal'); ?>
		<?php echo $form->textField($model,'meal'); ?>
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