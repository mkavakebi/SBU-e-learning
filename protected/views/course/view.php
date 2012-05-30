<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Profile', 'url'=>array('user/index')),
	array('label'=>'Add Chapter', 'url'=>array('chapters/create','courseid'=>$model->ID)),
	array('label'=>'List Course', 'url'=>array('index')),
	array('label'=>'Create Course', 'url'=>array('create')),
	array('label'=>'Update Course', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Course', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Course', 'url'=>array('admin')),
);
?>
<h1>View Course <?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'title',
		'description',
		'createtimestamp',
	),
));
$co=count($model->teachers);
echo 'This Course Got '.count($model->teachers).' Teachers';
 ?>

 <h3>Chaptelist</h3>
<?php 
foreach($model->chapters as $key=>$item){?>
	<div>
		<div style="background-color: gray;font-size: 2em;">
			<?php $item->title?>
		</div>
		<div>
			<?php echo CHtml::link($item->title, array('course/view', 'id'=>$item->ID)); ?>
		</div>
	</div>
<?php }?>
<?php echo 'Techers Name: '.$model->TeachersName();?>