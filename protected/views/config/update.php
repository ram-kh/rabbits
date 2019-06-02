<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
	'Настройки'=>array('index'),
	'Редактирование',
);

$this->menu=array(

);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>