<?php
/* @var $this CopulationsController */
/* @var $data Copulations */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idco')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idco), array('view', 'id'=>$data->idco)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idr_m')); ?>:</b>
	<?php echo CHtml::encode($data->idr_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idr_f')); ?>:</b>
	<?php echo CHtml::encode($data->idr_f); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('morning')); ?>:</b>
	<?php echo CHtml::encode($data->morning); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evening')); ?>:</b>
	<?php echo CHtml::encode($data->evening); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meal')); ?>:</b>
	<?php echo CHtml::encode($data->meal); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	*/ ?>

</div>