<header class="glc-header">
	<div class="glc-header-inner">           
		<div class="container">  
			<?php $this->widget('bootstrap.widgets.TbNavbar', array(
			    'type'=>'inverse',
			    'brand'=>'<img src="/images/logo/logo-navbar.png" alt="tvee - by Geek Life Club">',
			    'brandUrl'=>'/',
				'fixed' => false,
			    'collapse'=>true, // requires bootstrap-responsive.css
			    'items'=>array(
			        array(
			            'class'=>'bootstrap.widgets.TbMenu',
			            'items'=>array(
			                array('label'=>'Home', 'url'=>'/'),
			                array('label'=>'Stream', 'url'=>array('/stream')),
			                array('label'=>'Sobre', 'url'=>array('/sobre')),
			            ),
			        ),
			    	//'<ul class="nav pull-right"><li><a href="http://geeklifeclub.com.br">by <img src="/images/logo/geeklifeclub50x50.png" width="40px" height="40px" alt="Geek Life Club" class="img-circle"/></a></li></ul>'
		    		array(
		    				'class'=>'bootstrap.widgets.TbMenu',
		    				'encodeLabel'=>false,
		    				'htmlOptions'=>array('class'=>'pull-right'),
		    				'items'=>array(
		    						array('label'=>'Login', 'icon'=>'user white', 'url'=>array('/login'), 'visible'=>Yii::app()->user->isGuest),
		    						array('label'=>'Cadastro', 'icon'=>'plus white', 'url'=>array('/cadastro'), 'visible'=>Yii::app()->user->isGuest),
		    						array('label'=>'<img border="0" align="absmiddle" src="'.( (isset(Yii::app()->user->img) )? Yii::app()->user->img : "00000000" ).'&s=25" alt="'.Yii::app()->user->name.'"> '.Yii::app()->user->name, 'url'=>'#perfil', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
		    								array('label'=>'Stream', 'icon'=>'home', 'url'=>'/stream'),
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