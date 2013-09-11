<?php
$this->breadcrumbs=array(
	'Champions Bad Againsts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ChampionsBadAgainst','url'=>array('index')),
	array('label'=>'Create ChampionsBadAgainst','url'=>array('create')),
	array('label'=>'Update ChampionsBadAgainst','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ChampionsBadAgainst','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ChampionsBadAgainst','url'=>array('admin')),
);
?>

<h1>View ChampionsBadAgainst #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_champions',
		'id_champions_badagainst',
		'points',
		'excerpt',
		'description',
		'mixData',
		'updateTime',
		'createTime',
	),
)); ?>
