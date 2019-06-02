<?php
/* @var $this RabbitsController */
/* @var $model Rabbits */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idr'); ?>
		<?php echo $form->textField($model,'idr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_r'); ?>
		<?php echo $form->textField($model,'date_r'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_arh'); ?>
		<?php echo $form->textField($model,'date_arh'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sex'); ?>
		<?php echo $form->textField($model,'sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ida'); ?>
		<?php echo $form->textField($model,'ida'); ?>
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
		<?php echo $form->label($model,'idce'); ?>
		<?php echo $form->textField($model,'idce'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idp'); ?>
		<?php echo $form->textField($model,'idp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ids'); ?>
		<?php echo $form->textField($model,'ids'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->