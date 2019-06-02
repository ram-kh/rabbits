<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
	'Настройки'=>array('index'),
//	$model->version_db,
);

$this->menu=array(
//	array('label'=>'List Config', 'url'=>array('index')),
	array('label'=>'Изменить настройки', 'url'=>array('update', 'id'=>$model->version_db)),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'line',
		'version_db',
		'jigging',
		'copulation',
		'first_copulation',
		'fatten',
	),
)); ?>
