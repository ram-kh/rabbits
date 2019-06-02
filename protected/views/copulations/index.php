<?php
/* @var $this CopulationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Copulations',
);

$this->menu=array(
	array('label'=>'Create Copulations', 'url'=>array('create')),
	array('label'=>'Manage Copulations', 'url'=>array('admin')),
);
?>

<h1>Copulations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
