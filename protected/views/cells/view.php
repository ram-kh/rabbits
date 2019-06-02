<?php
/* @var $this CellsController */
/* @var $model Cells */

$this->breadcrumbs=array(
	'Cells'=>array('index'),
	$model->idce,
);

$this->menu=array(
	array('label'=>'List Cells', 'url'=>array('index')),
	array('label'=>'Create Cells', 'url'=>array('create')),
	array('label'=>'Update Cells', 'url'=>array('update', 'id'=>$model->idce)),
	array('label'=>'Delete Cells', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idce),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cells', 'url'=>array('admin')),
);
?>

<h1>View Cells #<?php echo $model->idce; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idce',
	),
)); ?>
