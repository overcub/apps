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
        <a class="brand" href="/"><img src="/images/logo/logo-navbar.png" alt="manete.tv - by Geek Life Club"></a>
        <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
        <div class="nav-collapse collapse">
          <ul class="nav">
            <?php /*
            <li><a href="/">Home</a></li>
            <li><a href="/sobre">Sobre</a></li>
            */ ?>
           </ul>
           <ul class="nav pull-right">
            <?php if( !Yii::app()->user->isGuest ): ?>
            	<!-- Read about Bootstrap dropdowns at http://twbs.github.com/bootstrap/javascript.html#dropdowns -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img border="0" align="absmiddle" src="<?php echo (isset(Yii::app()->user->img) )?Yii::app()->user->img:"00000000" ?>&s=25" alt="<?php echo Yii::app()->user->name ?>" /> <?php echo Yii::app()->user->name ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/usuario/editar"><i class="icon-cog"></i> Editar</a></li>
                    <li><a href="/stream/<?php echo Yii::app()->user->name ?>"><i class="icon-facetime-video"></i> Meu Stream</a></li>
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="icon-off"></i> Sair</a></li>
                  </ul>
                </li>
        	<?php else: ?>
        		<?php /*
        		<li><a href="/login">  icon-user Login</a></li>
        		<li><a href="/cadastro">Cadastro</a></li>
        		*/ ?>
            <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->
  </div> <!-- /.container -->
</div>
<div class="glc-header-bg"></div>