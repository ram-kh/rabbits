<?php
/* @var $this RabbitsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rabbits',
);

$this->menu=array(
	array('label'=>'Create Rabbits', 'url'=>array('create')),
	array('label'=>'Manage Rabbits', 'url'=>array('admin')),
);
?>

<h1>Rabbits</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
