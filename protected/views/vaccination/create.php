<?php
/* @var $this VaccinationController */
/* @var $model Vaccination */

if (isset($_REQUEST['idr'])) { $model->idr = $_REQUEST['idr']; }

$this->breadcrumbs=array(
	'Кролики'=>array('/rabbits/work'),
	Rabbits::model()->findByPk($model->idr)->name=>array('/','rabbits'=>$model->idr),
	'Редактирование вакцинации',
);

$this->menu=array();

?>

<h3>Добавление вакцинации <?php // echo Rabbits::model()->findByPk($model->idr)->name; ?> </h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>