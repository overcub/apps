<div id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="/">
                    <img alt="manete.tv - by Geek Life Club" src="/images/logo/logo-navbar.png">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li>
                        <a class="page-scroll" href="#page-top">início</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#stream">stream</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contato</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="avatar">
                            <img border="0" class="pull-left" src="<?php echo $model->getImageProfile(56) ?>" alt="<?php echo $model->name ?>"/>
                        </div>
                        <h1 class="brand-heading"><?php echo $model->name ?></h1>
                        <p class="intro-text"><?php echo $model->getExtraData('descriptionStream') ?></p>
                        <a href="#stream" class="btn btn-circle page-scroll">
                            <span class="glyphicon glyphicon-facetime-video"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="stream" class="content-section">
        <div class="row">
            <div class="col-md-9">
                <div class="player">
                    <?php if($model->getExtraData('twichtv')): ?>
                        <object type="application/x-shockwave-flash" height="100%" width="100%" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=<?php echo $model->getExtraData('twichtv')?>" bgcolor="#000000">
                            <param name="allowFullScreen" value="true" />
                            <param name="allowScriptAccess" value="always" />
                            <param name="allowNetworking" value="all" />
                            <param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" />
                            <param name="flashvars" value="hostname=www.twitch.tv&channel=<?php echo $model->getExtraData('twichtv')?>&auto_play=true&start_volume=25" />
                        </object>
                    <?php else: ?>
                        <div class="alert alert-block">
                            <h4>Ops!</h4>
                            O usuário <?php echo $model->username; ?> ainda não informou o seu canal de stream.
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="widget">
                        <div id="glc-pub-square-refresh" class="glc-publicidade glc-publicidade-margin-bottom">
                            <div class="bl-pub-square">
                                <button aria-hidden="true" class="close glc-btn-close-pub" type="button">×</button>
                                <p class="glc-pub-info">publicidade</p>
                                <div id='div-gpt-ad-1379991864403-1'>
                                    <script type='text/javascript'>
                                    googletag.cmd.push(function() {
                                    var slot1 = googletag.defineSlot('/137203934/square_300x250', [300, 250], 'div-gpt-ad-1379991864403-1').addService(googletag.pubads());
                                    googletag.display("div-gpt-ad-1379991864403-1");
                                    setInterval(function(){
                                        $('#glc-pub-square-refresh').removeClass('hide');
                                        googletag.pubads().refresh([slot1]);
                                    }, 30000);
                                    });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="chat">
                        <iframe width="100%" height="100%" frameborder="0" scrolling="no" src="http://twitch.tv/<?php echo $model->getExtraData('twichtv')?>/chat?popout=" class="man-chat-widget"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <?php $this->widget('yii-sharrre.widgets.WSocialShare', array(
                        'htmlOptions' => array('id' => 'social-top-container','class'=>'demo5 pull-left'),
                        'elementId' => 'social-bottom',
                        'dataUrl' => $this->createAbsoluteUrl('/stream/'.$model->username),
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
                <h2>Contact Start Bootstrap</h2>
                <p>Feel free to email us to provide some feedback on our templates, give us suggestions for new templates and themes, or to just say hello!</p>
                <p><a href="mailto:feedback@startbootstrap.com">feedback@startbootstrap.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="glc-footer">
        <div class="container">
            <p class="about pull-left">
            Copyright &copy; <?php echo date('Y'); ?> manete.tv - by Geek Life Club.<br/>
            All Rights Reserved.<br/>
            </p>
            <p class="pull-right">
                <img src="/images/logo/logo-manete-tv-full.png" alt="manete.tv - by Geek Life Club">
            </p>
        </div>  
    </footer>
</div>