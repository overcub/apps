<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
	<script type='text/javascript'>
	var googletag = googletag || {};
	googletag.cmd = googletag.cmd || [];
	(function() {
	var gads = document.createElement('script');
	gads.async = true;
	gads.type = 'text/javascript';
	var useSSL = 'https:' == document.location.protocol;
	gads.src = (useSSL ? 'https:' : 'http:') + 
	'//www.googletagservices.com/tag/js/gpt.js';
	var node = document.getElementsByTagName('script')[0];
	node.parentNode.insertBefore(gads, node);
	})();
	</script>
	
	<script type='text/javascript'>
	googletag.cmd.push(function() {
	googletag.defineSlot('/137203934/square_250x250', [250, 250], 'div-gpt-ad-1379991864403-0').addService(googletag.pubads());
	googletag.defineSlot('/137203934/square_300x250', [300, 250], 'div-gpt-ad-1379991864403-1').addService(googletag.pubads());
	googletag.defineSlot('/137203934/superbanner_1_728x90', [728, 90], 'div-gpt-ad-1379991864403-2').addService(googletag.pubads());
	googletag.defineSlot('/137203934/superbanner_728x90', [728, 90], 'div-gpt-ad-1379991864403-3').addService(googletag.pubads());
	googletag.defineSlot('/137203934/superbanner_footer_728x90', [728, 90], 'div-gpt-ad-1379991864403-4').addService(googletag.pubads());
	googletag.pubads().enableSingleRequest();
	googletag.enableServices();
	});
	</script>	
</head>
<body <?php echo (!empty($this->sessionClass))?'class="'.$this->sessionClass.'"':'' ?>>
	<div id="glc-doc">
		<?php $this->widget('application.widgets.WHeader');?>
		<?php echo $content; ?>
		<?php $this->widget('application.widgets.WFooter');?>
	</div>
</body>
</html>
