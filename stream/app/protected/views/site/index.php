<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to AAAAAAAAA<i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>


<script type="text/javascript">
var glcLOLNexus = {
	inGame : function(){
		$.ajax({
		    url: '/players/findPlayeirsNexus', // The URL to the API. You can get this by clicking on "Show CURL example" from an API profile
		    type: 'POST',
			data : {
				Players : {
					name : 'Lipsom',
					platform : 'br'
				}
			},
		    success: function(data) { 
		    	console.log(data);
		    }
		});
	}
},
glcLolNexus = {};
$(document).ready(function(){
	
	$('#btn-search').on('click', function() {
		var value = $('#search').val();	
	});
	
});
//https://www.mashape.com/meepo/League-of-Legends/misc/summoner-name/na/54353
</script>