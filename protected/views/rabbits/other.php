<?php
/* @var $this RabbitsController */
/* @var $model Rabbits */

$this->breadcrumbs=array(
	'Кролики'=>array('work'),
	'Прочие кролики',
);

$this->menu=array(
//	array('label'=>'List Rabbits', 'url'=>array('index')),
	array('label'=>'Добавить кролика', 'url'=>array('create')),
    array('label'=>'Рабочие кролики', 'url'=>array('work')),
    array('label'=>'Архив кроликов', 'url'=>array('archive')),
);
?>

<h1>Прочие кролики</h1>

<p><?php
            echo CHtml::link('Рабочие кролики', './work');
            echo ' | ';
            echo CHtml::link('Архив кроликов', './archive');
?></p>

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rabbits-grid',
	'dataProvider'=> $model->search('<>3 AND ids<>2', '< 1'),
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
            'name' => 'vozrast',
            'value' => '$data->vozrast',
            'htmlOptions' => array(
                'width' => '70px',
//                'visibility'=>'collapse',
            ),
        ),
//		'sex',


//		'ida',
//		'idr_m',
//		'idr_f',
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
//        'idce',
        array(
            'name' => 'idce',
            'value' => '$data->cell->cell',
            'htmlOptions' => array(
//                'width' => '90px',
            ),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>