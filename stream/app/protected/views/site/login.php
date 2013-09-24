<section class="glc-header-streamer bl-conteudo">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<h1>Login</h1>
			</div>
		</div>
	</div>
</section>
<section class="glc-bar">
	<div class="container">
		<div class="row-fluid bl-bar">
			<div class="span9">
				<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
					'links'=>array( 
						'Login',
					)
				)); ?>
			</div>
			<div class="span3">
				<div class="compartilhamento">
					<?php $this->widget('yii-sharrre.widgets.WSocialShare', array(
							'htmlOptions' => array('id' => 'social-top-container','class'=>'demo5 pull-left'),
							'elementId' => 'social-top',
							'dataUrl' => '/',
							'socials' => array(
							'facebook' => true,
							'googlePlus' => true,
							'twitter' => true,
							'digg' => false,
							'delicious' => false,
							'stumbleupon' => false,
							'linkedin' => false,
							'pinterest' => false
						),
					)); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="glc-body-streamer bl-conteudo">
	<div class="container">	
		<div class="row-fluid">
			<div class="span12">
				<div class="form">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'login-form',
						'enableClientValidation'=>true,
						'clientOptions'=>array(
							'validateOnSubmit'=>true,
						),
					)); ?>
					
						<p class="note">Fields with <span class="required">*</span> are required.</p>
					
						<div class="row-fluid">
							<?php echo $form->labelEx($model,'username'); ?>
							<?php echo $form->textField($model,'username'); ?>
							<?php echo $form->error($model,'username'); ?>
						</div>
					
						<div class="row-fluid">
							<?php echo $form->labelEx($model,'password'); ?>
							<?php echo $form->passwordField($model,'password'); ?>
							<?php echo $form->error($model,'password'); ?>
							<p class="hint">
								Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
							</p>
						</div>
					
						<div class="row-fluid rememberMe">
							<?php echo $form->checkBox($model,'rememberMe'); ?>
							<?php echo $form->label($model,'rememberMe'); ?>
							<?php echo $form->error($model,'rememberMe'); ?>
						</div>
					
						<div class="row-fluid buttons">
							<?php echo CHtml::submitButton('Login', array('class'=>'btn btn-large btn-primary')); ?>
						</div>
					
					<?php $this->endWidget(); ?>
				</div>
			</div>
		</div>
	</div>
</section>