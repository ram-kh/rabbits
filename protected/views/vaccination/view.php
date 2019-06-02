<?php
/* @var $this VaccinationController */
/* @var $model Vaccination */

$this->breadcrumbs=array(
	'Vaccinations'=>array('index'),
	$model->idv,
);

$this->menu=array(
	array('label'=>'List Vaccination', 'url'=>array('index')),
	array('label'=>'Create Vaccination', 'url'=>array('create')),
	array('label'=>'Update Vaccination', 'url'=>array('update', 'id'=>$model->idv)),
	array('label'=>'Delete Vaccination', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idv),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vaccination', 'url'=>array('admin')),
);
?>

<h1>View Vaccination #<?php echo $model->idv; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idv',
		'idva',
		'idr',
		'date',
	),
)); ?>
