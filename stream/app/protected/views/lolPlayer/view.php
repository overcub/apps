<?php
$this->breadcrumbs=array(
	'Lol Players'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List LolPlayer','url'=>array('index')),
	array('label'=>'Create LolPlayer','url'=>array('create')),
	array('label'=>'Update LolPlayer','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete LolPlayer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LolPlayer','url'=>array('admin')),
);
?>

<h1>View LolPlayer #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_players',
		'accountId',
		'summonerId',
		'server',
		'name',
		'internalName',
		'icon',
		'level',
		'mixData',
		'updateTime',
		'createTime',
	),
)); ?>
