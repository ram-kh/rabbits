<?php
/* @var $this PorodaController */
/* @var $model Poroda */

$this->breadcrumbs=array(
	'Porodas'=>array('index'),
	$model->idp=>array('view','id'=>$model->idp),
	'Update',
);

$this->menu=array(
	array('label'=>'List Poroda', 'url'=>array('index')),
	array('label'=>'Create Poroda', 'url'=>array('create')),
	array('label'=>'View Poroda', 'url'=>array('view', 'id'=>$model->idp)),
	array('label'=>'Manage Poroda', 'url'=>array('admin')),
);
?>

<h1>Update Poroda <?php echo $model->idp; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>