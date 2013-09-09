<?php
$this->breadcrumbs=array(
	'Streamers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Streamers','url'=>array('index')),
	array('label'=>'Create Streamers','url'=>array('create')),
	array('label'=>'View Streamers','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Streamers','url'=>array('admin')),
);
?>

<h1>Update Streamers <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>