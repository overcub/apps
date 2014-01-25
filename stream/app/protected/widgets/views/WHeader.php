<!-- <header class="glc-header">
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
			                //array('label'=>'Stream', 'url'=>array('/stream')),
			                //array('label'=>'Sobre', 'url'=>array('/sobre')),
			            ),
			        ),
			    	//'<ul class="nav pull-right"><li><a href="http://geeklifeclub.com.br">by <img src="/images/logo/geeklifeclub50x50.png" width="40px" height="40px" alt="Geek Life Club" class="img-circle"/></a></li></ul>'
		    		array(
		    				'class'=>'bootstrap.widgets.TbMenu',
		    				'encodeLabel'=>false,
		    				'htmlOptions'=>array('class'=>'pull-right'),
		    				'items'=>array(
		    						array('label'=>'Login', 'icon'=>'user white', 'url'=>array('/login'), 'visible'=>Yii::app()->user->isGuest),
		    						//array('label'=>'Cadastro', 'icon'=>'plus white', 'url'=>array('/cadastro'), 'visible'=>Yii::app()->user->isGuest),
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
</header> -->

<div class="navbar-wrapper">
      <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
      <div class="container">

        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#"><img src="/images/logo/logo-navbar.png" alt="manete.tv - by Geek Life Club"></a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <!-- Read about Bootstrap dropdowns at http://twbs.github.com/bootstrap/javascript.html#dropdowns -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="nav-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

      </div> <!-- /.container -->
    </div>
