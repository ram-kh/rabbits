<?php
/* @var $this VaccinationController */
/* @var $model Vaccination */

$this->breadcrumbs=array(
	'Кролики'=>array('/rabbits/work'),
	Rabbits::model()->findByPk($model->idr)->name=>array('/','rabbits'=>$model->idr),
	'Редактирование вакцинации',
);

$this->menu=array(
    array('label'=>'Удалить вакцинацию', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idv),'confirm'=>'Вы уверены, что хотите удалить вакцинацию?')),
);


?>

<h3>Редактирование вакцинации <?php echo Rabbits::model()->findByPk($model->idr)->name; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>