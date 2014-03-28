<?php
$this->breadcrumbs=array(
	'Lol Players'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LolPlayer','url'=>array('index')),
	array('label'=>'Create LolPlayer','url'=>array('create')),
	array('label'=>'View LolPlayer','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage LolPlayer','url'=>array('admin')),
);
?>

<h1>Update LolPlayer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>