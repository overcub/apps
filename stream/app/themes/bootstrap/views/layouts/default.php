<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
</head>
<body <?php echo (!empty($this->sessionClass))?'class="'.$this->sessionClass.'"':'' ?>>
	<div id="glc-doc">
		<?php $this->widget('application.widgets.WHeader');?>
		<?php echo $content; ?>
		<?php $this->widget('application.widgets.WFooter');?>
	</div>
</body>
</html>
