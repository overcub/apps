<section class="glc-user-edit-content">
	<div class="glc-user-edit-form">
		<div class="container">
			<div class="row-fluid">
				<div class="span12">
					<?php if(Yii::app()->user->hasFlash('success')):?>
						<div class="alert alert-success">
							<button data-dismiss="alert" class="close" type="button">×</button>
							<strong>Sucesso!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
						</div>
					<?php endif; ?>
					<ul class="nav nav-tabs" id="myTab">
			          <li class="active"><a data-toggle="tab" href="#seus-dados">Seus dados</a></li>
			          <li><a data-toggle="tab" href="#suas-imagens">Suas imagens</a></li>
			          <li><a data-toggle="tab" href="#widget-lol">League of Legends <span class="label">beta</span> </a></li>
			        </ul>
			        <div class="tab-content" id="myTabContent">
			          <div id="seus-dados" class="tab-pane fade in active">
			            <?php echo $this->renderPartial('_formEditUser',array('model'=>$model,'listGame'=>$listGame)); ?>
			          </div>
			          <div id="suas-imagens" class="tab-pane fade">
			            <?php echo $this->renderPartial('_formImageUser',array('model'=>$model,'image'=>$image)); ?>
			          </div>
			          <div id="widget-lol" class="tab-pane fade">
			            <?php echo $this->renderPartial('//lolPlayer/_formWidgetLOL',array('model'=>$lolPlayer)); ?>
			          </div>
			        </div>
				</div>
			</div>
		</div>
	</div>
</section>
