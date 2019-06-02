<?php
/* @var $this CellsController */
/* @var $data Cells */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idce')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idce), array('view', 'id'=>$data->idce)); ?>
	<br />


</div>