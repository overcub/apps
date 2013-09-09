<?php
$this->breadcrumbs=array(
	'Players',
);

$this->menu=array(
	array('label'=>'Create Players','url'=>array('create')),
	array('label'=>'Manage Players','url'=>array('admin')),
);
?>

<h1>Players</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
