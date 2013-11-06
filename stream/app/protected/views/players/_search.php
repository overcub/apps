<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'id_user',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>400)); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'group',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'gender',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'birthdate',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'extra',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

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
