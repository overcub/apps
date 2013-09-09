<?php
$this->breadcrumbs=array(
	'Streamers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Streamers','url'=>array('index')),
	array('label'=>'Create Streamers','url'=>array('create')),
	array('label'=>'Update Streamers','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Streamers','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Streamers','url'=>array('admin')),
);
?>

<h1>View Streamers #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_stream',
		'id_players',
		'mainStream',
		'nickname',
		'updateTime',
		'createTime',
	),
)); ?>
