<?php
$this->breadcrumbs=array(
	'Chapters'=>array('index'),
	$model->title,
);
$this->menu=array(
	array('label'=>'Back to Course', 'url'=>array('course/view',id=>$model->course->ID)),
	array('label'=>'List Chapters', 'url'=>array('index')),
	array('label'=>'Create Chapters', 'url'=>array('create')),
	array('label'=>'Update Chapters', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Chapters', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Chapters', 'url'=>array('admin')),
);
?>

<h1>View Chapters #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'course_id',
		'title',
		'description',
		'createtimestamp',
	),
)); ?>
