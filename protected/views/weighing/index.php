<?php
/* @var $this WeighingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Weighings',
);

$this->menu=array(
	array('label'=>'Create Weighing', 'url'=>array('create')),
	array('label'=>'Manage Weighing', 'url'=>array('admin')),
);
?>

<h1>Weighings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
