<?php
/* @var $this PorodaController */
/* @var $model Poroda */

$this->breadcrumbs=array(
	'Porodas'=>array('index'),
	$model->idp,
);

$this->menu=array(
	array('label'=>'List Poroda', 'url'=>array('index')),
	array('label'=>'Create Poroda', 'url'=>array('create')),
	array('label'=>'Update Poroda', 'url'=>array('update', 'id'=>$model->idp)),
	array('label'=>'Delete Poroda', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idp),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Poroda', 'url'=>array('admin')),
);
?>

<h1>View Poroda #<?php echo $model->idp; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idp',
		'poroda',
	),
)); ?>
