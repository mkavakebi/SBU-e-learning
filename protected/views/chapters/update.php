<?php
$this->breadcrumbs=array(
	'Chapters'=>array('index'),
	$model->title=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Chapters', 'url'=>array('index')),
	array('label'=>'Create Chapters', 'url'=>array('create')),
	array('label'=>'View Chapters', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Chapters', 'url'=>array('admin')),
);
?>

<h1>Update Chapters <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>