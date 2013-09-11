<?php
$this->breadcrumbs=array(
	'Champions Bad Againsts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ChampionsBadAgainst','url'=>array('index')),
	array('label'=>'Create ChampionsBadAgainst','url'=>array('create')),
	array('label'=>'View ChampionsBadAgainst','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ChampionsBadAgainst','url'=>array('admin')),
);
?>

<h1>Update ChampionsBadAgainst <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>