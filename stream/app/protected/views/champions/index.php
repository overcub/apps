<?php
$this->breadcrumbs=array(
	'Champions',
);

$this->menu=array(
	array('label'=>'Create Champions','url'=>array('create')),
	array('label'=>'Manage Champions','url'=>array('admin')),
);
?>

<h1>Champions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
