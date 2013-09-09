<?php
$this->breadcrumbs=array(
	'Streamers',
);

$this->menu=array(
	array('label'=>'Create Streamers','url'=>array('create')),
	array('label'=>'Manage Streamers','url'=>array('admin')),
);
?>

<h1>Streamers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
