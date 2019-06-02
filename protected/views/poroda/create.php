<?php
/* @var $this PorodaController */
/* @var $model Poroda */

$this->breadcrumbs=array(
	'Porodas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Poroda', 'url'=>array('index')),
	array('label'=>'Manage Poroda', 'url'=>array('admin')),
);
?>

<h1>Create Poroda</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>