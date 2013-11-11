<style>
.glc-streaming{
}
	.glc-streaming #glc-doc .glc-streaming-content .glc-header {
	    color: #fff;
	    text-align: center;
	    text-shadow: 2px 2px 2px #000000;
	    padding: 60px 0;
	    height: 160px;
	}
	.glc-streaming #glc-doc .bl-destaque.bl-destaque-conteudo{
		 margin-top: 0;
	}
	.glc-streaming #glc-doc .glc-header{
		 margin-bottom: 0;
	}
</style>
<section class="glc-streaming-content">
<div class="glc-header" style="background: url(<?php echo $model->getImageCover();?>) repeat center center;">
	<img border="0" class="img-circle" src="<?php echo $model->getImageProfile() ?>" alt="<?php echo $model->name ?>"/>
	<h1><?php echo $model->username; ?></h1>
</div>
<div class="glc-bredcrumbs">
	<div class="container">
		<div class="row-fluid bl-bar">
			<div class="span9">
				<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
					'links'=>array( 
						'Stream' => '/stream',
						$model->username
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
</div>
<div class="glc-publicidade glc-superbanner-top">
	<div class="container">
		<div class="bl-pub-superbanner">
			<p class="glc-pub-info">publicidade</p>
			<!-- superbanner_728x90 -->
			<div id='div-gpt-ad-1379991864403-3'>
				<script type='text/javascript'>
				googletag.cmd.push(function() { googletag.display('div-gpt-ad-1379991864403-3'); });
				</script>
			</div>
		</div>
	</div>
</div>
<div class="glc-body-streamer bl-conteudo">
	<div class="container">		
		<div class="row-fluid">
			<div class="span8">
				<object type="application/x-shockwave-flash" height="500" width="100%" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=<?php echo $model->getExtraData('twichtv')?>" bgcolor="#000000">
					<param name="allowFullScreen" value="false" />
					<param name="allowScriptAccess" value="always" />
					<param name="allowNetworking" value="all" />
					<param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" />
					<param name="flashvars" value="hostname=www.twitch.tv&channel=<?php echo $model->getExtraData('twichtv')?>&auto_play=true&start_volume=25" />
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
				<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel=<?php echo $model->getExtraData('twichtv')?>&amp;popout_chat=true" height="400" width="100%"></iframe>				
			</div>
		</div>
	</div>
</div>
</section>