<?php
/* @var $this OkrolyController */
/* @var $model Okroly */

$this->breadcrumbs=array(
	'Кролики'=>array('/rabbits/work'),
	Rabbits::model()->findByPk($model->idr_m)->name=>array('/','rabbits'=>$model->idr_m),
	'Редактирование окрола',
);

$this->menu=array();


?>

<h3>Редактирование окрола кролихи <?php echo Rabbits::model()->findByPk($model->idr_m)->name; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>