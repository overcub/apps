<section class="glc-header-streamer bl-conteudo">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<h1>Streamer - <?php echo $model->nickname; ?></h1>
			</div>
		</div>
	</div>
</section>
<section class="glc-body-streamer bl-conteudo">
	<div class="container">
		<div class="row-fluid bl-bar">
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
		<div class="row-fluid">
			<div class="span8">
				<object type="application/x-shockwave-flash" height="500" width="100%" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=<?php echo $model->nickname?>" bgcolor="#000000">
					<param name="allowFullScreen" value="false" />
					<param name="allowScriptAccess" value="always" />
					<param name="allowNetworking" value="all" />
					<param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" />
					<param name="flashvars" value="hostname=www.twitch.tv&channel=<?php echo $model->nickname?>&auto_play=true&start_volume=25" />
				</object>
				<a href="http://www.twitch.tv/<?php echo $model->nickname?>" class="trk" style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px; text-decoration:underline; text-align:center;">Watch live video from <?php echo $model->nickname?> on www.twitch.tv</a>
			</div>
			<div class="span4">
				<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel=<?php echo $model->nickname?>&amp;popout_chat=true" height="500" width="100%"></iframe>
			</div>
		</div>
	</div>
</section>