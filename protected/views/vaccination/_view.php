<?php
/* @var $this VaccinationController */
/* @var $data Vaccination */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idv')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idv), array('view', 'id'=>$data->idv)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idva')); ?>:</b>
	<?php echo CHtml::encode($data->idva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idr')); ?>:</b>
	<?php echo CHtml::encode($data->idr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />


</div>