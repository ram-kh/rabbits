<script>
    function _actArch(value) {
        if (value!='01.01.1970') {
            jQuery('#arch').show(); // Показать дату архива
        } else {
            jQuery('#arch').hide();
        }
    }

    function _actVozrast(value) {
        var date1 = new Date(value.replace(/(\d+).(\d+).(\d+)/, '$3/$2/$1'));
        var delta = new Date() - date1;
//		var delta = date2 - date1;
		var vozrast = '';
		var y = delta/(1000*60*60*24*365.25);
		if (Math.floor(y)>0) {
			if (Math.floor(y)>4) {vozrast = Math.floor(y) + 'л ';}
			else {vozrast = Math.floor(y) + 'г ';}
		}
		var m = delta/(1000*60*60*24*30.4375);
		if (Math.floor(m)>0){
				vozrast = vozrast + (Math.floor(m) - 12 * Math.floor(y)) + 'м ';
		} else {
			if (Math.floor(y)>0) {
				vozrast = vozrast + '0м ';
			}
		}
		var d = delta/(1000*60*60*24);
		vozrast = vozrast + Math.floor(d - (Math.floor(m) - 12 * Math.floor(y))*30.4375 - Math.floor(y)*365.25) + 'д';
        document.getElementById('Rabbits_vozrast').value = vozrast;
		jQuery('#vozrast').show();
    }
</script>
<?php
/* @var $this RabbitsController */
/* @var $model Rabbits */
/* @var $form CActiveForm */

$krolihi = Rabbits::model()->findAll('(ids=:ids1 OR ids=:ids2) AND ida<:ida AND sex=:sex  AND idr<>:idr', array(
		':ids1' => 2,
		':ids2' => 3,
		':ida' => 1,
		':sex' => 1,
        ':idr' => !$create ? $model->idr : 0
	));
$krolihi = CHtml::listData($krolihi, 'idr', 'name');
$krolihi[0] = '- Неизвестна -';
asort($krolihi);

$kroly = Rabbits::model()->findAll('(ids=:ids1 OR ids=:ids2) AND ida<:ida AND sex=:sex AND idr<>:idr', array(
		':ids1' => 2,
		':ids2' => 3,
		':ida' => 1,
		':sex' => 2,
        ':idr' => !$create ? $model->idr : 0
	));
$kroly = CHtml::listData($kroly, 'idr', 'name');
$kroly[0] = '- Неизвестна -';
asort($kroly);

$poroda = Poroda::model()->findAll();
$poroda = CHtml::listData($poroda,'idp','poroda');
asort($poroda);

$kletki = Cells::model()->findAll();
$kletki = CHtml::listData($kletki,'idce','idce');

$status = Status::model()->findAll();
$status = CHtml::listData($status,'ids','status');

$archive = Archive::model()->findAll();
$archive = CHtml::listData($archive,'ida','archive');

$now = new DateTime();
$now = $now->format('d.m.Y');

if ($create) {
	$model->date_r = $now;
	$model->date_arh = '01.01.1970';
}
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rabbits-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_r'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name' => 'date_r',
			'model' => $model,
			'attribute' => 'date_r',
			'language' => 'ru',
			'options' => array(
				'showAnim' => 'fold',
			),
			'htmlOptions' => array(
                'onchange' =>'_actVozrast(this.value);'
				//               'style' => 'height: 15px',
			),
		));
		?>
		<?php echo $form->error($model,'date_r'); ?>
	</div>

    <div class="row" id="vozrast" <?php if ($create) echo 'style="display: none;"'; ?> >
        <?php echo $form->label($model,'vozrast'); ?>
        <?php echo $form->textField($model,'vozrast', array(
            'disabled' => 'disabled'
        )); ?>
    </div>

	<div class="row" <?php if ($create) echo 'style="display: none;"'; ?> >
		<?php echo $form->label($model,'date_arh'); ?>
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'name' => 'date_arh',
					'model' => $model,
					'attribute' => 'date_arh',
					'language' => 'ru',
					'options' => array(
						'showAnim' => 'fold',
					),
					'htmlOptions' => array(
                        'onchange' =>'_actArch(this.value);'
						//               'style' => 'height: 15px',
					),
				));
		?>
		<p>* При внесении даты архива, кролик перейдет в архив. У неархивного кролика оставьте 01.01.1970</p>
		<?php echo $form->error($model,'date_arh'); ?>
	</div>

    <div class="row" id="arch" <?php if ($model->date_arh == '01.01.1970' or $create) { echo 'style="display: none;"';} ?> >
        <?php echo $form->label($model,'ida'); ?>
        <?php echo $form->dropDownList($model,'ida',$archive); ?>
        <?php echo $form->error($model,'ida'); ?>
    </div>

	<div class="row">
		<?php echo $form->label($model,'sex'); ?>
		<?php echo $form->dropDownList($model,'sex',array('1'=>'Ж','2'=>'М')); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

		<div class="row">
		<?php echo $form->label($model,'idr_m'); ?>
		<?php echo $form->dropDownList($model,'idr_m',$krolihi); ?>
		<?php echo $form->error($model,'idr_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idr_f'); ?>
		<?php echo $form->dropDownList($model,'idr_f',$kroly); ?>
		<?php echo $form->error($model,'idr_f'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idce'); ?>
		<?php echo $form->dropDownList($model,'idce',$kletki); ?>
		<?php echo $form->error($model,'idce'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idp'); ?>
		<?php echo $form->dropDownList($model,'idp',$poroda); ?>
		<?php echo $form->error($model,'idp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ids'); ?>
		<?php echo $form->dropDownList($model,'ids',$status); ?>
		<?php echo $form->error($model,'ids'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->