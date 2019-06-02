<?php
/* @var $this RabbitsController */
/* @var $model Rabbits */

$this->breadcrumbs=array(
	'Кролики'=>array('index'),
	'Список кроликов',
);

$this->menu=array(
//	array('label'=>'List Rabbits', 'url'=>array('index')),
	array('label'=>'Добавить кролика', 'url'=>array('create')),
    array('label'=>'Рабочие кролики', 'url'=>array('work')),
    array('label'=>'Прочие кролики', 'url'=>array('other')),
    array('label'=>'Архив кроликов', 'url'=>array('archive')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#rabbits-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h1>Список кроликов</h1>

<p><?php    echo CHtml::link('Рабочие кролики', './work');
            echo ' | ';
            echo CHtml::link('Прочие кролики', './other');
            echo ' | ';
            echo CHtml::link('Архив кроликов', './archive');
?></p>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));
?>

</div><!-- search-form -->

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rabbits-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'idr',
//		'name',
        array(
            'name' => 'name',
            'value' => '$data->name',
            'htmlOptions' => array(
                'width' => '120px',
            ),
        ),
        array(
            'name' => 'sex',
            'value' => '($data->sex==1) ? "Самка" : "Самец"',
            'htmlOptions' => array(
                'width' => '50px',
            ),
        ),
//		'date_r',
        array(
            'name' => 'date_r',
            'value' => '$data->date_r',
            'htmlOptions' => array(
                'width' => '70px',
            ),
        ),
//		'date_arh',
//        'vozrast',
        array(
            'name' => 'date_arh',
            'value' => '($data->date_arh=="01.01.1970") ? " " : $data->date_arh',
            'htmlOptions' => array(
                'width' => '70px',
                'visibility'=>'collapse',
            ),
        ),
//		'sex',


//		'ida',
//		'idr_m',
//		'idr_f',
//		'idce',
//		'idp',
        array(
            'name' => 'idp',
            'value' => '$data->poroda->poroda',
            'htmlOptions' => array(
                'width' => '120px',
            ),
        ),
//		'ids',
        array(
            'name' => 'ids',
            'value' => '$data->status->status',
            'htmlOptions' => array(
                'width' => '90px',
            ),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
