<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'lol-player-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'id_players',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'accountId',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'summonerId',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'server',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'internalName',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'icon',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'level',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textAreaRow($model,'mixData',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

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
