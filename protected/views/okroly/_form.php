
<?php
/* @var $this OkrolyController */
/* @var $model Okroly */
/* @var $form CActiveForm */

	if (isset($_REQUEST['idco']))  {$model->idco = $_REQUEST['idco'];}
    if (isset($_REQUEST['idr_m'])) {$model->idr_m = $_REQUEST['idr_m'];}
    if (isset($_REQUEST['idr_f'])) {$model->idr_f = $_REQUEST['idr_f'];}

    $days = Config::model()->find()->jigging;
    $date1 = new DateTime( Copulations::model()->findByPk($model->idco)->date);
    $date1->modify('+30 days');
    $model->date = $date1->format('d.m.Y');
    $date2 = $date1->modify('+'. $days .' days');
    $model->jigging = $date2->format('d.m.Y');

?>

<script>
    function _actJigging(value, days) {
        var date = new Date(value.replace(/(\d+).(\d+).(\d+)/, '$3/$2/$1'))
        date.setDate(date.getDate()+ days);
        var dd = date.getDate();
        if (dd < 10) dd = '0' + dd;
        var mm = date.getMonth()+1;
        if (mm < 10) mm = '0' + mm;
        document.getElementById('Okroly_jigging').value = dd + '.' + mm + '.' + date.getFullYear();
    }

</script>


<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'okroly-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row" style="display: none">
		<?php echo $form->label($model,'idco'); ?>
		<?php echo $form->textField($model,'idco'); ?>
		<?php echo $form->error($model,'idco'); ?>
	</div>

	<div class="row" style="display: none">
		<?php echo $form->label($model,'idr_m'); ?>
		<?php echo $form->textField($model,'idr_m'); ?>
		<?php echo $form->error($model,'idr_m'); ?>
	</div>

	<div class="row" style="display: none">
		<?php echo $form->label($model,'idr_f'); ?>
		<?php echo $form->textField($model,'idr_f'); ?>
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
                    'onchange' =>"_actJigging(this.value, $days);"
                    //               'style' => 'height: 15px',
                ),
            ));
        ?>

		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row" style="display: none">
		<?php echo $form->label($model,'jigging'); ?>
		<?php echo $form->textField($model,'jigging'); ?>
		<?php echo $form->error($model,'jigging'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'born'); ?>
		<?php echo $form->textField($model,'born'); ?>
		<?php echo $form->error($model,'born'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'died'); ?>
		<?php echo $form->textField($model,'died'); ?>
		<?php echo $form->error($model,'died'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reared'); ?>
		<?php echo $form->textField($model,'reared'); ?>
		<?php echo $form->error($model,'reared'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->