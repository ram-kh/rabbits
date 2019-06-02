<?php
/* @var $this CopulationsController */
/* @var $model Copulations */

$rab = Rabbits::model()->findByPk($model->idr_m);

$this->breadcrumbs=array(
	'Кролики'=>array('./rabbits/index'),
	$rab->name=>array('./rabbits/' . $model->idr_m),
	'Редактирование случки',
);

$this->menu=array(
	array('label'=>'List Copulations', 'url'=>array('index')),
	array('label'=>'Create Copulations', 'url'=>array('create')),
	array('label'=>'View Copulations', 'url'=>array('view', 'id'=>$model->idco)),
	array('label'=>'Manage Copulations', 'url'=>array('admin')),
);
?>

<h3>Редактирование случки для кролихи <?php echo $rab->name ?></h3>

<?php $this->renderPartial('_form', array(
			'model'=>$model
		)); ?>