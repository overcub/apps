<section class="glc-stream-content">
	<div class="glc-header">
		<div class="container">
			<div class="bl-info">
				<h1>Stream</h1>
				<p class="lead">Veja quem já esta stremando por aqui.</p>
			</div>
		</div>
	</div>
	<div class="glc-bredcrumbs">
		<div class="container">
			<div class="row-fluid bl-bar">
				<div class="span9">
					<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
						'links'=>array(
							'Stream'
						)
					)); ?>
				</div>
				<div class="span3">
					<div class="compartilhamento">
						<?php $this->widget('yii-sharrre.widgets.WSocialShare', array(
								'htmlOptions' => array('id' => 'social-top-container','class'=>'demo5 pull-left'),
								'elementId' => 'social-top',
								'dataUrl' => $this->createAbsoluteUrl('/stream'),
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
	<div class="glc-body-streamer">
		<div class="container">
			<div class="glc-carousel glc-box">
			    <div id="myCarousel" class="carousel slide glc-carousel-info">
				    <!-- Carousel items -->
				    <div class="carousel-inner">
					    <div class="active item">
					    	<span class="glc-box-game-icon"><img src="/images/style/icon/game/icon-lol-40x40.gif" width="40" height="40"/></span>
					    	<img style="width: 1170px; height: 300px;" src="/images/logo/geeklifeclub250x250-250x220.jpg">
						    <div class="carousel-caption">
		                      <h4>Second Thumbnail label</h4>
		                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		                    </div>
					    </div>
					    <div class="item">
					    	<span class="glc-box-game-icon"><img src="/images/style/icon/game/icon-wow-40x40.png" width="40" height="40"/></span>
					    	<img style="width: 1170px; height: 300px;" src="/images/logo/geeklifeclub250x250-250x220.jpg">
					    	<div class="carousel-caption">
		                      <h4>Second Thumbnail label</h4>
		                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		                    </div>
					    </div>
					    <div class="item">
					    	<span class="glc-box-game-icon"><img src="/images/style/icon/game/icon-lol-40x40.gif" width="40" height="40"/></span>
					    	<img style="width: 1170px; height: 300px;" src="/images/logo/geeklifeclub250x250-250x220.jpg">
					    	<div class="carousel-caption">
		                      <h4>Second Thumbnail label</h4>
		                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		                    </div>
					    </div>
			    	</div>
			    	<ol class="carousel-indicators">
					    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					    <li data-target="#myCarousel" data-slide-to="1"></li>
					    <li data-target="#myCarousel" data-slide-to="2"></li>
				    </ol>
				    <!-- Carousel nav -->
				    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			    </div>
			</div>
		</div>
		<div class="container bl-rows">
			<div class="row-fluid">
				<div class="span4">
					<article class="glc-box glc-box-icon">
						<span class="glc-box-game-icon"><img src="/images/style/icon/game/icon-wow-40x40.png" width="40" height="40"/></span>
						<a href="#">
							<div class="glc-box-image">
								<img style="width: 380px" src="/images/logo/geeklifeclub250x250-250x220.jpg">
							</div>
							<div class="glc-box-caption">
		                      <h4>Second Thumbnail label</h4>
		                      <p>Cras justo odio, dapibus ac facilisis in ...</p>
		                    </div>
	                    </a>
					</article>
				</div>
				<div class="span4">
					<article class="glc-box glc-box-icon">
						<span class="glc-box-game-icon"><img src="/images/style/icon/game/icon-lol-40x40.gif" width="40" height="40"/></span>
						<a href="#">
							<div class="glc-box-image">
								<img style="width: 380px" src="/images/logo/geeklifeclub250x250-250x220.jpg">
							</div>
							<div class="glc-box-caption">
		                      <h4>Second Thumbnail label</h4>
		                      <p>Cras justo odio, dapibus ac facilisis in ...</p>
		                    </div>
	                    </a>
					</article>
				</div>
				<div class="span4">
					<article class="glc-box glc-box-icon">
						<span class="glc-box-game-icon"><img src="/images/style/icon/game/icon-lol-40x40.gif" width="40" height="40"/></span>
						<a href="#">
							<div class="glc-box-image">
								<img style="width: 380px" src="/images/logo/geeklifeclub250x250-250x220.jpg">
							</div>
							<div class="glc-box-caption">
		                      <h4>Second Thumbnail label</h4>
		                      <p>Cras justo odio, dapibus ac facilisis in ...</p>
		                    </div>
	                    </a>
					</article>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<article class="glc-box glc-box-icon">
						<span class="glc-box-game-icon"><img src="/images/style/icon/game/icon-lol-40x40.gif" width="40" height="40"/></span>
						<a href="#">
							<div class="glc-box-caption glc-box-caption-text-right">
		                      <h4>Second Thumbnail label</h4>
		                      <p>Cras justo odio, dapibus ac facilisis in ...</p>
		                    </div>
	                    </a>
					</article>
				</div>
				<div class="span4">
					<article class="glc-box glc-box-icon">
						<span class="glc-box-game-icon"><img src="/images/style/icon/game/icon-lol-40x40.gif" width="40" height="40"/></span>
						<a href="#">
							<div class="glc-box-caption glc-box-caption-text-right">
		                      <h4>Second Thumbnail label</h4>
		                      <p>Cras justo odio, dapibus ac facilisis in ...</p>
		                    </div>
	                    </a>
					</article>
				</div>
				<div class="span4">
					<article class="glc-box glc-box-icon">
						<span class="glc-box-game-icon"><img src="/images/style/icon/game/icon-wow-40x40.png" width="40" height="40"/></span>
						<a href="#">
							<div class="glc-box-caption glc-box-caption-text-right">
		                      <h4>Second Thumbnail label</h4>
		                      <p>Cras justo odio, dapibus ac facilisis in ...</p>
		                    </div>
	                    </a>
					</article>
				</div>
			</div>
		</div>
	</div>
</section>