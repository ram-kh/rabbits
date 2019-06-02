<?php
/* @var $this OkrolyController */
/* @var $model Okroly */

$this->breadcrumbs=array(
);

$this->menu=array();
?>

<h1>View Okroly #<?php echo $model->ido; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ido',
		'idco',
		'idr_m',
		'idr_f',
		'date',
		'jigging',
		'born',
		'died',
		'reared',
		'note',
	),
)); ?>
