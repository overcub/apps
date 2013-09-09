<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_stream')); ?>:</b>
	<?php echo CHtml::encode($data->id_stream); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_players')); ?>:</b>
	<?php echo CHtml::encode($data->id_players); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mainStream')); ?>:</b>
	<?php echo CHtml::encode($data->mainStream); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nickname')); ?>:</b>
	<?php echo CHtml::encode($data->nickname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updateTime')); ?>:</b>
	<?php echo CHtml::encode($data->updateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createTime')); ?>:</b>
	<?php echo CHtml::encode($data->createTime); ?>
	<br />


</div>