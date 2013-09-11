<?php
$this->breadcrumbs=array(
	'Champions Bad Againsts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ChampionsBadAgainst','url'=>array('index')),
	array('label'=>'Manage ChampionsBadAgainst','url'=>array('admin')),
);
?>

<h1>Create ChampionsBadAgainst</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>