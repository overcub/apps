<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'players-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>
<fieldset>
    <legend>Seus dados <small>Campos obrigatórios <span class="required">*</span></small></legend>
	
	<?php echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>255)); ?>
	
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>400)); ?>

	<div id="players-link-newpassword" class="control-group fade in">
		<a href="#nova-senha" id="btn-players-form-newpassword" class="control-label">Alterar Minha senha</a>
	</div>

	<div id="players-form-newpassword" class="control-group fade hide">
		<label for="Players_newPassword" class="control-label required">Nova senha</label>
		<div class="controls">
			<input type="text" value="" id="Players_newPassword" name="Players[newPassword]" maxlength="500" class="span5" autocomplete="off" />
		</div>
	</div>
	
	<div class="control-group">
		<label for="Players_twichtv_username" class="control-label required">twichtv</label>
		<div class="controls">
			<input type="text" value="" id="Players_twichtv_username" name="extra[twichtv]" maxlength="500" class="span5" autocomplete="off" placeholder="Seu username cadastrado no twitch.tv" />
			<p>
               <span class="label label-info">Info</span> Não é cadastrado no twitch.tv <a target="_blank" href="http://twitch.tv">clique aqui</a>.
            </p>
		</div>
	</div>

	<script type="text/javascript">
	$(document).ready(function(){
		$('#btn-players-form-newpassword').on('click', function() {
			$('#players-link-newpassword').removeClass('in').addClass('hide');
			$('#players-form-newpassword').removeClass('hide').addClass('in');
		});

		$('#btn-cancel-players-form-newpassword').on('click', function() {
			$('#players-link-newpassword').removeClass('hide').addClass('in');
			$('#players-form-newpassword').removeClass('in').addClass('hide');
			$('#Players_newPassword').attr('value','');
		});
	});
	</script>

	<div class="control-group">
		<label for="Players_gender_option" class="control-label required">Sexo</label>
		<div class="controls">
			<div class="row-fluid">
				<?php echo $form->radioButton($model, 'gender', array('class'=>"pull-left",'id' => 'Players_gender_1', 'name' => 'grade', 'value'=>1, 'uncheckValue'=>null, 'onclick'=>"$('#Players_gender').val( $('input:radio:checked').val() ); ")); ?>
				<label for="masculino">masculino</label>
			</div>
			<div class="row-fluid">
				<?php echo $form->radioButton($model, 'gender', array('class'=>"pull-left",'id' => 'Players_gender_2', 'name' => 'grade', 'value'=>2, 'uncheckValue'=>null, 'onclick'=>"$('#Players_gender').val( $('input:radio:checked').val() ); ")); ?>
				<label for="feminino">feminino</label>
			</div>
			<?php echo $form->hiddenField($model, 'gender'); ?>
			<?php echo $form->error($model,'gender', array()); ?>
		</div>
	</div>

	<div class="control-group ">
		<label for="Players_birthdate" class="control-label">Data de Nascimento</label>
		<div class="controls">
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    //'name'=>'Players[birthdate]',
			    //'id'=>'user_Birthdate',
			    'model'=>$model,
			    'attribute' => 'birthdate',
			    // additional javascript options for the date picker plugin
			    'options'=>array(
			        'showAnim'=>'fold',
					'dateFormat' => 'yy-mm-dd',
			    ),
			    'htmlOptions'=>array(
			        'style'=>'height:20px;',
			
			    ),
			));
			?>
		</div>
	</div>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=> 'Save',
		)); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>
