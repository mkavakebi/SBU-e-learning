<?php
$this->menu=array(
	array('label'=>'Add Course', 'url'=>array('course/create')),
);
?>
<h1>Courses you are teacher of</h1>
<?php echo $this->renderPartial('/course/_coursetable', array('CourseList'=>$courses_teach)); ?>

<h1>Courses you are Student of</h1>
<?php echo $this->renderPartial('/course/_coursetable', array('CourseList'=>$courses_student)); ?>
