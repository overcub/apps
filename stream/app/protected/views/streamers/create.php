<?php
$this->breadcrumbs=array(
	'Streamers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Streamers','url'=>array('index')),
	array('label'=>'Manage Streamers','url'=>array('admin')),
);
?>

<h1>Create Streamers</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>