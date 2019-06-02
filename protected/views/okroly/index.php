<?php
/* @var $this OkrolyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Okrolies',
);

$this->menu=array(
	array('label'=>'Create Okroly', 'url'=>array('create')),
	array('label'=>'Manage Okroly', 'url'=>array('admin')),
);
?>

<h1>Okrolies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
