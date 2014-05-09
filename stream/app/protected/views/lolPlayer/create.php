<?php
$this->breadcrumbs=array(
	'Lol Players'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LolPlayer','url'=>array('index')),
	array('label'=>'Manage LolPlayer','url'=>array('admin')),
);
?>

<h1>Create LolPlayer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>