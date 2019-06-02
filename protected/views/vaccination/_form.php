<?php
/* @var $this VaccinationController */
/* @var $model Vaccination */
/* @var $form CActiveForm */

	$vaccine = Vaccine::model()->findAll();
	$vaccine = CHtml::listData($vaccine,'idva','vaccine');
	asort($vaccine);
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vaccination-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));
?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->label($model,'idva'); ?>
		<?php echo $form->dropDownList($model,'idva',$vaccine); ?>
		<?php echo $form->error($model,'idva'); ?>
	</div>

	<div class="row" style="display: none">
		<?php echo $form->label($model,'idr'); ?>
		<?php echo $form->textField($model,'idr'); ?>
		<?php echo $form->error($model,'idr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>

        <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => 'date',
                'model' => $model,
                'attribute' => 'date',
                'language' => 'ru',
                'options' => array(
                    'showAnim' => 'fold',
                ),
                'htmlOptions' => array(
                    //               'style' => 'height: 15px',
                ),
            ));
        ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->