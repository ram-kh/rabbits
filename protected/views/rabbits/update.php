<?php
/* @var $this RabbitsController */
/* @var $model Rabbits */

$this->breadcrumbs=array(
	'Кролики'=>array('index'),
	$model->name=>array('view','id'=>$model->idr),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список кроликов', 'url'=>array('index')),
	array('label'=>'Добавить кролика', 'url'=>array('create')),
	array('label'=>'Карта кролика', 'url'=>array('view', 'id'=>$model->idr)),
	array('label'=>'Удалить кролика', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idr),'confirm'=>'Вы уверены, что хотите удалить этого кролика?')),
//	array('label'=>'Manage Rabbits', 'url'=>array('admin')),
);
?>

<h3>Редактирование кролика </h3>

<?php $this->renderPartial('_form', array(
				'model'=>$model,
				'update'=>true,
				'create'=>false
			)
		); ?>