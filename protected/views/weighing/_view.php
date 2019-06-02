<?php
/* @var $this WeighingController */
/* @var $data Weighing */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idw')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idw), array('view', 'id'=>$data->idw)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idr')); ?>:</b>
	<?php echo CHtml::encode($data->idr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_w')); ?>:</b>
	<?php echo CHtml::encode($data->date_w); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />


</div>