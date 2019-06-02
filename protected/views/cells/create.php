<?php
/* @var $this CellsController */
/* @var $model Cells */

$this->breadcrumbs=array(
	'Cells'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cells', 'url'=>array('index')),
	array('label'=>'Manage Cells', 'url'=>array('admin')),
);
?>

<h1>Create Cells</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>