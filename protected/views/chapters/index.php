<?php
$this->breadcrumbs=array(
	'Chapters',
);

$this->menu=array(
	array('label'=>'Create Chapters', 'url'=>array('create')),
	array('label'=>'Manage Chapters', 'url'=>array('admin')),
);
?>

<h1>Chapters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
