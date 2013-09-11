<?php
$this->breadcrumbs=array(
	'Champions Bad Againsts',
);

$this->menu=array(
	array('label'=>'Create ChampionsBadAgainst','url'=>array('create')),
	array('label'=>'Manage ChampionsBadAgainst','url'=>array('admin')),
);
?>

<h1>Champions Bad Againsts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
