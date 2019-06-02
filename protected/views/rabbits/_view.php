<?php
/* @var $this RabbitsController */
/* @var $data Rabbits */
/* @var $model Rabbits */

	$this->breadcrumbs=array(
		'Кролики'=>array('index'),
		$data->name,
	);

	$this->menu=array(
	array('label'=>'Список кроликов', 'url'=>array('index')),
	array('label'=>'Добавить кролика', 'url'=>array('create')),
	array('label'=>'Редактировать кролика', 'url'=>array('update', 'id'=>$model->idr)),
	array('label'=>'Удалить кролика', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idr),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Rabbits', 'url'=>array('admin')),
	);
?>

<FIELDSET>
        <LEGEND>
            <h3>Карта кролика (<a href="update/<?php echo $data->idr ?>">Изменить</a>)</h3>
        </LEGEND>

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('idp')); ?>:</b>
    <?php echo CHtml::encode($data->poroda->poroda); ?>
    <br />

    <b><?php echo 'Статус'; ?>:</b>
    <?php echo CHtml::encode($data->status->status); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('idce')); ?>:</b>
    <?php echo CHtml::encode($data->idce); ?>
    <br /><br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_r')); ?>:</b>
    <?php
            echo CHtml::encode($data->date_r);
            echo ' (возраст: '. $data->vozrast .')';

    ?>
	<br />

	<?php  if ($data->date_arh <>'01.01.1970') { ?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('date_arh')); ?>:</b>
		<?php echo CHtml::encode($data->date_arh); ?>
		<br />
	<?php } ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('idr_m')); ?>:</b>
    <?php
        if ($data->idr_m > 0) {
            $rab = Rabbits::model()->findByPk($data->idr_m);
            echo $rab->name .' (' . $rab->poroda->poroda . ')' ;
        } else {
            echo 'неизвестна';
        }

    ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('idr_f')); ?>:</b>
    <?php
        if ($data->idr_f > 0) {
            $rab = Rabbits::model()->findByPk($data->idr_f);
            echo $rab->name .' (' . $rab->poroda->poroda . ')' ;

        } else {
            echo 'неизвестна';
        }

    ?>

    <br />

</FIELDSET>

