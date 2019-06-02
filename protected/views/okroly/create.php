<?php
/* @var $this OkrolyController */
/* @var $model Okroly */

$this->breadcrumbs=array(
	'Кролики'=>array('/rabbits/work'),
	Rabbits::model()->findByPk($_REQUEST['idr_m'])->name=>array('/','rabbits'=>$_REQUEST['idr_m']),
	'Добавление окрола',

);

$this->menu=array();

if (isset($_REQUEST['idr_m'])) {$model->idr_m = $_REQUEST['idr_m'];}

?>

<h3>Добавление окрола кролихи <?php echo Rabbits::model()->findByPk($model->idr_m)->name; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>