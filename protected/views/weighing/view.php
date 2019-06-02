<?php
/* @var $this WeighingController */
/* @var $model Weighing */

$this->breadcrumbs=array(
	'Weighings'=>array('index'),
	$model->idw,
);

$this->menu=array(
	array('label'=>'List Weighing', 'url'=>array('index')),
	array('label'=>'Create Weighing', 'url'=>array('create')),
	array('label'=>'Update Weighing', 'url'=>array('update', 'id'=>$model->idw)),
	array('label'=>'Delete Weighing', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idw),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Weighing', 'url'=>array('admin')),
);
?>

<h1>View Weighing #<?php echo $model->idw; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idw',
		'idr',
		'date_w',
		'weight',
	),
)); ?>
