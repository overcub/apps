<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('excerpt')); ?>:</b>
	<?php echo CHtml::encode($data->excerpt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skills')); ?>:</b>
	<?php echo CHtml::encode($data->skills); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abilities')); ?>:</b>
	<?php echo CHtml::encode($data->abilities); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('skins')); ?>:</b>
	<?php echo CHtml::encode($data->skins); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mixData')); ?>:</b>
	<?php echo CHtml::encode($data->mixData); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updateTime')); ?>:</b>
	<?php echo CHtml::encode($data->updateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createTime')); ?>:</b>
	<?php echo CHtml::encode($data->createTime); ?>
	<br />

	*/ ?>

</div>