<?php
/* @var $this PorodaController */
/* @var $model Poroda */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idp'); ?>
		<?php echo $form->textField($model,'idp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'poroda'); ?>
		<?php echo $form->textArea($model,'poroda',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->