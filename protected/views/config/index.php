<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
	'Настройки'=>array('index'),
//	$model->version_db,
);

$this->menu=array(
	array('label'=>'List Config', 'url'=>array('index')),
	array('label'=>'Update Config', 'url'=>array('update', 'id'=>$model->version_db)),
);
?>

<h1>View Config #<?php echo $model->version_db; ?></h1>

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
