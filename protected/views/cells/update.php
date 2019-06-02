<?php
/* @var $this CellsController */
/* @var $model Cells */

$this->breadcrumbs=array(
	'Cells'=>array('index'),
	$model->idce=>array('view','id'=>$model->idce),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cells', 'url'=>array('index')),
	array('label'=>'Create Cells', 'url'=>array('create')),
	array('label'=>'View Cells', 'url'=>array('view', 'id'=>$model->idce)),
	array('label'=>'Manage Cells', 'url'=>array('admin')),
);
?>

<h1>Update Cells <?php echo $model->idce; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>