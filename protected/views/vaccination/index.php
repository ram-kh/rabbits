<?php
/* @var $this VaccinationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vaccinations',
);

$this->menu=array(
	array('label'=>'Create Vaccination', 'url'=>array('create')),
	array('label'=>'Manage Vaccination', 'url'=>array('admin')),
);
?>

<h1>Vaccinations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
