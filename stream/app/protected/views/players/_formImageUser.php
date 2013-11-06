<fieldset>
    <legend>Suas Imagens</legend>
	<div class="row-fluid">
		<div class="span12">
			<label><span class="badge badge-inverse">1</span> Foto do seu perfil</label>
			<p><span class="label label-info">Info</span> Troque a foto do perfil no <a href="https://br.gravatar.com/">br.gravatar.com</a></p>
			<img alt="20x20" src="http://www.gravatar.com/avatar/<?php echo md5($model->email)?>?s=20">
			<img alt="40x40" src="http://www.gravatar.com/avatar/<?php echo md5($model->email)?>?s=40">
			<img alt="80x80" src="http://www.gravatar.com/avatar/<?php echo md5($model->email)?>?s=80">
			<img alt="160x160" src="http://www.gravatar.com/avatar/<?php echo md5($model->email)?>?s=160">
			<img alt="200x200" src="http://www.gravatar.com/avatar/<?php echo md5($model->email)?>?s=200">
		</div>
	</div>
</fieldset>
<fieldset>
<hr>
<div class="row-fluid">
	<div class="span12">
		<label><span class="badge badge-inverse">2</span> Imagem de fundo</label>
		<div id="players-default-cover" style="height: 300px; width: 100%; background: url(<?php echo $image?>) repeat center center;"></div>
		<?php
			$this->widget('xupload.XUpload', array(
				'url' => Yii::app()->createUrl("usuario/imagem-capa-upload"),
				'model' => $model,
				'formView' => 'formCoverImages',
				'attribute' => 'file',
				'multiple' => true,
				'previewImages' => false,
				'htmlOptions' => array(
					'id' => 'players-form-cover-images'
				),
				'autoUpload' => true,
				'options' => array(//Additional javascript options
					'singleFileUploads' => true,
					'limitConcurrentUploads' => '1',
	  				'done' => "js:function (e, data) {
	  					$('#Players_file').removeAttr('disabled');
						$('#players-default-cover').attr('style','height: 300px; width: 100%; background: url('+data.result[0].url+') repeat center center;');
				        $('#players-form-cover-images table.table-striped .template-upload').remove();
	                }"
	            ),
		));
		?>
	</div>
</div>
</fieldset>