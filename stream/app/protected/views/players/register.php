<div class="glc-cadastro">
	<section class="glc-header-streamer">
		<div class="container">
			<div class="row-fluid">
				<div class="span12">
					<h1>Cadastro</h1>
				</div>
			</div>
		</div>
	</section>
	<section class="glc-body-register">
		<div class="container">
			<div class="row-fluid">
				<?php echo $this->renderPartial('_formRegister', array('model'=>$model)); ?>
			</div>
		</div>
	</section>
</div>