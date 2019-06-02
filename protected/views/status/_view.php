<?php
/* @var $this StatusController */
/* @var $data Status */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ids')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ids), array('view', 'id'=>$data->ids)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>