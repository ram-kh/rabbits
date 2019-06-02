<?php
/* @var $this OkrolyController */
/* @var $data Okroly */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ido')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ido), array('view', 'id'=>$data->ido)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idco')); ?>:</b>
	<?php echo CHtml::encode($data->idco); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('jigging')); ?>:</b>
	<?php echo CHtml::encode($data->jigging); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('born')); ?>:</b>
	<?php echo CHtml::encode($data->born); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('died')); ?>:</b>
	<?php echo CHtml::encode($data->died); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reared')); ?>:</b>
	<?php echo CHtml::encode($data->reared); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	*/ ?>

</div>