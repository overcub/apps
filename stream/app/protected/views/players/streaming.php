<section class="glc-streaming-content">
	<div class="glc-header" style="background: url(<?php echo $model->getImageCover();?>) repeat center center;"></div>
	<div class="glc-bredcrumbs">
		<div class="container">
			<div class="row-fluid bl-bar">
				<div class="span9">
					<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
						'links'=>array( 
							'Stream' => '/',
							$model->username
						)
					)); ?>
				</div>
				<div class="span3">
					<div class="compartilhamento">
						<?php $this->widget('yii-sharrre.widgets.WSocialShare', array(
								'htmlOptions' => array('id' => 'social-top-container','class'=>'demo5 pull-left'),
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
				</div>
			</div>
		</div>
	</div>
	<?php /*
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
	*/ ?>
	<div class="glc-body-streamer bl-conteudo">
		<div class="container">		
			<div class="row-fluid">
				<?php if($model->getExtraData('twichtv')): ?>
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
						<div class="glc-publicidade glc-publicidade-margin-bottom">
							<div class="bl-pub-square">
								<p class="glc-pub-info">publicidade</p>
								<div id='div-gpt-ad-1379991864403-1'>
									<script type='text/javascript'>
									googletag.cmd.push(function() { googletag.display('div-gpt-ad-1379991864403-1'); });
									</script>
								</div>
							</div>
						</div>
						<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel=<?php echo $model->getExtraData('twichtv')?>&amp;popout_chat=true" height="400" width="100%"></iframe>
					</div>
				<?php else: ?>
					<div class="span12">
					    <div class="alert alert-block">
					    	<h4>Ops!</h4>
					    	O usuário <?php echo $model->username; ?> ainda não informou o seu canal de stream.
					    </div>
					</div>
				<?php endif;?>
			</div>
		</div>
		<?php /*
		<section class="glc-publicidade glc-superbanner-footer">
			<div class="container">
				<div class="bl-pub-superbanner">
					<p class="glc-pub-info">publicidade</p>
					<!-- superbanner_footer_728x90 -->
					<div id='div-gpt-ad-1379991864403-4'>
						<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1379991864403-4'); });
						</script>
					</div>
				</div>
			</div>
		</section>
		*/?>		
		<div class="glc-streaming-player-image">
			<div class="container">
				<img border="0" class="img-circle glc-image-profile" src="<?php echo $model->getImageProfile(200) ?>" alt="<?php echo $model->name ?>"/>
			</div>
		</div>
		<div class="glc-streaming-player">
			<div class="container">
				<h1><?php echo $model->username; ?></h1>
				<div class="glc-streaming-player-data">
					<div class="glc-box">
						<span class="arrow arrow-player-data"></span>
						<p class="glc-streaming-player-explain"><?php echo $model->getExtraData('descriptionStream')?></p>
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
				<?php /*
				<div class="row-fluid">
				 	<div id="disqus_thread"></div>
				    <script type="text/javascript">
				        var disqus_shortname = 'geeklifeclub'; // required: replace example with your forum shortname
				        var disqus_url = '<?php echo Yii::app()->params->domain."stream/".$model->username ?>';
				        var disqus_identifier = '<?php echo "/stream/".$model->username ?>';
		    			var disqus_title = '<?php echo "tvee | ".$model->username ?>';
				        (function() {
				            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				        })();
				    </script>
				    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
				</div>	
				*/ ?>			
		    </div>
	    </div>
	</div>
</section>
<div id="glc-feedback-stream">
	<button id="glc-btn-close-feedback-stream" aria-hidden="true" class="close" type="button">×</button>
	<p>O manete.tv esta em fases de teste. Por este motivo gostariamos de ouvir você gamer! Nos diga o que você gostaria de ter disponivel ao assistir o stream do seu game favorito? Mande um email para <a href="mailto:geeklifeclub@gmail.com">geeklifeclub@gmail.com</a> e responda a nossa <a href="#">pesquisa</a> é super rápido ;)</p>
</div>
<script>
  $("#glc-feedback-stream").ready(function() {
  	$( "#glc-btn-close-feedback-stream" ).on( "click", function(){
  		$('#glc-feedback-stream').removeClass('up');
	});
    setTimeout ( " $('#glc-feedback-stream').addClass('up'); ",3000 );
  });
</script>
<style type="text/css">
#glc-feedback-stream { background-color: #fff;border:1px solid;border-left-color:#f0f0f0;border-top-color:#f0f0f0;border-right-color:#d9d9d9;border-bottom-color:#d9d9d9;-webkit-box-shadow:2px 2px 8px 0 #ececec;-moz-box-shadow:2px 2px 8px 0 #ececec;-o-box-shadow:2px 2px 8px 0 #ececec;box-shadow:2px 2px 8px 0 #ececec;padding:20px 25px;border-radius:10px 10px 0 0;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-o-box-sizing:border-box;box-sizing:border-box}

#glc-feedback-stream p {
  margin-top: 10px;
}
.glc-streaming-content{
	z-index: 50;
}
#glc-feedback-stream {
	right: 50%;
	margin-right: -370px;
	max-width: 800px;
	position: fixed;
	bottom: -162px;
	transition:all 2s ease-in-out;
		-webkit-transition:all 2s ease-in-out;
			-moz-transition:all 2s ease-in-out;
				-o-transition:all 2s ease-in-out;
	z-index: 1000;
} 

#glc-feedback-stream.up {
	bottom: 0;
}
</style>

