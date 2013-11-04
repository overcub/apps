<header class="glc-header">
	<div class="glc-header-logo">
		<div class="container">
			<div class="glc-logo">
				<a title="Página Inicial" href="/">Stream</a>
			</div>
		</div>
	</div>	
	<div class="glc-header-inner">           
		<div class="container">  
			<?php $this->widget('bootstrap.widgets.TbNavbar', array(
			    'type'=>'inverse',
			    'brand'=>false,
			    'brandUrl'=>'/',
				'fixed' => false,
			    'collapse'=>true, // requires bootstrap-responsive.css
			    'items'=>array(
			        array(
			            'class'=>'bootstrap.widgets.TbMenu',
			            'items'=>array(
			                array('label'=>'Home', 'url'=>'/'),
			                array('label'=>'Streamer', 'url'=>array('/streamer')),
			                array('label'=>'Sobre', 'url'=>array('/sobre')),
			                //array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
			                //array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			            ),
			        ),
			    	//'<ul class="nav pull-right"><li><a href="http://geeklifeclub.com.br">by <img src="/images/logo/geeklifeclub50x50.png" width="40px" height="40px" alt="Geek Life Club" class="img-circle"/></a></li></ul>'
		    		array(
		    				'class'=>'bootstrap.widgets.TbMenu',
		    				'encodeLabel'=>false,
		    				'htmlOptions'=>array('class'=>'pull-right'),
		    				'items'=>array(
		    						array('label'=>'Login', 'url'=>array('/login'), 'visible'=>Yii::app()->user->isGuest),
		    						array('label'=>'<img border="0" align="absmiddle" src="http://en.gravatar.com/avatar/'.((isset(Yii::app()->user->data['email']))?md5(Yii::app()->user->data['email'])."?d=mm":"00000000000000000000000000000000?d=mm&f=y").'&s=25" alt="'.Yii::app()->user->name.'"> '.Yii::app()->user->name, 'url'=>'#perfil', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
		    								array('label'=>'Streamer', 'icon'=>'home', 'url'=>'/streamer'),
		    								array('label'=>'Meu Stream', 'icon'=>'film', 'url'=>'/stream/'.Yii::app()->user->name),
		    								//array('label'=>'Perfil', 'icon'=>'user', 'url'=>'#'),
		    								array('label'=>'Editar', 'icon'=>'cog', 'url'=>'/usuario/editar'),
		    								'---',
		    								array('label'=>'Sair', 'icon'=>'off', 'url'=>'/logout'),
		    						)),
		    				),
		    		),
			    ),
			)); ?>
		</div>
	</div>
</header>
<section class="glc-publicidade glc-superbanner-top">
	<div class="container">
		<div class="bl-pub-superbanner">
			<p class="glc-pub-info">publicidade</p>
			<!-- superbanner_728x90 -->
			<div id='div-gpt-ad-1379991864403-3'>
				<script type='text/javascript'>
				googletag.cmd.push(function() { googletag.display('div-gpt-ad-1379991864403-3'); });
				</script>
			</div>
		</div>
	</div>
</section>