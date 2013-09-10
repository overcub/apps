<div class="container" id="page">
	<div class="row-fluid">
		<div class="span12">
			<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
				'links'=>array( 
					'Streamer' => '/streamer',
					$model->nickname
				)
			)); ?>
			<h1>Streamer - <?php echo $model->nickname; ?></h1>
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
		</div>
		<div class="span4">
			<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel=<?php echo $model->nickname?>&amp;popout_chat=true" height="500" width="100%"></iframe>
		</div>
	</div>
</div>