<?php
$this->breadcrumbs=array(
	'Lol Players',
);

$this->menu=array(
	array('label'=>'Create LolPlayer','url'=>array('create')),
	array('label'=>'Manage LolPlayer','url'=>array('admin')),
);
?>

<h1>Lol Players</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
