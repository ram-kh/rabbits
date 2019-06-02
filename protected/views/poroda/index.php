<?php
/* @var $this PorodaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Porodas',
);

$this->menu=array(
	array('label'=>'Create Poroda', 'url'=>array('create')),
	array('label'=>'Manage Poroda', 'url'=>array('admin')),
);
?>

<h1>Porodas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
