<?php
$this->breadcrumbs=array(
	'Chapters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Chapters', 'url'=>array('index')),
	array('label'=>'Manage Chapters', 'url'=>array('admin')),
);
?>

<h1>Create Chapters</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'course_id'=>$course_id)); ?>