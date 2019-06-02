<?php
/* @var $this WeighingController */
/* @var $model Weighing */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'weighing-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idw'); ?>
		<?php echo $form->textField($model,'idw'); ?>
		<?php echo $form->error($model,'idw'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idr'); ?>
		<?php echo $form->textField($model,'idr'); ?>
		<?php echo $form->error($model,'idr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_w'); ?>
		<?php echo $form->textField($model,'date_w'); ?>
		<?php echo $form->error($model,'date_w'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight'); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->