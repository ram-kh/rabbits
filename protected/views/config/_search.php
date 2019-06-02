<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'line'); ?>
		<?php echo $form->textField($model,'line'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'version_db'); ?>
		<?php echo $form->textField($model,'version_db'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jigging'); ?>
		<?php echo $form->textField($model,'jigging'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copulation'); ?>
		<?php echo $form->textField($model,'copulation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_copulation'); ?>
		<?php echo $form->textField($model,'first_copulation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fatten'); ?>
		<?php echo $form->textField($model,'fatten'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->