<?php
/* @var $this RabbitsController */
/* @var $model Rabbits */

$this->breadcrumbs=array(
	'Кролики'=>array('work'),
	'Архив кроликов',
);

$this->menu=array(
//	array('label'=>'List Rabbits', 'url'=>array('index')),
	array('label'=>'Добавить кролика', 'url'=>array('create')),
    array('label'=>'Рабочие кролики', 'url'=>array('work')),
    array('label'=>'Прочие кролики', 'url'=>array('other')),
);
?>

<h1>Архив кроликов</h1>

<p><?php
            echo CHtml::link('Рабочие кролики', './work');
            echo ' | ';
            echo CHtml::link('Прочие кролики', './other');
?></p>

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rabbits-grid',
	'dataProvider'=> $model->search('<>0', '>0'),
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
            'value' => '($data->sex==1) ? "Ж" : "М"',
            'htmlOptions' => array(
                'width' => '10px',
            ),
        ),
//		'date_r',
/*        array(
            'name' => 'date_r',
            'value' => '$data->date_r',
            'htmlOptions' => array(
                'width' => '70px',
            ),
        ),
*///		'date_arh',
        array(
            'name' => 'date_arh',
            'value' => '$data->date_arh',
            'htmlOptions' => array(
                'width' => '70px',
            ),
        ),
//        'vozrast',
/*        array(
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
*/      array(
            'name' => 'idp',
            'value' => '$data->poroda->poroda',
            'htmlOptions' => array(
                'width' => '200px',
            ),
        ),
//		'ids',
/*        array(
            'name' => 'ids',
            'value' => '$data->status->status',
            'htmlOptions' => array(
                'width' => '90px',
            ),
        ),
*///        'idce',
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>