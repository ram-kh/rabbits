<?php
/* @var $this CopulationsController */
/* @var $model Copulations */
/* @var $form CActiveForm */

if (isset($_REQUEST['idr_m'])) {$model->idr_m = $_REQUEST['idr_m'];}

?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'copulations-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));

	$kroliki = Rabbits::model()->findAll('(ids=:ids1 OR ids=:ids2) AND sex=:sex AND ida=:ida', array(
            ':sex'=>2,  // кролы
			':ids1'=>2, // рабочий
			':ids2'=>3, // племенной
			':ida'=>0   // не в архиве
		)
	);

	$kroliha = Rabbits::model()->findByPk($model->idr_m);

    $list = CHtml::listData($kroliki,'idr','name');
	$list[0] = 'Сторонний самец';
?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->label($model,'idr_m'); ?>
		<b><?php echo $kroliha->name; ?></b>
		<?php echo $form->textField($model,'idr_m',array(
			'value'=>$kroliha->idr,
			'hidden'=>'hidden',
		)); ?>
		<?php echo $form->error($model,'idr_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idr_f'); ?>

		<?php echo $form->dropDownList($model,'idr_f',$list);?>
		<?php echo $form->error($model,'idr_f'); ?>
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

		<?php // echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>


	<div class="row" >
        <?php echo $form->label($model,'morning'); ?>
        <?php echo $form->checkBox($model,'morning'); ?>
    </div>
    <div class="row" >
        <?php echo $form->label($model,'meal'); ?>
        <?php echo $form->checkBox($model,'meal'); ?>
    <div class="row" >
        <?php echo $form->label($model,'evening'); ?>
        <?php echo $form->checkBox($model,'evening'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50, 'maxlength'=>255)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить случку' : 'Сохранить случку'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->