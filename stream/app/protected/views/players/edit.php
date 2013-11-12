<section class="glc-user-edit-content">
	<div class="glc-header" style="background: url(<?php echo $model->getImageCover();?>) repeat center center;">
		<div class="container">
			<div class="row-fluid">
				<div class="span5">
	            	<img border="0" class="img-circle glc-image-profile pull-left" src="<?php echo $model->getImageProfile(80) ?>" alt="<?php echo $model->name ?>"/>
	                <h1><?php echo $model->username; ?></h1>
	                <h5><?php echo $model->name; ?></h5>
	                <hr>
	                <span class="label"><img width="20" height="20" src="/images/style/icon/game/icon-lol-40x40.gif"></span>
	                <span class="label"><img width="20" height="20" src="/images/style/icon/game/icon-wow-40x40.png"></span>
			    </div>
			    <div class="span2 offset5">
			    	<img border="0" class="img-polaroid" src="<?php echo $model->getImageProfile(80) ?>" alt="<?php echo $model->name ?>"/>
			    </div>	
		    </div>
	    </div>
	</div>
	<div class="glc-bredcrumbs">
		<div class="container">
			<div class="row-fluid bl-bar">
				<div class="span9">
					<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
						'links'=>array( 
							'usuario',
							$model->username
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
	</div>
	<div class="glc-user-edit-form">
		<div class="container">
			<div class="row-fluid">
				<div class="span12">
					<ul class="nav nav-tabs" id="myTab">
			          <li class="active"><a data-toggle="tab" href="#seus-dados">Seus dados</a></li>
			          <li><a data-toggle="tab" href="#suas-imagens">Suas imagens</a></li>
			        </ul>
			        <div class="tab-content" id="myTabContent">
			          <div id="seus-dados" class="tab-pane fade in active">
			            <?php echo $this->renderPartial('_formEditUser',array('model'=>$model)); ?>
			          </div>
			          <div id="suas-imagens" class="tab-pane fade">
			            <?php echo $this->renderPartial('_formImageUser',array('model'=>$model,'image'=>$image)); ?>
			          </div>
			        </div>
				</div>
			</div>
		</div>
	</div>
</section>
