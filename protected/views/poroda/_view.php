<?php
/* @var $this PorodaController */
/* @var $data Poroda */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idp')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idp), array('view', 'id'=>$data->idp)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('poroda')); ?>:</b>
	<?php echo CHtml::encode($data->poroda); ?>
	<br />


</div>