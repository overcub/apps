<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'streamers-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_stream',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'id_players',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'mainStream',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'nickname',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'updateTime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'createTime',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
