<?php echo CHtml::openTag('div', $this->htmlOptions);?>
	<div id="<?php echo $this->elementId?>" <?php echo (!empty($this->dataUrl))?'data-url="'.$this->dataUrl.'"':'' ?> <?php echo (!empty($this->dataText))?'data-text="'.$this->dataText.'"':'' ?>></div>
</div>
<script>
$(document).ready(function(){
	$('#<?php echo $this->elementId?>').sharrre({
	  share: <?php echo CJSON::encode($this->socials);?>,
	  buttons: <?php echo CJSON::encode($this->buttons);?>,
	  enableHover: <?php echo $this->enableHover?>,
	  enableCounter: <?php echo $this->enableCounter?>,
	  enableTracking: <?php echo $this->enableTracking?>
	});
});
</script>