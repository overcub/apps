<?php
$this->breadcrumbs=array(
	'Players'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Players','url'=>array('index')),
	array('label'=>'Create Players','url'=>array('create')),
	array('label'=>'Update Players','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Players','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Players','url'=>array('admin')),
);
?>

<h1>View Players #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_user',
		'email',
		'password',
		'username',
		'gender',
		'birthdate',
		'updateTime',
		'createTime',
	),
)); ?>
