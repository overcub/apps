<header class="glc-header">            
	<div class="container">
		<h1 class="muted">Stream | Geek Life Club</h1>
		<?php $this->widget('bootstrap.widgets.TbNavbar', array(
		    'brand'=>false,
		    'brandUrl'=>false,
			'fixed' => false,
		    'collapse'=>true, // requires bootstrap-responsive.css
		    'items'=>array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>array(
		                array('label'=>'Home', 'url'=>'/'),
		                array('label'=>'Streamer', 'url'=>array('/streamer')),
		                array('label'=>'Sobre', 'url'=>array('/sobre')),
		                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
		                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
		            ),
		        ),
		    ),
		)); ?>
       
	</div>
</header>
<style>

      /* Customize the navbar links to be fill the entire space of the .navbar */
     .glc-header .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav li {
        display: table-cell;
        width: 1%;
        float: none;
      }
      .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }		            
</style>