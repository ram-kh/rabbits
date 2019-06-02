<?php
/* @var $this WeighingController */
/* @var $model Weighing */

$this->breadcrumbs=array(
	'Weighings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Weighing', 'url'=>array('index')),
	array('label'=>'Manage Weighing', 'url'=>array('admin')),
);
?>

<h1>Create Weighing</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>