<div id="inicio">
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
                        <a class="page-scroll" href="#inicio">início</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#stream">stream</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#sobre">Sobre</a>
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
                        <div class="social">
                            <?php $this->widget('yii-sharrre.widgets.WSocialShare', array(
                                    'htmlOptions' => array('id' => 'social-top-container','class'=>'demo5'),
                                    'elementId' => 'social-top',
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
                        </div>
                        <a href="#stream" class="btn btn-circle page-scroll">
                            <span class="glyphicon glyphicon-facetime-video"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="sponsorship">
        <div class="container">
        </div>
    </section>
    <!-- About Section -->
    <section id="stream">
        <div class="stream-container">
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
                <div class="widget">
                    <?php /*
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
                    */?>
                    <iframe class="chat" width="100%" frameborder="0" scrolling="no" src="http://twitch.tv/<?php echo $model->getExtraData('twichtv')?>/chat?popout=" class="man-chat-widget"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="sobre" class="text">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2>Sobre</h2>
                </div>
                <div class="col-md-4">
                    <?php $this->widget('yii-sharrre.widgets.WSocialShare', array(
                            'htmlOptions' => array('id' => 'social-bottom-container','class'=>'demo5 pull-left'),
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $model->getExtraData('textStream') ?>
                </div>
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

    <div id="glc-feedback-stream">
        <button id="glc-btn-close-feedback-stream" aria-hidden="true" class="close" type="button">×</button>
        <h4>O manete.tv esta em fases de teste</h4>
        <p>Por este motivo gostariamos de ouvir você gamer! Mande um email para <a href="mailto:geeklifeclub@gmail.com">geeklifeclub@gmail.com</a> e <a target="_blank" href="https://docs.google.com/forms/d/1mBfHUmlcjtdr50J_cdmwif51ITJ0fS84AVcX2rPYBNc/viewform?usp=send_form">clique aqui para responder a nossa pesquisa</a> é super rápido ;)</p>
    </div>
</div>