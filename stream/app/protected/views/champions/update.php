<?php
$this->breadcrumbs=array(
	'Champions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Champions','url'=>array('index')),
	array('label'=>'Create Champions','url'=>array('create')),
	array('label'=>'View Champions','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Champions','url'=>array('admin')),
);
?>

<h1>Update Champions <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>