<?php
/* @var $this PorodaController */
/* @var $model Poroda */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'poroda-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idp'); ?>
		<?php echo $form->textField($model,'idp'); ?>
		<?php echo $form->error($model,'idp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poroda'); ?>
		<?php echo $form->textArea($model,'poroda',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'poroda'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->