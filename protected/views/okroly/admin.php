<?php
/* @var $this OkrolyController */
/* @var $model Okroly */

$this->breadcrumbs=array(
	'Okrolies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Okroly', 'url'=>array('index')),
	array('label'=>'Create Okroly', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#okroly-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Okrolies</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'okroly-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ido',
		'idco',
		'idr_m',
		'idr_f',
		'date',
		'jigging',
		/*
		'born',
		'died',
		'reared',
		'note',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
