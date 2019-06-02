<?php
/* @var $this StatusController */
/* @var $model Status */

$this->breadcrumbs=array(
	'Statuses'=>array('index'),
	$model->ids=>array('view','id'=>$model->ids),
	'Update',
);

$this->menu=array(
	array('label'=>'List Status', 'url'=>array('index')),
	array('label'=>'Create Status', 'url'=>array('create')),
	array('label'=>'View Status', 'url'=>array('view', 'id'=>$model->ids)),
	array('label'=>'Manage Status', 'url'=>array('admin')),
);
?>

<h1>Update Status <?php echo $model->ids; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>