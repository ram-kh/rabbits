<?php
/* @var $this CopulationsController */
/* @var $model Copulations */

$this->breadcrumbs=array(
	'Кролики'=>array('/rabbits/work'),
	Rabbits::model()->findByPk($_REQUEST['idr_m'])->name=>array('/','rabbits'=>$_REQUEST['idr_m']),
	'Добавление случки',
);

$this->menu=array(
);
?>

<h2>Добавить случку</h2>

<?php $this->renderPartial('_form', array(
		'model'=>$model,
		'idr_m'=>$_REQUEST['idr_m']
	));
?>