	<style type="text/css">
body{
	overflow: hidden;
}
.container-full .man-menu {
    background-color: #262626;
    bottom: 0;
    left: 0;
    top: 0;
    color: #F7F7F7;
    font-weight: 300;
    overflow: hidden;
    position: fixed;
    transition: width 0.3s ease 0s;
    white-space: nowrap;
    width: 60px;
    z-index: 900;
}

.container-full .man-view {
    top: 0;
    bottom: 0;
    left: 60px;
    right: 338px;
    position: absolute;
    padding-left: 10px;
    padding-right: 10px;
    max-width: 1022px;
    background: none repeat scroll 0 0 #202020;
    overflow: auto;
}
.container-full .man-player {
    height: 478px;
    width: 100%;
    margin-top: 10px;
    margin-bottom: 10px;
}
.container-full .man-widget {
	height: 40%;
	min-height: 300px;
	background-color: #262111;
}
.container-full .man-chat-widget {
    bottom: 5px;
    height: 60%;
    min-height: 300px;
    position: absolute;
    width: 100%;
}.container-full .man-player-profile{
    background-color: #E8E8E8;
    padding-left: 5px;
    padding-right: 5px;
    padding-top: 10px;
    min-height: 200px;
}
.container-full .man-chat {
    background-color: #262126;
    bottom: 0;
    right: 0;
    top: 0;
    color: #F7F7F7;
    font-weight: 300;
    height: 100%;
    overflow: hidden;
    position: fixed;
    transition: width 0.3s ease 0s;
    white-space: nowrap;
    width: 338px;
    z-index: 900;
}
.social-bottom .button.facebook {
	position: relative;
	top: -4px;
}
.streamer-data {
}
.streamer-data .avatar {
	display: inline-block;
	vertical-align: top;
}
.streamer-data .stream-name {
	display: inline-block;
	vertical-align: top;
}
.streamer-data .stream-name .user {
	font-size: 20px;
	margin-bottom: 0;
}
.streamer-data .stream-name .game {
	font-size: 14px;
    margin-bottom: 0;
}
.nav-tabs .dropdown-toggle .caret {
	border-top-color: #805da7;
	border-bottom-color: #805da7;
}

.streaming-tab-user .nav{
	margin: 0;
}
.streaming-tab-user .tab-content{
	margin-top: -1px; 
}
.streaming-tab-user .tab-pane{
	background-color: #FFFFFF;
    border-top: 0;
    border-color: #DDDDDD #DDDDDD rgba(0, 0, 0, 0);;
    border-style: solid;
    border-width: 1px;
	padding:20px;
}
	</style>
	
		<div class="man-doc">
			<div class="container-full">
				<div class="man-menu"></div>
				<div class="man-view">
					<div class="man-player">
						<?php if($model->getExtraData('twichtv')): ?>
							<object type="application/x-shockwave-flash" height="100%" width="100%" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=<?php echo $model->getExtraData('twichtv')?>" bgcolor="#000000">
								<param name="allowFullScreen" value="false" />
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
					<div class="man-player-profile">
						<div class="row-fluid">
							<div class="span9">
								<div class="streamer-data">
									<div class="avatar">
										<img border="0" class="pull-left" src="<?php echo $model->getImageProfile(56) ?>" alt="<?php echo $model->name ?>"/>
									</div>
									<div class="stream-name">
										<p class="user"><strong><?php echo $model->name ?></strong> <?php echo $model->getExtraData('descriptionStream') ?></p>
										<p class="game">League of Legends</p>
									</div>
								</div>
							</div>
							<div class="span3">
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
							</div>
						</div>
						<div class="row-fluid">
							<div class="span12">
								<?php if($lolPlayer instanceof LolPlayer ) :?>
								    <table class="table">
							          <thead>
							            <tr>
							              <th></th>
							              <th>Level</th>
							              <th>Server</th>
							              <th>Prestativo</th>
							              <th>Amigável</th>
							              <th>Trabalho em Equipe</th>
							              <th>Oponente Honrado</th>
							            </tr>
							          </thead>
							          <tbody>
							            <tr>
							              <td><?php echo $lolPlayer->name ?></td>
							              <td><?php echo $lolPlayer->level ?></td>
							              <td><?php echo $lolPlayer->server ?></td>
							              <?php $honorData = CJSON::decode($lolPlayer->honorData) ?>
							              <td><?php echo $honorData['data']['colaborator'] ?></td>
							              <td><?php echo $honorData['data']['friendly'] ?></td>
							              <td><?php echo $honorData['data']['job'] ?></td>
							              <td><?php echo $honorData['data']['enimy'] ?></td>
							            </tr>
							          </tbody>
							        </table>
								<?php endif ?>
							</div>
						</div>
						<div class="row-fluid streaming-tab-user">
							<ul class="nav nav-tabs" id="myTab">
								<li class="active"><a data-toggle="tab" href="#profileHome">Bem vindo(a) a stream</a></li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div id="profileHome" class="tab-pane fade active in">
									<?php echo $model->getExtraData('textStream') ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="man-chat">
					<div class="man-widget">
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
					<iframe frameborder="0" scrolling="no" src="http://twitch.tv/<?php echo $model->getExtraData('twichtv')?>/chat?popout=" class="man-chat-widget"></iframe>
				</div>
			</div>
		</div>