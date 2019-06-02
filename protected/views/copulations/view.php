<?php
/* @var $this CopulationsController */
/* @var $model Copulations */

$this->breadcrumbs=array(
	'Copulations'=>array('index'),
	$model->idco,
);

$this->menu=array(
	array('label'=>'List Copulations', 'url'=>array('index')),
	array('label'=>'Create Copulations', 'url'=>array('create')),
	array('label'=>'Update Copulations', 'url'=>array('update', 'id'=>$model->idco)),
	array('label'=>'Delete Copulations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idco),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Copulations', 'url'=>array('admin')),
);
?>

<h1>View Copulations #<?php echo $model->idco; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idco',
		'idr_m',
		'idr_f',
		'date',
		'morning',
		'evening',
		'meal',
		'note',
	),
)); ?>
