<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'players-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions' => array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>true,
		'validateOnType'=>true,
		'afterValidate' => 'js:function(form, data, hasError) { 
            if(hasError) {
                return false;
            }else {
                return true;
            }
        }'
	),
)); ?>
<fieldset>
    <legend>Seus dados <small>Campos obrigatórios <span class="required">*</span></small></legend>
	
	<?php echo $form->errorSummary($model,"Ocorreu um erro ao tentar salvar seus dados."); ?>
	
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','placeholder'=>'Seu nome')); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','placeholder'=>'Seu username','maxlength'=>255)); ?>
	
	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','placeholder'=>'Seu e-mail','maxlength'=>400)); ?>

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
		<label for="Players_descriptionStream" class="control-label required">descrição</label>
		<div class="controls">
			<textarea rows="3" value="<?php echo $model->getExtraData('descriptionStream')?>" id="Players_descriptionStream" name="extra[descriptionStream]" maxlength="500" class="span5" autocomplete="off" placeholder="Descrição do seu stream"><?php echo $model->getExtraData('descriptionStream')?></textarea>
		</div>
	</div>

	<div class="control-group">
		<label for="Players_twichtv_username" class="control-label required">twichtv</label>
		<div class="controls">
			<input type="text" value="<?php echo $model->getExtraData('twichtv')?>" id="Players_twichtv_username" name="extra[twichtv]" maxlength="500" class="span5" autocomplete="off" placeholder="Seu username cadastrado no twitch.tv" />
			<p>
               <span class="label label-info">Info</span> Não é cadastrado no twitch.tv <a target="_blank" href="http://twitch.tv">clique aqui</a>.
            </p>
		</div>
	</div>
	<?php /*
	<div class="control-group">
		<label for="Players_games" class="control-label required">games</label>
		<div class="controls">
			<input class="span5" name="extra[games]" autocomplete="off" id="glc-games" type="text" placeholder="seu game" data-role="tagsinput" value="<?php echo $model->getExtraData('games')?>"/>
			<p>
               <span class="label label-info">Info</span> Não achou o seu game? <a target="_blank" href="mailto:geeklifeclub@gmail.com">Fale conosco</a>.
            </p>
		</div>
	</div>
	*/
	?>
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
	
	<?php echo $form->textFieldRow($model,'birthdate',array('class'=>'span5','placeholder'=>'yyyy-mm-dd')); ?>
	
	
	<legend>Aba de conteúdo <small>Bem vindo(a) a stream do ..."</small></legend>

	<div class="control-group">
		<label for="Players_textStream" class="control-label required">Html</label>
		<div class="controls">
			<textarea rows="5" id="Players_textStream" name="extra[textStream]" maxlength="500" class="span5" autocomplete="off" placeholder="HTML para aba sobre você..."><?php echo $model->getExtraData('textStream')?></textarea>
			 <?php 
			 $this->widget('ImperaviRedactorWidget', array(
                // You can either use it for model attribute
                //'id' => "Players_textStream",
                //'name' => "extra[textStream]",
                'selector' => '#Players_textStream',
                // or just for input field
                //'name' => 'my_input_name',

                // Some options, see http://imperavi.com/redactor/docs/
                'options' => array(
                	'class' => 'span8',
                    'lang' => 'pt_br',
                    'toolbar' => false,
                    'iframe' => false,
                    'css' => 'wym.css',
                ),
            ));
            ?>
		</div>
	</div>

	<legend>Aba de conteúdo <small>"Aulas de LoL - ..."</small></legend>

	<div class="control-group">
		<label for="Players_textClassStream" class="control-label required">Html</label>
		<div class="controls">
			<textarea rows="5" id="Players_textClassStream" name="extra[textClassStream]" maxlength="500" class="span5" autocomplete="off" placeholder="HTML para aba de aulas..."><?php echo $model->getExtraData('textClassStream')?></textarea>
			 <?php $this->widget('ImperaviRedactorWidget', array(
                // You can either use it for model attribute
                //'id' => "Players_textStream",
                //'name' => "extra[textStream]",
                'selector' => '#Players_textClassStream',
                // or just for input field
                //'name' => 'my_input_name',

                // Some options, see http://imperavi.com/redactor/docs/
                'options' => array(
                	'class' => 'span8',
                    'lang' => 'pt_br',
                    'toolbar' => false,
                    'iframe' => false,
                    'css' => 'wym.css',
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
<script type="text/javascript">
$(function()
        {
            $('#Players_textStream').redactor({
                //buttons: ['html', 'bold', 'italic', 'link', 'image'],
                //buttonsAdd: ['insertArticle']
            });
            $('#Players_textClassStream').redactor({
               // buttons: ['html', 'bold', 'italic'],
               // linebreaks: true
            });
        });
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