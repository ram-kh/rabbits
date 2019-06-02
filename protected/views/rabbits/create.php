<?php
/* @var $this RabbitsController */
/* @var $model Rabbits */

$this->breadcrumbs=array(
	'Кролики'=>array('index'),
	'Добавление',
);

$this->menu=array(
);
?>

<?php $this->renderPartial('_form', array(
				'model'=>$model,
				'create'=>true,
                'update'=>false
			)
		); ?>