<?php
/* @var $this ConfigController */
/* @var $data Config */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('version_db')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->version_db), array('view', 'id'=>$data->version_db)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('line')); ?>:</b>
	<?php echo CHtml::encode($data->line); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jigging')); ?>:</b>
	<?php echo CHtml::encode($data->jigging); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('copulation')); ?>:</b>
	<?php echo CHtml::encode($data->copulation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_copulation')); ?>:</b>
	<?php echo CHtml::encode($data->first_copulation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fatten')); ?>:</b>
	<?php echo CHtml::encode($data->fatten); ?>
	<br />


</div>