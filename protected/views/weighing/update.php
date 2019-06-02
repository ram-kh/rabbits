<?php
/* @var $this WeighingController */
/* @var $model Weighing */

$this->breadcrumbs=array(
	'Weighings'=>array('index'),
	$model->idw=>array('view','id'=>$model->idw),
	'Update',
);

$this->menu=array(
	array('label'=>'List Weighing', 'url'=>array('index')),
	array('label'=>'Create Weighing', 'url'=>array('create')),
	array('label'=>'View Weighing', 'url'=>array('view', 'id'=>$model->idw)),
	array('label'=>'Manage Weighing', 'url'=>array('admin')),
);
?>

<h1>Update Weighing <?php echo $model->idw; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>