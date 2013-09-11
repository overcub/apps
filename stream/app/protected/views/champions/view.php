<?php
$this->breadcrumbs=array(
	'Champions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Champions','url'=>array('index')),
	array('label'=>'Create Champions','url'=>array('create')),
	array('label'=>'Update Champions','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Champions','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Champions','url'=>array('admin')),
);
?>

<h1>View Champions #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'code',
		'excerpt',
		'description',
		'skills',
		'abilities',
		'skins',
		'mixData',
		'updateTime',
		'createTime',
	),
)); ?>
