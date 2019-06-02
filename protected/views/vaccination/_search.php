<?php
/* @var $this VaccinationController */
/* @var $model Vaccination */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idv'); ?>
		<?php echo $form->textField($model,'idv'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idva'); ?>
		<?php echo $form->textField($model,'idva'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idr'); ?>
		<?php echo $form->textField($model,'idr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->