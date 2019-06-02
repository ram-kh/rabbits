<?php
/* @var $this CellsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cells',
);

$this->menu=array(
	array('label'=>'Create Cells', 'url'=>array('create')),
	array('label'=>'Manage Cells', 'url'=>array('admin')),
);
?>

<h1>Cells</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
