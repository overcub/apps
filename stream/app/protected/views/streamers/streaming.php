<section class="glc-header-streamer">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<h1>Streamer - <?php echo $model->nickname; ?></h1>
			</div>
		</div>
		<div class="row-fluid bl-bar bl-destaque">
			<div class="span9">
				<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
					'links'=>array( 
						'Streamer' => '/streamer',
						$model->nickname
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
</section>
<section class="glc-body-streamer bl-conteudo">
	<div class="container">		
		<div class="row-fluid">
			<div class="span8">
				<object type="application/x-shockwave-flash" height="500" width="100%" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=<?php echo $model->nickname?>" bgcolor="#000000">
					<param name="allowFullScreen" value="true" />
					<param name="allowScriptAccess" value="always" />
					<param name="allowNetworking" value="all" />
					<param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" />
					<param name="flashvars" value="hostname=www.twitch.tv&channel=<?php echo $model->nickname?>&auto_play=true&start_volume=25" />
				</object>
			</div>
			<div class="span4">
				<div class="glc-publicidade glc-publicidade-margin-bottom glc-retangulofino">
					<div class="bl-pub-retangulofino">
						<p class="glc-pub-info">publicidade</p>
						<!-- retangulofino_300x50 -->
						<div style="width: 300px; height: 50px; background: #000000;"></div>
					</div>
				</div>
				<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel=<?php echo $model->nickname?>&amp;popout_chat=true" height="400" width="100%"></iframe>				
			</div>
		</div>
	</div>
</section>