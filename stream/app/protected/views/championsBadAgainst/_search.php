<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'id_champions',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'id_champions_badagainst',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'points',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'excerpt',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'mixData',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'updateTime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'createTime',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
