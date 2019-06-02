<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */



?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'config-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row" style="display: none">
		<?php echo $form->label($model,'line', array('width'=>'120px')); ?>
		<?php echo $form->textField($model,'line'); ?>
		<?php echo $form->error($model,'line'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'version_db', array('width'=>'120px')); ?>
		<?php echo $form->textField($model,'version_db', array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'version_db'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jigging', array('width'=>'120px')); ?>
		<?php echo $form->textField($model,'jigging'); ?>
		<?php echo $form->error($model,'jigging'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copulation', array('width'=>'120px')); ?>
		<?php echo $form->textField($model,'copulation'); ?>
		<?php echo $form->error($model,'copulation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_copulation', array('width'=>'120px')); ?>
		<?php echo $form->textField($model,'first_copulation'); ?>
		<?php echo $form->error($model,'first_copulation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fatten', array('width'=>'120px')); ?>
		<?php echo $form->textField($model,'fatten'); ?>
		<?php echo $form->error($model,'fatten'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->