<section class="glc-header-streamer bl-conteudo">
	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<h1>Streamer</h1>
			</div>
		</div>
	</div>
</section>
<section class="glc-body-streamer">
<div class="container">
	<div class="row-fluid bl-bar">
		<div class="span9">
			<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
				'links'=>array( 
					'Streamer' => '/streamer'
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
	<div class="row-fluid bl-conteudo">
		<div class="span12">
		    <div id="myCarousel" class="carousel slide glc-carousel-info">
			    <ol class="carousel-indicators">
				    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="1"></li>
				    <li data-target="#myCarousel" data-slide-to="2"></li>
			    </ol>
			    <!-- Carousel items -->
			    <div class="carousel-inner">
				    <div class="active item"><img class="img-circle" src="/images/logo/geeklifeclub250x250-250x220.jpg"></div>
				    <div class="item"><img class="img-circle" src="/images/logo/geeklifeclub250x250-250x220.jpg"></div>
				    <div class="item"><img class="img-circle" src="/images/logo/geeklifeclub250x250-250x220.jpg"></div>
		    	</div>
			    <!-- Carousel nav -->
			    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
		    </div>
		</div>
	</div>
</div>
</section>