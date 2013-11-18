<section class="glc-streaming-content">
<div class="glc-header" style="background: url(<?php echo $model->getImageCover();?>) repeat center center;">
	<div class="container">
		<div class="row-fluid">
			<div class="span5">
            	<img border="0" class="img-circle glc-image-profile pull-left" src="<?php echo $model->getImageProfile(80) ?>" alt="<?php echo $model->name ?>"/>
                <h1><?php echo $model->username; ?></h1>
                <p><?php echo $model->getExtraData('descriptionStream')?></p>
                <hr>
            	<?php if(!empty($listGame)): ?>
				    <?php foreach ($listGame as $key): ?>
				    	<span class="label"><img title="<?php echo $key['name']?>" width="20" height="20" src="/images/style/icon/game/icon-<?php echo $key['code']?>-40x40.png"></span>
				    <?php endforeach; ?>
			    <?php endif; ?>
		    </div>
		    <div class="span2 offset5 hide">
		    	<img border="0" class="img-polaroid" src="<?php echo $model->getImageProfile(80) ?>" alt="<?php echo $model->name ?>"/>
		    </div>	
	    </div>
    </div>
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
					<div class="glc-publicidade glc-publicidade-margin-bottom glc-retangulofino">
						<div class="bl-pub-retangulofino">
							<p class="glc-pub-info">publicidade</p>
							<!-- cabecalho_300x50 -->
							<div id='div-gpt-ad-1379991864403-5'>
								<script type='text/javascript'>
								googletag.cmd.push(function() { googletag.display('div-gpt-ad-1379991864403-5'); });
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
		<div class="row-fluid">
		 	<div id="disqus_thread"></div>
		    <script type="text/javascript">
		        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		        var disqus_shortname = 'geeklifeclub'; // required: replace example with your forum shortname
		        var disqus_url = '<?php echo Yii::app()->params->domain."stream/".$model->username ?>';
		        var disqus_identifier = '<?php echo "/stream/".$model->username ?>';
    			var disqus_title = '<?php echo "tvee | ".$model->username ?>';
		        /* * * DON'T EDIT BELOW THIS LINE * * */
		        (function() {
		            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		        })();
		    </script>
		    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
		</div>
	</div>
</div>
</section>