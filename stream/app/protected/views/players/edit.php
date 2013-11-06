<div class="container">
	<h1>Seus dados:</h1>
	<div class="row-fluid">
		<div class="span12">
			<?php echo $this->renderPartial('_formEditUser',array('model'=>$model)); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php echo $this->renderPartial('_formImageUser',array('model'=>$model,'image'=>$image)); ?>
		</div>
	</div>
</div>
