<?php
$this->breadcrumbs=array(
	'Champions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Champions','url'=>array('index')),
	array('label'=>'Manage Champions','url'=>array('admin')),
);
?>

<h1>Create Champions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>